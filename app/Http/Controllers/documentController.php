<?php

namespace App\Http\Controllers;

use App\Http\Requests\documento;
use App\models\document;

Class DocumentController extends Controller
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
        return(null);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return(null);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\documento $request
     * @return \Illuminate\Http\Response
     */
    public function store(documento $request)
    {
        //
        document::create($request->input());

        return redirect()->action('filesController@show', ['id' => $request->file_id.'#documentos'])->with('message',
            'Documento agregado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return(null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $documento = document::findorfail($id);

        return view('files.documentos.edit', ['documento' => $documento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\documento $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(documento $request, $id)
    {
        //
        $documento = document::findorfail($id);
        $documento->fill($request->all())->save();

        return redirect()->action('filesController@show', ['id' => $request->file_id.'#documentos'])->with('message',
            'Documento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $documento = document::findorfail($id);
        $file = $documento->file_id;
        document::destroy($id);

        return redirect()->action('filesController@show', ['id' => $file.'#documentos'])->with('message',
            'Documento Borrado correctamente');
    }
}
