<?php

namespace App\Http\Controllers;

//use App\models\file;
use Illuminate\Http\Request;
use App\models\customer;
use App\models\agent;
//use Illuminate\Support\Facades\Storage;

Class clientes extends Controller
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
        $cliente=customer::paginate(10);
        return view('clientes.index', [
            'clientes'=> $cliente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Crea un nuevo registro en la tabla de customers
        $cliente=new customer;
        $agente=agent::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('clientes.create', [
            'cliente'=>$cliente,
            'agente'=>$agente
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\customer $request)
    {
        //Crea un nuevo registro para el cliente
        customer::create($request->input());
        //$cliente=customer::all();
        //Storage::makeDirectory('storage/cliente/'.$cliente->last()->id);
        return redirect('cliente')->with('message', 'Se ha añadido un nuevo cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=customer::findorFail($id);
        $expedientestraf=$cliente->files()->where('sort_id', 1)->get();
        $expedientesotros=$cliente->files()->where('sort_id', '!=', 1)->get();
        return view('clientes.show', [
            'cliente'=> $cliente,
            'expedientestraf'=>$expedientestraf,
            'expedientes'=>$expedientesotros
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
        $cliente=customer::findorFail($id);
        $agente=agent::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        return view('clientes.edit', [
            'cliente'=>$cliente,
            'agente'=>$agente
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
        $cliente=customer::findorFail($id);
        $cliente->fill($request->all())->save();
        return redirect()->action('clientes@show', ['id'=>$id])->with('message', 'Cliente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::destroy($id);
        return redirect('cliente')->with('message', 'Cliente eliminado');
    }
}
