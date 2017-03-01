@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::Model($cliente,['action'=>'clientes@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('agent_id', 'Agente:', ['class' => 'control-label']) !!}
            {!! Form::select('agent_id', $agente , null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos:', ['class' => 'control-label']) !!}
            {!! Form::text('apellidos', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
            {!! Form::text('nif', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
            {!! Form::text('direccion', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
            {!! Form::text('localidad', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('provincia', 'Provincia:', ['class' => 'control-label']) !!}
            {!! Form::text('provincia', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('codigopostal', 'Codigo Postal:', ['class' => 'control-label']) !!}
            {!! Form::text('codigopostal', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fechanacimiento', 'Fecha de nacimiento:', ['class' => 'control-label']) !!}
            {!! Form::date('fechanacimiento', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono1', 'Telefono:', ['class' => 'control-label']) !!}
            {!! Form::text('telefono1', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono2', 'Telefono2:', ['class' => 'control-label']) !!}
            {!! Form::text('telefono2', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('movil', 'Movil:', ['class' => 'control-label']) !!}
            {!! Form::text('movil', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('iban', 'Iban:', ['class' => 'control-label']) !!}
            {!! Form::text('iban', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
            {!! Form::textarea('notas', '',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('fechadealta', \Carbon\Carbon::now()->toDateString(), ['id' => 'id']) !!}
        </div>
    </div>
    <div class="row">

        <div class="form-group">
            {!! Form::submit('Añadir cliente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection