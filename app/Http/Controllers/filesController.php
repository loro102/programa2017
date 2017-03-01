<?php

namespace App\Http\Controllers;

use App\models\formality;
use App\models\insurer;
use App\models\sort;
use Illuminate\Http\Request;
use App\Models\file;
use App\Models\customer;
use App\Models\professional;
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
        $cliente=customer::all()->pluck('fullname','id')->prepend('Ninguno','');
        $sort=sort::all()->pluck('nombre','id')->prepend('Ninguno','');
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria')->prepend('Ninguno','');
        $aseguradora=insurer::all()->pluck('nombre','id')->prepend('Ninguno','');
        //$abogado=professional::all()->pluck('nombre','id')->prepend('Ninguno','');

        //$client=$cliente->pluck('fullname','id');
        //dd($cliente);
        return view('files.create',[
            'expediente'=>$expediente,
            'cliente'=>$cliente,
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
