<?php

namespace App\Http\Controllers;

use App\models\document;
use Illuminate\Http\Request;

class documentController extends Controller
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
        $documento=new document;
        return view('documentos.create',['documentos'=>$documento]);


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
        document::create($request->input());

        return redirect()->action('filesController@show',['id'=>$file.'#documentos'])->with('message','Documento agregado correctamente');

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
        $documento=document::findorfail($id);
        return view('documentos.edit',['documento'=>$documento]);
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
        $documento=document::findorfail($id);
        $documento->fill($request->all())->save();
        return redirect()->action('filesController@show',['id'=>$file.'#documentos'])->with('message','Documento actualizado correctamente')
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
        $documento=document::findorfail($id);
        $file=$documento->file_id;
        document::destroy($id);
        return redirect()->action('filesController@show',['id'=>$file.'#documentos'])->with('message','Documento Borrado correctamente');

    }
}
