@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('filesController@create','Añadir un nuevo expediente',[],[]) }} |
            {{ link_to_action('filesController@index','Expedientes',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Cliente</th>
                <th class="col-md-3">Descripcion expediente</th>
                <th class="col-md-2">Clasificacion</th>
                <th class="col-md-2">Fecha del suceso</th>
                <th class="col-md-2">Fecha de apertura</th>
                <th class="col-md-1">Puntos</th>

            </tr>
            @forelse($expedientes as $expediente)
                <tr>
                    <td class="col-md-2">{{link_to_action('filesController@show',$expediente->customer_id,['id'=> $expediente->id],[])}} </td>
                    <th class="col-md-3">{{$expediente->descripcion_expediente}}</th>
                    <th class="col-md-2">{{$expediente->sort_file_id}}</th>
                    <th class="col-md-2">{{$expediente->fecha_accidente}}</th>
                    <th class="col-md-2">{{$expediente->fechaapertura}}</th>
                    <th class="col-md-1">puntos</th>
                </tr>
            @empty
                <tr>
                <td class="col-md-12 danger">No hay expedientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection
