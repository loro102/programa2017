<?php

namespace App\Http\Controllers;

use App\models\sort;
use Illuminate\Http\Request;

Class SortController extends Controller
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
        $sort=sort::paginate(10);
        return view('sort.index',['sorts'=>$sort]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sort=new sort;
        return view('sort.create',['sort'=>$sort]);
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
        sort::create($request->input());

        //dd($request->input());
        return redirect('sort')->with('message','Se ha añadido una nueva clase de expediente');
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
        $sort=sort::findorFail($id);
        return view('sort.edit',[
            'sort'=>$sort
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
        $sort=sort::findorFail($id);
        $sort->fill($request->all())->save();
        return redirect()->action('sortController@index')->with('message','La Clase de Expediente se ha actualizado');
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
        sort::destroy($id);
        return redirect('sort')->with('message','La clase de Expediente se ha eliminado correctamente');
    }
}
