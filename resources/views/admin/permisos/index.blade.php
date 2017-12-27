@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('permisosController@create','Añadir un nuevo permiso',[],['class' => 'btn btn-sm btn-primary']) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-3">Slug</th>
                <th class="col-md-6">Descripción</th>
            </tr>
            @forelse($permisos as $permiso)
                <tr>
                    <td class="col-md-2">{{link_to_action('permisosController@show',$permiso->name,['id'=> $permiso->id],[])}}</td>
                    <td class="col-md-3">{{$permiso->slug}}</td>
                    <td class="col-md-1">{{$permiso->description}}</td>

                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay permisos introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection
