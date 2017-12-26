@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($cliente,['route'=>['cliente.update',$cliente->id],'class'=>'form-inline','method'=>'PUT','id'=>'cliente']) !!}
        <div class="row">
            {{ Form::hidden('id', $cliente->id) }}
            <div class="form-group">
                {!! Form::label('agent_id', 'Agente:', ['class' => 'control-label']) !!}
                {!! Form::select('agent_id', $agente , null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos:', ['class' => 'control-label']) !!}
                {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
                {!! Form::text('nif', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
                {!! Form::text('localidad', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('provincia', 'Provincia:', ['class' => 'control-label']) !!}
                {!! Form::text('provincia', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('codigopostal', 'Codigo Postal:', ['class' => 'control-label']) !!}
                {!! Form::text('codigopostal', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechanacimiento', 'Fecha de nacimiento:', ['class' => 'control-label']) !!}
                {!! Form::date('fechanacimiento', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono1', 'Telefono:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono1', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono2', 'Telefono2:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('movil', 'Movil:', ['class' => 'control-label']) !!}
                {!! Form::text('movil', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('iban', 'Iban:', ['class' => 'control-label']) !!}
                {!! Form::text('iban', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
                {!! Form::textarea('notas', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::hidden('fechadealta',null , ['id' => 'id']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar cliente', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection
