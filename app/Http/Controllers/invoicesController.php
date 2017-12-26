<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoices;
use App\models\group;
use App\models\invoice;
use App\models\professional;
use Illuminate\Http\Request;


Class InvoicesController extends Controller
{
    public function __construct()
    {
        //datos empresa
        $this->metodos=collect([
                                   [
                                       'id' => '1',
                                       'nombre' => 'Sin pagar',
                                   ],
                                   [
                                       'id' => '2',
                                       'nombre' => 'En Metalico',
                                   ],
                                   [
                                       'id' => '3',
                                       'nombre' => 'Transferencia Bancaria',
                                   ],
                                   [
                                       'id' => '4',
                                       'nombre' => 'Tarjeta',
                                   ],
                                   [
                                       'id' => '5',
                                       'nombre' => 'Talón/Pagaré',
                                   ],
                               ]);

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

        $factura=invoice::all();
        $total=collect(
            [
                'factura'=>$factura->sum('cuantia_factura'),
                'cliente'=>$factura->sum('cuantia_cliente'),
                'empresa'=>$factura->sum('cuantia_empresa'),
                'indemnizacion'=>$factura->sum('cuantia_indemnizacion'),
            ]
        );
        $beneficio=$factura->sum('cuantia_factura')-$factura->sum('cuantia_empresa');
        return view('invoices.index',[
            'facturas'=>$factura,
            'total'=>$total,
            'beneficio'=>$beneficio,
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
        $factura=new invoice;
        $sector=Group::all()->pluck('nombre','id')->prepend('Seleccione sector');
        $profesional=Professional::orderBy('Nombre','asc')->pluck('Nombre','id');
        $metodos=$this->metodos->pluck('nombre','id');

        return view('invoices.create',[
            'factura'=>$factura,
            'sector'=>$sector,
            'metodos'=>$metodos,
            'profesional'=>$profesional
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\invoices $request
     * @return \Illuminate\Http\Response
     */
    public function store(invoices $request)
    {
        //
        $invoice=new invoice;
        if ($request->except('grupo')) {
            $invoice->fill($request->except('grupo'))->save();
        }


        return redirect()->action('filesController@show',['file'=>$request->input('file_id').'#facturas'])->with('message','Factura agregada correctamente');
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
        $factura=invoice::where('file_id',$id)->get();
        $total=collect(
            [
                'factura'=>$factura->sum('cuantia_factura'),
                'cliente'=>$factura->sum('cuantia_cliente'),
                'empresa'=>$factura->sum('cuantia_empresa'),
                'indemnizacion'=>$factura->sum('cuantia_indemnizacion'),
            ]
        );
        $beneficio=$factura->sum('cuantia_factura')-$factura->sum('cuantia_empresa');
        return view('invoices.show',[
            'facturas'=>$factura,
            'total'=>$total,
            'beneficio'=>$beneficio,
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
        $factura=invoice::findorFail($id);
        $sector=group::all()->pluck('nombre','id');
        $profesional=professional::orderBy('Nombre','asc')->pluck('Nombre','id');
        $metodos=$this->metodos->pluck('nombre','id');
        $sector_id=$factura->profesional->group_id;
        return view('invoices.edit',[
            'factura'=>$factura,
            'sector'=>$sector,
            'sectoredit'=>$sector_id,
            'metodos'=>$metodos,
            'profesional'=>$profesional
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
        $factura=invoice::findorFail($id);
        $factura->fill($request->except('grupo'))->save();
        return redirect()->action('filesController@show',['id'=>$factura->file_id.'#facturas'])->with('message','Factura actualizada');
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
        invoice::destroy($id);
        return redirect('invoices')->with('message','Factura eliminada');
    }
}
