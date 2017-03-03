<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\agent;


class agenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agente=agent::paginate(10);
        return view('agentes.index',['agentes'=>$agente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $agente=new agent;
        return view('agentes.create',['agente'=>$agente]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\agent $request)
    {
        //
        agent::create($request->input());

        //dd($request->input());
        return redirect('agente')->with('message','Se ha añadido un nuevo agente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agente=agent::findorFail($id);
        //dd($agent);
        return view('agentes.show',[
            'agente'=> $agente
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
        $agente=agent::findorFail($id);
        return view('agentes.edit',[
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
        //
        $agente=agent::findorFail($id);
        $agente->fill($request->all())->save();
        return redirect()->action('agenteController@show',['id'=>$id])->with('message','Agente actualizado');
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
        agent::destroy($id);
        return redirect('agente')->with('message','Agente eliminado');
    }
}
