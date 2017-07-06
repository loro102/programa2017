<?php

namespace App\Http\Controllers;

use App\models\document;
use App\models\File;
use App\models\Fileprofessional;
use App\models\formality;
use App\models\insurer;
use App\models\invoice;
use App\models\note;
use App\models\phase;
use App\models\processor;
use App\models\professional;
use App\models\sort;



Class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expediente = File::paginate(10);

        return view('files.index', ['expedientes' => $expediente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expediente = new File;
        $sort = sort::all()->pluck('nombre', 'id');
        $categoria = formality::all()->unique('categoria')->pluck('categoria', 'categoria')->prepend('Ninguno', '1');
        $abogado = professional::where('group_id', 1)->where('activo', true)->pluck('Nombre', 'id');
        $aseguradora = insurer::all()->pluck('nombre', 'id')->prepend('Ninguno', '1');
        $processor = processor::where('insurer_id', 1)->pluck('nombre', 'id');
        $formalidad = formality::findorfail(1)->pluck('nombre', 'id');
        $fase = phase::all()->pluck('nombre', 'id');
        return view('files.create', [
            'expediente' => $expediente,
            'processor' => $processor,
            'sort' => $sort,
            'categoria' => $categoria,
            'formalidad' => $formalidad,
            'aseguradora' => $aseguradora,
            'abogado' => $abogado,
            'fase' => $fase,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\File $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\File $request)
    {
        //
        $file = new File;
        $file->fill($request->except(['formalidad', 'formalities_id']))->save();
        return redirect()->action('clientes@show', ['id' => $request->customer_id])->with('message', 'Se ha añadido un nuevo expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        ::                                                                ::
        ::              Pestaña Datos del expediente                      ::
        ::                                                                ::
        ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        */

        $consulta = File::find($id);
        /*
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::                                                                ::
       ::              Pestaña de profesionales                          ::
       ::                                                                ::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       */
        $prof = Fileprofessional::where('file_id', $id)->get();

        /*
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::                                                                ::
       ::            Pestaña de facturas del expediente                  ::
       ::                                                                ::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       */

        //Obtener facturas por comision
        $factxcomision = invoice::where('file_id', $id)->where('emitirfactcomision', true)->get();

        //Obtener facturas por honorarios
        $factsxhonorarios = invoice::where('file_id', $id)->where('emitirfactporhonorarios', true)->get();

        //Obtener el resto de las facturas
        $facturas = invoice::where('file_id', $id)->where('emitirfactcomision', false)->where('emitirfactporhonorarios', false)->get();

        //Obtengo las id que estan dentro del grupo de honorario y filtro las facturas y los honorios
        $hon=professional::where('group_id',2)->get();

        //obtener todos los honorarios del expediente
        $honorario = invoice::where('file_id', $id)->whereIn('professional_id', $hon)->get();
        //obtener todas las facturas del expediente
        $factura = invoice::where('file_id', $id)->whereNotIn('professional_id', $hon)->get();




        //array con los totales calculados
        $total = collect([
                'factura' => $factura->sum('cuantia_factura'),
                'cliente' => $factura->sum('cuantia_cliente'),
                'empresa' => $factura->sum('cuantia_empresa'),
                'indemnizacion' => $factura->sum('cuantia_indemnizacion'),
            ]);

        //Cálculo para obtener el beneficio
        $beneficio1 = round(($facturas->sum('cuantia_factura') - $facturas->sum('cuantia_empresa')), 2);

        //Cáculo para obtener el beneficio de facturas por comisión
        $beneficio2 = round(($factxcomision->sum('cuantia_factura') - $factxcomision->sum('cuantia_empresa') - ((($factxcomision->sum('cuantia_factura') - $factxcomision->sum('cuantia_empresa')) * 21) / 100)), 2);

        //Cálculo para obtener el beneficio de las facturas por honorarios
        $beneficio3 = round(($factsxhonorarios->sum('cuantia_factura') + (($factsxhonorarios->sum('cuantia_factura') * 21) / 100)), 2);

        $beneficio = $beneficio1 + $beneficio2 + $beneficio3;

        /*
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::                                                                ::
::            Pestaña de documentos                               ::
::                                                                ::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
*/


        $documentos=Document::where('file_id',$id)->get();

        /*
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::                                                                ::
       ::           pestaña notas del expediente                         ::
       ::                                                                ::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       */
        $notas = note::where('file_id', $id)->orderBy('fecha', 'desc')->get();

        return view('files.show', [
            'expediente' => $consulta,
            'profesionales' => $prof,
            'facturas' => $factura,
            'honorarios' => $honorario,
            'total' => $total,
            'beneficio' => $beneficio,
            'notas' => $notas,
            'documenton'=>$documentos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $expediente = File::findorFail($id);
        $sort = sort::all()->pluck('nombre', 'id')->prepend('Ninguno', '0');
        //Recogiendo datos de los select de formalidad
        $categoria = formality::all()->unique('categoria')->pluck('categoria', 'categoria')->prepend('Ninguno', '');
        $procedimiento = formality::all()->pluck('nombre', 'id');
        //recogiendo datos de aseguradora
        $aseguradora = insurer::all()->pluck('nombre', 'id');
        $tramiciasel = processor::all()->pluck('nombre', 'id');
        $tramicia = processor::findorfail($expediente->processor_id);
        $fase = phase::all()->pluck('nombre', 'id');
        $abogado = professional::where('group_id', 1)->pluck('Nombre', 'id');
        return view('files.edit', [
            'expediente' => $expediente,
            'sort' => $sort,
            'categoria' => $categoria,
            'aseguradora' => $aseguradora,
            'procedimiento' => $procedimiento,
            'abogado' => $abogado,
            'fase' => $fase,
            'tramicia' => $tramicia,
            'tramiciasel' => $tramiciasel,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\file $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\file $request, $id)
    {
        //
        $expediente = file::findorFail($id);
        $expediente->fill($request->except(['formalidad']))->save();

        return redirect()->action('filesController@show', ['id' => $id])->with('message', 'Expediente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        file::destroy($id);

        return redirect('cliente')->with('message', 'Expediente eliminado');
    }
}
