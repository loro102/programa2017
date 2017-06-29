@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('professionalController@create','Añadir un nuevo profesional',[],['class' => 'btn btn-sm btn-primary']) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
                <th class="col-md-3">Grupo</th>
                <th class="col-md-1">Especialidad</th>
                <th class="col-md-1">Localidad</th>
                <th class="col-md-2">Teléfono</th>
                <th class="col-md-2">Fax</th>
                <th class="col-md-1">Email</th>
            </tr>
            @forelse($profesionales as $profesional)
                <tr>
                    <td class="col-md-2">{{link_to_action('professionalController@show',$profesional->Nombre,['id'=> $profesional->id],[])}}</td>
                    <td class="col-md-3">{{$profesional->group->nombre}}</td>
                    <td class="col-md-1">{{$profesional->especialidad}}</td>
                    <td class="col-md-1">{{$profesional->localidad}}</td>
                    <td class="col-md-1">{{$profesional->telefono1}}</td>
                    <td class="col-md-1">{{$profesional->fax}}</td>
                    <td class="col-md-1">{{$profesional->email}}</td>
                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay profesionales introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection
