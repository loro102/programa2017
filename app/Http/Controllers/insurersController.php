<?php

namespace App\Http\Controllers;

use App\models\insurer;
use App\models\processor;
use Illuminate\Http\Request;
use App\Http\Requests\aseguradora;

class insurersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aseguradora=insurer::all();
        return view('insurers.index',['aseguradoras'=>$aseguradora]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aseguradora=new insurer;
        return view('insurers.create',[
            'aseguradora'=>$aseguradora,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(aseguradora $request)
    {
        //
        //dd($request->input());
        insurer::create($request->input());

        return redirect('insurers')->with('message','Se ha añadido una nueva compañia de seguros');
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
    public function update(aseguradora $request, $id)
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
        insurer::destroy($id);
        return redirect('insurers')->with('message','Aseguradora eliminado');
    }

}
