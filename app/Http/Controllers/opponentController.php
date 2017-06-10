<?php

namespace App\Http\Controllers;

use App\models\insurer;
use App\models\opponent;
use App\models\processor;
use Illuminate\Http\Request;

class opponentController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contrario=new opponent;
        $aseguradora=insurer::all()->pluck('nombre','id');
        $tramitador=processor::all()->pluck('nombre','id');

        return view('opponent.create',[
            'contrario'=>$contrario,
            'aseguradora'=>$aseguradora,
            'tramitador'=>$tramitador,
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
        $file=$request->input('file_id');
        opponent::create($request->except('insurer_id'));

        //dd($request->input());
        return redirect()->action('opponentController@create',['file'=>$file])->with('message','Contrario agregado correctamente');
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
        $contrario=opponent::findorfail($id);
        $aseguradora=insurer::findorfail($contrario->processor->insurer_id)->pluck('nombre');

        return view('opponent.show',[
            'contrario'=>$contrario,
            'aseguradora'=>$aseguradora
            //'aseguradora'=>$aseguradora,
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
        $processor=opponent::findorFail($id);
        $aseguradora=insurer::all()->pluck('nombre','id');
        $tramitador=processor::all()->pluck('nombre','id');
        return view('opponent.edit',[
            'contrario'=>$processor,
            'aseguradora'=>$aseguradora,
            'tramitador'=>$tramitador,
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
        $contrario=opponent::findorFail($id);
        $contrario->fill($request->all())->save();
        return redirect()->action('opponentController@show',['id'=>$contrario->id])->with('message','Tramitador actualizado');
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
