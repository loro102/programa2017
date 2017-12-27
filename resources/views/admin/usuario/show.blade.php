@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('userController@index','Volver al listado de usuarios',[],[]) }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['usuario.destroy',$user->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar usuario', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este agente?");')) !!}
                {{ link_to_action('userController@edit','Editar usuario',['id'=>$user->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $user->name }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>Correo Electrónico:</strong>{{ $user->email }}</div>
            </div>
            <div class="panel-footer">
                <div class="container">
                    <div class="col-md-11">
                        <h3>Roles</h3></div>
                    <div class="col-md-6">
                        {!! Form::Open(['action'=>['rolesController@assign'],'class'=>'form-inline','method'=>'POST','id'=>'role']) !!}
                        {!! Form::hidden('user', $user->id , null , ['class' => 'form-control']) !!}
                        {!! Form::label('role', 'Roles a Añadir:', ['class' => 'control-label']) !!}
                        {!! Form::select('role', $select , null , ['class' => 'form-control']) !!}
                        {!! Form::submit('Asignar rol', ['class' => 'form-control btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="col-md-6">
                        {!! Form::Open(['action'=>['rolesController@revoke'],'class'=>'form-inline','method'=>'POST','id'=>'role']) !!}
                        {!! Form::hidden('user', $user->id , null , ['class' => 'form-control']) !!}
                        {!! Form::label('role', 'Rol a Revocar:', ['class' => 'control-label']) !!}
                        {!! Form::select('role', $select , null , ['class' => 'form-control']) !!}
                        {!! Form::submit('quitar rol', ['class' => 'form-control btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    @forelse($roles as $role)
                        <div class="col-md-3">{{ $role }}</div>
                    @empty
                        no hay
                    @endforelse

                </div>
            </div>

        </div>
    </div>
@endsection
