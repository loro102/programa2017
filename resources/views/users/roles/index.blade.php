@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('agenteController@create','Añadir un nuevo agente',[],[]) }} |
            {{ link_to_action('agenteController@index','Agentes',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Rol</th>
                <th class="col-md-3">Permisos</th>

            </tr>
            @forelse($agentes as $agente)
                <tr>
                    <td class="col-md-2">{{link_to_action('agenteController@show',$agente->nombre,['id'=> $agente->id],[])}}</td>
                    <td class="col-md-3">{{$agente->direccion}}</td>
                    <td class="col-md-1">{{$agente->localidad}}</td>
                    <td class="col-md-1">{{$agente->codigo_postal}}</td>
                    <td class="col-md-1">{{$agente->telefono1}}||
                        {{$agente->telefono2}}||
                        {{$agente->movil}}||
                        {{$agente->fax}}
                    </td>
                    <td class="col-md-1">{{$agente->email}}</td>
                    <td class="col-md-1">{{$agente->profesion}}</td>
                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay agentes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection