<?php

namespace App\Http\Controllers;

use App\Http\Requests\formalidad;
use App\models\formality;
use Illuminate\Http\Request;

Class FormalitiesController extends Controller
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
        $formalities=formality::paginate(10)->sortBy('categoria');
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
        $formality=new formality;
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria');
        return view('formalities.create',['formality'=>$formality,'categoria'=>$categoria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\formalidad $request
     * @return \Illuminate\Http\Response
     */
    public function store(formalidad $request)
    {
        //
        formality::create($request->input());
        return redirect('formality')->with('message','Se ha añadido un nuevo procedimiento');
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
        $formality=formality::findorFail($id);
        $categoria=formality::all()->unique('categoria')->pluck('categoria','categoria');
        return view('formalities.edit',[
            'formality'=>$formality,
            'categoria'=>$categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\formalidad $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(formalidad $request, $id)
    {
        //
        $formality=formality::findorFail($id);
        $formality->fill($request->all())->save();
        return redirect()->action('formalitiesController@index')->with('message','El procedimiento se ha actualizado');

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
        formality::destroy($id);
        return redirect('formality')->with('message','El procedimiento se ha eliminado correctamente');
    }

    public function getformality(Request $request,$id)
    {
        //
        $data=formality::where('categoria',$id)
            ->select('id','nombre')
        ->get();
        return response()->json($data);
    }


}
