<?php

namespace App\Http\Controllers;

use App\models\file_professional;
use App\models\formality;
use App\models\insurer;
use App\models\invoice;
use App\models\note;
use App\models\phase;
use App\models\processor;
use App\models\sort;
use App\User;
use Illuminate\Http\Request;
use App\models\file;
use App\models\customer;
use App\models\professional;
use Illuminate\Support\Facades\DB;
use function isNull;
use const null;
use Storage;
use function storage_path;

class filesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expediente=file::paginate(10);
        return view('files.index',['expedientes'=>$expediente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $expediente=new file;
        //$cliente=customer::all()->pluck('fullname','id')->prepend('Ninguno','');
        $sort=sort::all()->pluck('nombre','id')->prepend('Ninguno','1');
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria')->prepend('Ninguno','1');
        $abogado=professional::where('group_id',1)->where('activo',true)->pluck('Nombre','id');
        $aseguradora=insurer::all()->pluck('nombre','id')->prepend('Seleccione','1');
        $processor=processor::where('insurer_id',1)->pluck('nombre','id');
        $formalidad=formality::findorfail(1)->pluck('nombre','id');
        $fase=phase::all()->pluck('nombre','id')->prepend('Ninguno','1');
        //$abogado=professional::all()->pluck('nombre','id')->prepend('Ninguno','');

        //$client=$cliente->pluck('fullname','id');
        //dd($cliente);
        return view('files.create',[
            'expediente'=>$expediente,
            'processor'=>$processor,
            'sort'=>$sort,
            'categoria'=>$categoria,
            'formalidad'=>$formalidad,
            'aseguradora'=>$aseguradora,
            'abogado'=>$abogado,
            'fase'=>$fase,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\file $request)
    {
        //
        //dd($request);
        $file=new file;
        $file->fill($request->except(['formalidad','formalities_id']))->save();
        $files=file::where('customer_id',$request->customer_id)->get();
        
        //Storage::makeDirectory('storage/cliente/'.$request->customer_id.'/'.$files->last()->id);




        return redirect()->action('clientes@show',['id'=>$request->customer_id])->with('message','Se ha añadido un nuevo expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

        $consulta=file::find($id);
        $contrario=$consulta->opponent;
        //dd($consulta->opponent);

        /*
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::                                                                ::
       ::              Pestaña de profesionales                          ::
       ::                                                                ::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       */
        $prof=file_professional::where('file_id',$id)->get();

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
        $factxcomision=invoice::where('file_id',$id)
            ->where('emitirfactcomision',true)
            ->get();

        //Obtener facturas por honorarios
        $factsxhonorarios=invoice::where('file_id',$id)
            ->where('nofactporhonorarios',true)
            ->get();

        //Obtener el resto de las facturas
        $facturas=invoice::where('file_id',$id)
            ->where('emitirfactcomision',false)
            ->where('nofactporhonorarios',false)
            ->get();

        //obtener todas las facturas
        $factura=invoice::where('file_id',$id)
            ->where('honorario',false)
            ->get();
        //obtener todos los honorarios
        $honorario=invoice::where('file_id',$id)
            ->where('honorario',true)
            ->get();
        //dd($facturas);

        //array con los totales calculados
        $total=collect(
            [
                'factura'=>$factura->sum('cuantia_factura'),
                'cliente'=>$factura->sum('cuantia_cliente'),
                'empresa'=>$factura->sum('cuantia_empresa'),
                'indemnizacion'=>$factura->sum('cuantia_indemnizacion'),
            ]
        );

        //Cálculo para obtener el beneficio
        $beneficio1=round(($facturas->sum('cuantia_factura')-$facturas->sum('cuantia_empresa')),2);

        //Cáculo para obtener el beneficio de facturas por comisión
        $beneficio2=round(($factxcomision->sum('cuantia_factura')-$factxcomision->sum('cuantia_empresa')-((($factxcomision->sum('cuantia_factura')-$factxcomision->sum('cuantia_empresa'))*21)/100)),2);

        //Cálculo para obtener el beneficio de las facturas por honorarios
        $beneficio3=round(($factsxhonorarios->sum('cuantia_factura')+(($factsxhonorarios->sum('cuantia_factura')*21)/100)),2);

        $beneficio=$beneficio1+$beneficio2+$beneficio3;
        //dd($beneficio1,$beneficio2,$beneficio3,$beneficio);

        //dd($expedientes);


        /*
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::                                                                ::
::            Pestaña de documentos                               ::
::                                                                ::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
*/
        //$documentos= Storage::disk('cliente')->Files($consulta->customer_id.'/'.$consulta->id);
        //Storage::disk('cliente')->url($documentos);

        //dd($url);


        /*
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::                                                                ::
       ::            Boton notas del expediente                          ::
       ::                                                                ::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
       */
        $notas=note::where('file_id',$id)->get();


        return view('files.show',[
            'expediente'=> $consulta,
            'profesionales'=>$prof,
            'facturas'=>$factura,
            'honorarios'=>$honorario,
            'total'=>$total,
            'beneficio'=>$beneficio,
            'notas'=>$notas,
            //'documentos'=>$documentos,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $expediente=file::findorFail($id);

        //$cliente=customer::all()->pluck('fullname','id')->prepend('Ninguno','');
        $sort=sort::all()->pluck('nombre','id')->prepend('Ninguno','0');
        //Recogiendo datos de los select de formalidad
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria')->prepend('Ninguno','');
        //$a=formality::findorfail($expediente->formality_id);
        $procedimiento= formality::all()->pluck('nombre','id');
        //recogiendo datos de aseguradora
        $aseguradora=insurer::all()->pluck('nombre','id');
        $tramiciasel=processor::all()->pluck('nombre','id');
        $tramicia=processor::findorfail($expediente->processor_id);
        //$abogado=professional::all()->pluck('nombre','id')->prepend('Ninguno','');
        $fase=phase::all()->pluck('nombre','id');
        $abogado=professional::where('group_id',1)->pluck('Nombre','id');

        //$client=$cliente->pluck('fullname','id');
        //dd($abogado);
        return view('files.edit',[
            'expediente'=>$expediente,
            //'cliente'=>$cliente,
            'sort'=>$sort,
            'categoria'=>$categoria,
            'aseguradora'=>$aseguradora,
            'procedimiento'=>$procedimiento,
            'abogado'=>$abogado,
            'fase'=>$fase,
            //'cat'=>$a,
            'tramicia'=>$tramicia,
            'tramiciasel'=>$tramiciasel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\file $request, $id)
    {
        //
        $expediente=file::findorFail($id);
        $expediente->fill($request->except(['formalidad']))->save();
        return redirect()->action('filesController@show',['id'=>$id])->with('message','Expediente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        file::destroy($id);
        return redirect('cliente')->with('message','Expediente eliminado');
    }
}
