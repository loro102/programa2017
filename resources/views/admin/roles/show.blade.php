@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('rolesController@index','Volver al listado de roles',[],[]) }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['role.destroy',$role->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar rol', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este rol?");')) !!}
                {{ link_to_action('rolesController@edit','Editar rol',['id'=>$role->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $role->name }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>Slug:</strong>{{ $role->slug }}</div>
                <div class="col-md-6"><strong>Descripcion:</strong>{{ $role->description }}</div>

            </div>
            <div class="panel-footer">
                <div class="container">
                    <div class="col-md-11">
                        <h3>Permisos</h3></div>
                    <div class="col-md-6">
                        {!! Form::Open(['action'=>['permisosController@assign'],'class'=>'form-inline','method'=>'POST','id'=>'permiso']) !!}
                        {!! Form::hidden('role', $role->id , null , ['class' => 'form-control']) !!}
                        {!! Form::label('permiso', 'Permisos a Añadir:', ['class' => 'control-label']) !!}
                        {!! Form::select('permiso', $select , null , ['class' => 'form-control']) !!}
                        {!! Form::submit('Asignar permiso', ['class' => 'form-control btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="col-md-6">
                        {!! Form::Open(['action'=>['permisosController@revoke'],'class'=>'form-inline','method'=>'POST','id'=>'permiso']) !!}
                        {!! Form::hidden('role', $role->id , null , ['class' => 'form-control']) !!}
                        {!! Form::label('permiso', 'Permiso a Revocar:', ['class' => 'control-label']) !!}
                        {!! Form::select('permiso', $select , null , ['class' => 'form-control']) !!}
                        {!! Form::submit('quitar permiso', ['class' => 'form-control btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    @forelse($permisos as $permiso)
                        <div class="col-md-3">{{ $permiso }}</div>
                    @empty
                        no hay
                    @endforelse

                </div>
            </div>
        </div>

    </div>
@endsection