@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('sortController@create','Añadir un nuevo agente',[],[]) }} |
            {{ link_to_action('sortController@index','Agentes',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
            </tr>
            @forelse($sorts as $sort)
                <tr>
                    <td class="col-md-2">{{link_to_action('sortController@edit',$sort->nombre,['id'=> $sort->id],[])}}</td>

                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay clases de expedientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection