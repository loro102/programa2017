@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('formalitiesController@create','Añadir un nuevo procedimiento',[],[]) }} |
            {{ link_to_action('formalitiesController@index','Procedimientos',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
                <th class="col-md-2">Categoria</th>
            </tr>
            @forelse($formalities as $formality)
                <tr>
                    <td class="col-md-2">{{link_to_action('formalitiesController@edit',$formality->nombre,['id'=> $formality->id],[])}}</td>
                    <td class="col-md-2">{{$formality->categoria}}</td>

                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay clases de expedientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection