<?php

namespace App\Http\Controllers;

use App\models\file_professional;
use App\models\formality;
use App\models\insurer;
use App\models\invoice;
use App\models\sort;
use Illuminate\Http\Request;
use App\models\file;
use App\models\customer;
use App\models\professional;
use Illuminate\Support\Facades\DB;

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
        $sort=sort::all()->pluck('nombre','id')->prepend('Ninguno','');
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria')->prepend('Ninguno','');
        $aseguradora=insurer::all()->pluck('nombre','id')->prepend('Ninguno','');
        //$abogado=professional::all()->pluck('nombre','id')->prepend('Ninguno','');

        //$client=$cliente->pluck('fullname','id');
        //dd($cliente);
        return view('files.create',[
            'expediente'=>$expediente,
            //'cliente'=>$cliente,
            'sort'=>$sort,
            'categoria'=>$categoria,
            'aseguradora'=>$aseguradora,
            //'abogado'=>$abogado
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $consulta2=customer::find($consulta->customer_id);


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
        $factura=invoice::where('file_id',$id)->get();
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
        return view('files.show',[
            'expediente'=> $consulta,
            'cliente'=>$consulta2,
            'profesionales'=>$prof,
            'facturas'=>$factura,
            'total'=>$total,
            'beneficio'=>$beneficio,
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
