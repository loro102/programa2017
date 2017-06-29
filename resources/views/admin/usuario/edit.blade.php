@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($user,['route'=>['usuario.update',$user->id],'class'=>'form-inline','method'=>'PUT','id'=>'user']) !!}
        <div class="row">
            {{ Form::hidden('id', $user->id) }}
            <div class="form-group">
                {!! Form::label('name','Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo Electrónico:', ['class' => 'control-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar usuario', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection
