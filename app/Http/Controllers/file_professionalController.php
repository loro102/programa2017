<?php

namespace App\Http\Controllers;

use App\models\file_professional;
use App\models\group;
use App\models\professional;
use Illuminate\Http\Request;

Class File_ProfessionalController extends Controller
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
        $profcli=file_professional::paginate(10);
        return view('formalities.index',['formalities'=>$formalities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prof=new file_professional();
        $grupo=group::all()->pluck('nombre','id')->prepend('Seleccione la clase de professional');
        return view('files.professional_tab.create',['prof'=>$prof,'grupo'=>$grupo]);
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
        file_professional::create($request->input());
        return redirect()->action('filesController@show',['file'=>$file.'#profesionales'])->with('message','profesional agregado correctamente');

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
        $f=file_professional::findorfail($id);
        $fil=$f->file_id;
        file_professional::destroy($id);
        return redirect()->action('filesController@show',['file'=>$fil.'#profesionales'])->with('message','profesional removido correctamente');

    }


}
