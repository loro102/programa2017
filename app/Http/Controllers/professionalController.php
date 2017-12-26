<?php

namespace App\Http\Controllers;

use App\Http\Requests\profesional;
use App\models\group;
use App\models\Invoice;
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
        $profesional=Professional::paginate(10);
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
        $profesional=new Professional;
        $grupo=Group::all()->pluck('nombre','id')->prepend('Seleccione grupo profesional');
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
        Professional::create($request->input());
        return redirect('professionals')->with('message','Se ha añadido un nuevo profesional');
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
        $profesional=Professional::findorFail($id);
        //$factura=Invoice::where('professional_id',$id)->get();
        //$total_factura=$factura->cuantia_factura->sum();
        //dd($total_factura);
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
        $profesional=Professional::findorFail($id);
        $grupo=Group::all()->pluck('nombre','id')->prepend('Seleccione grupo profesional');
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
        $profesional=Professional::findorFail($id);
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
        Professional::destroy($id);
        return redirect('cliente')->with('message','Profesional eliminado');
    }

    public function getprofessional(Request $request,$id)
    {
        //
        $data=Professional::where('group_id',$id)
            ->select('id','Nombre')
            ->get();
        return response()->json($data);
    }
}
