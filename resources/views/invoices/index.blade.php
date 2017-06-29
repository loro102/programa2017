@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Fecha</th>
                <th class="col-md-3">Nº</th>
                <th class="col-md-2">Abonado</th>
                <th class="col-md-2">Profesional</th>
                <th class="col-md-2">Descripcion</th>
                <th class="col-md-1">Importe Cliente</th>
                <th class="col-md-1">Importe Empresa</th>
                <th class="col-md-2">Importe Factura</th>

                <th class="col-md-1">Actividad</th>
            </tr>
            @forelse($facturas as $factura)
                <tr>
                    <td class="col-md-2">{{link_to_action('invoicesController@show',$factura->fechafact,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-3">{{link_to_action('invoicesController@show',$factura->numfactura,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->file->id,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->professional_id,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->descripcion,['id'=> $factura->id],[])}}</td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->cuantia_cliente,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->cuantia_empresa,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                    <td class="col-md-1">{{link_to_action('invoicesController@show',$factura->cuantia_factura,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                    <td class="col-md-1">{{$factura->profesion}}</td>
                </tr>

            @empty
                <tr>
                <td class="danger" colspan="12">No hay facturas introducidos</td>
                </tr>
            @endforelse
            <tr>
                <td class="col-md-2"></td>
                <td class="col-md-3"></td>
                <td class="col-md-1"></td>
                <td class="col-md-1"></td>
                <td class="col-md-1">Total:</td>
                <td class="col-md-1">{{array_get($total,'cliente')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                <td class="col-md-1">{{array_get($total,'empresa')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                <td class="col-md-1">{{array_get($total,'factura')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
            </tr>
            <tr>
                <td class="col-md-2"></td>
                <td class="col-md-3"></td>
                <td class="col-md-1"></td>
                <td class="col-md-1"></td>
                <td class="col-md-1">Beneficio:</td>
                <td class="col-md-1">{{$beneficio}} <span class="glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                <td class="col-md-1"></td>
                <td class="col-md-1"></td>
            </tr>
        </table>
    </div>
    @endsection
