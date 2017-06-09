<?php

namespace App\Http\Controllers;



use App\Http\Requests\tramicia;
use App\models\processor;
use Illuminate\Http\Request;

class processorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $processor=processor::all();
        return view('processor.index',['processors'=>$processor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data=$request->aseguradora;
        //dd($data);
        $tramitador=new processor;
        return view('processor.create',[
            'tramitador'=>$tramitador,
            'aseguradora'=>$data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tramicia $request)
    {
        //
        $data=$request->input('insurer_id');
        //dd($data);
        processor::create($request->input());

        return redirect()->action('processorController@show',['id'=>$data])->with('message','Se ha añadido un nuevo tramitador');
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
        $data=$id;
        $processor=processor::where('insurer_id',$id)->get();
        return view('processor.show',['processors'=>$processor,'aseguradora'=>$data]);
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
        $processor=processor::findorFail($id);
        return view('processor.edit',[
            'processor'=>$processor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tramicia $request, $id)
    {
        //
        $processor=processor::findorFail($id);
        $processor->fill($request->all())->save();
        return redirect()->action('processorController@show',['id'=>$processor->insurer_id])->with('message','Tramitador actualizado');


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
        $processor=processor::findorfail($id);
        processor::destroy($id);
        return redirect()->action('processorController@show',['id'=>$processor->insurer_id])->with('message','El tramitador se ha eliminado correctamente');

    }
    public function getprocessor(Request $request,$id)
    {
        //
        $data=processor::where('insurer_id',$id)
            ->get();
        //dd($data);
        return response()->json($data);
        //return view('files.create')->with('data',$data);
    }
}
