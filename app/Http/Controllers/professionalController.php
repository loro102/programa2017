<?php

namespace App\Http\Controllers;

use App\models\professional;
use Illuminate\Http\Request;

class professionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesional=professional::paginate(10);
        //dd($cliente);
        return view('professional.index',[
            'profesionales'=> $profesional,
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
        $profesional=new professional;
        //$agente=agent::orderBy('nombre','asc')->pluck('nombre','id');

        return view('clientes.create',[
            'profesional'=>$profesional,
            //'agente'=>$agente
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
        professional::create($request->input());

        //dd($request->input());
        return redirect('cliente')->with('message','Se ha añadido un nuevo cliente');
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
        $profesional=professional::findorFail($id);
        //$agente=customer::findorfail($id)->agent;
        //$expedientes=file::where('customer_id',$id)->get();
        //$expedientes=$cliente->files()->get();
        //dd($expedientes);
        return view('clientes.show',[
            'profesional'=> $profesional,
            //'agente'=>$agente,
            //'expedientes'=>$expedientes
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
        $profesional=professional::findorFail($id);
        //$agente=agent::orderBy('nombre','asc')->pluck('nombre','id');
        return view('clientes.edit',[
            'profesional'=>$profesional,
            //'agente'=>$agente
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
        $profesional=professional::findorFail($id);
        $profesional->fill($request->all())->save();
        return redirect()->action('clientes@show',['id'=>$id])->with('message','Cliente actualizado');
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
        professional::destroy($id);
        return redirect('cliente')->with('message','Cliente eliminado');
    }
}
