<?php

namespace App\Http\Controllers;

use App\models\invoice;
use Illuminate\Http\Request;

class invoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $factura=invoice::paginate(10);
        return view('invoices.index',['facturas'=>$factura]);
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
        $profesional=professional::orderBy('nombre','asc')->pluck('nombre','id');

        return view('invoices.create',[
            'factura'=>$factura,
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
        invoice::create($request->input());

        //dd($request->input());
        return redirect('invoices')->with('message','Se ha añadido una nueva factura');
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
        $factura=invoice::findorFail($id);
        //$agente=customer::findorfail($id)->agent;
        //$expedientes=file::where('customer_id',$id)->get();
        $expedientes=$cliente->files()->get();
        //dd($expedientes);
        return view('clientes.show',[
            'cliente'=> $cliente,
            //'agente'=>$agente,
            'expedientes'=>$expedientes
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
