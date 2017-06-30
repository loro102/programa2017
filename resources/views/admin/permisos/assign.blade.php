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
                <th class="col-md-5">Descripción</th>
                <th class="col-md-1">Asignar permiso</th>
            </tr>

            @forelse($permisos as $permiso)
                <tr>
                    <td class="col-md-2">{{link_to_action('permisosController@show',$permiso->name,['id'=> $permiso->id],[])}}</td>
                    <td class="col-md-3">{{$permiso->slug}}</td>
                    <td class="col-md-5">{{$permiso->description}}</td>

                    <td class="col-md-1">
                        <div class="form-group">
                    <td class="col-md-2">{{link_to_action('permisosController@assign','añadir',['id'=> $permiso->id,],[])}}</td>
                    <td>
                        {!! Form::Open(['action'=>['permisosController@assign',$permiso->id],'class'=>'form-inline','method'=>'POST','id'=>'permiso']) !!}
                        {!! Form::hidden($permiso->id, '0', ['id' => $permiso->id]) !!}
                        {!! Form::checkbox($permiso->id, '1', null,  ['id' => $permiso->id]) !!}
                        {!! Form::submit('Asignar permisos', ['class' => 'form-control btn btn-primary btn-block']) !!}
                        {!! Form::Close() !!}
                    </td>
                </tr>
    @empty
        <tr>
            <td class="danger" colspan="12">No hay permisos introducidos</td>
        </tr>
        @endforelse
        </table>

        </div>
@endsection
