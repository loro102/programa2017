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

        </div>
    </div>
@endsection