<?php

namespace App\Http\Controllers;

use App\Http\Requests\profesional;
use App\models\group;
use App\models\professional;
use Illuminate\Http\Request;

Class ProfessionalController extends Controller
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
        $profesional=professional::paginate(10);
        return view('professional.index',[
            'profesionales'=> $profesional,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $profesional=new professional;
        $grupo=group::all()->pluck('nombre','id')->prepend('Seleccione grupo profesional');
        return view('professional.create',[
            'profesional'=>$profesional,
            'grupo'=>$grupo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\profesional $request
     * @return \Illuminate\Http\Response
     */
    public function store(profesional $request)
    {
        //
        professional::create($request->input());
        return redirect('profesionals')->with('message','Se ha añadido un nuevo profesional');
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
        $profesional=professional::findorFail($id);
        return view('professional.show',[
            'profesional'=> $profesional,
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
        $profesional=professional::findorFail($id);
        $grupo=group::all()->pluck('nombre','id')->prepend('Seleccione grupo profesional');
                return view('professional.edit',[
            'profesional'=>$profesional,
            'grupo'=>$grupo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\profesional $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(profesional $request, $id)
    {
        //
        $profesional=professional::findorFail($id);
        $profesional->fill($request->all())->save();
        return redirect()->action('professionalController@show',['id'=>$id])->with('message','Profesional actualizado');
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
        professional::destroy($id);
        return redirect('cliente')->with('message','Profesional eliminado');
    }

    public function getprofessional(Request $request,$id)
    {
        //
        $data=professional::where('group_id',$id)
            ->select('id','Nombre')
            ->get();
        return response()->json($data);
    }
}
