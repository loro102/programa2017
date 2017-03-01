@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('facturaController@create','Añadir un nuevo factura',[],[]) }} |
            {{ link_to_action('facturaController@index','facturas',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Fecha</th>
                <th class="col-md-3">Nº</th>
                <th class="col-md-2">Descripcion</th>
                <th class="col-md-1">Importe Cliente</th>
                <th class="col-md-1">Importe Empresa</th>
                <th class="col-md-2">Cliente</th>

                <th class="col-md-1">Actividad</th>
            </tr>
            @forelse($facturas as $factura)
                <tr>
                    <td class="col-md-2">{{link_to_action('invoicesController@show',$factura->fecha,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-3">{{link_to_action('invoicesController@show',$factura->numero,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->descripcion,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->cuantia_cliente,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->cuantia_empresa,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{$factura->profesion}}</td>
                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay facturas introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection