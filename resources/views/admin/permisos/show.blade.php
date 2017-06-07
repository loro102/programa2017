@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('permisosController@index','Volver al listado de permisos',[],[]) }}
            {{ link_to(url()->previous(),'Regresar') }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['permisos.destroy',$permiso->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Eliminar', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este permiso?");')) !!}
                {{ link_to_action('permisosController@edit','Editar',['id'=>$permiso->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $permiso->name }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>Slug:</strong>{{ $permiso->slug }}</div>
                <div class="col-md-6"><strong>Descripcion:</strong>{{ $permiso->description }}</div>

            </div>

        </div>
    </div>
@endsection