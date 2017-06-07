<?php

namespace App\Http\Controllers;

use App\models\group;
use App\models\invoice;
use App\models\professional;
use Illuminate\Http\Request;

class invoicesController extends Controller
{
    public function __construct()
    {
        //datos empresa
        $this->metodos=collect([
                                   [
                                       'id' => '1',
                                       'nombre' => 'Sin pagar',
                                   ],
                                   [
                                       'id' => '2',
                                       'nombre' => 'En Metalico',
                                   ],
                                   [
                                       'id' => '3',
                                       'nombre' => 'Transferencia Bancaria',
                                   ],
                                   [
                                       'id' => '4',
                                       'nombre' => 'Tarjeta',
                                   ],
                                   [
                                       'id' => '5',
                                       'nombre' => 'Talón/Pagaré',
                                   ],
                               ]);



        //$dt = Carbon::parse();
        //$this->largo = largo;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $factura=invoice::all();
        $total=collect(
            [
                'factura'=>$factura->sum('cuantia_factura'),
                'cliente'=>$factura->sum('cuantia_cliente'),
                'empresa'=>$factura->sum('cuantia_empresa'),
                'indemnizacion'=>$factura->sum('cuantia_indemnizacion'),
            ]
        );
        //$total=$total->toArray();
        $beneficio=$factura->sum('cuantia_factura')-$factura->sum('cuantia_empresa');
        //dd($total->toArray());
        return view('invoices.index',[
            'facturas'=>$factura,
            'total'=>$total,
            'beneficio'=>$beneficio,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $factura=new invoice;
        $sector=group::all()->pluck('nombre','id')->prepend('Seleccione sector');
        $profesional=professional::orderBy('nombre','asc')->pluck('nombre','id');
        $metodos=$this->metodos->pluck('nombre','id');

        return view('invoices.create',[
            'factura'=>$factura,
            'sector'=>$sector,
            'metodos'=>$metodos,
            'profesional'=>$profesional
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
        $invoice=new invoice;
        $invoice->fill($request->except('grupo'))->save();

        //dd($request->input());
        return redirect()->action('filesController@show',['file'=>$request->input('file_id')])->with('message','Factura agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $factura=invoice::where('file_id',$id)->get();
        $total=collect(
            [
                'factura'=>$factura->sum('cuantia_factura'),
                'cliente'=>$factura->sum('cuantia_cliente'),
                'empresa'=>$factura->sum('cuantia_empresa'),
                'indemnizacion'=>$factura->sum('cuantia_indemnizacion'),
            ]
        );
        //$comision=$factura->where('emitirfactcomision',1)->get();
        //$total=$total->toArray();
        $beneficio=$factura->sum('cuantia_factura')-$factura->sum('cuantia_empresa');
        //$agente=customer::findorfail($id)->agent;
        //$expedientes=file::where('customer_id',$id)->get();
        //$expedientes=$cliente->files()->get();
        //dd($comision);
        return view('invoices.show',[
            //'cliente'=> $factura,
            //'agente'=>$agente,
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
        $factura=invoice::findorFail($id);
        return view('invoices.edit',[
            'factura'=>$factura,
        ]);
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
        $factura=invoice::findorFail($id);
        $factura->fill($request->all())->save();
        return redirect()->action('invoicesController@edit',['id'=>$factura->file_id])->with('message','Factura actualizada');
        //return redirect()->action('invoicesController@edit',['id'=>$id])->with('message','Factura actualizada');

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
        invoice::destroy($id);
        return redirect('invoices')->with('message','Factura eliminada');
    }
}
