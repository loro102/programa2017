@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('professionalController@create','Añadir un nuevo profesional',[],[]) }} |
            {{ link_to_action('professionalController@index','profesionales',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
                <th class="col-md-3">grupo</th>
                <th class="col-md-1">especialidad</th>
                <th class="col-md-1"></th>
                <th class="col-md-2"></th>
                <th class="col-md-2"></th>
                <th class="col-md-1"></th>
            </tr>
            @forelse($profesionales as $profesional)
                <tr>
                    <td class="col-md-2">{{link_to_action('professionalController@show',$profesional->Nombre,['id'=> $profesional->id],[])}}</td>
                    <td class="col-md-3">{{$profesional->group_id}}</td>
                    <td class="col-md-1">{{$profesional->especialidad}}</td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1"></td>
                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay profesionales introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection