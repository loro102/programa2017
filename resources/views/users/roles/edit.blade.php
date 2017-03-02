@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($agente,['route'=>['agente.update',$agente->id],'class'=>'form-inline','method'=>'PUT','id'=>'agente']) !!}
        <div class="row">
            {{ Form::hidden('id', $agente->id) }}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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
                {!! Form::label('codigo_postal', 'Codigo Postal:', ['class' => 'control-label']) !!}
                {!! Form::text('codigo_postal', null, ['class' => 'form-control']) !!}
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
                {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
                {!! Form::text('fax', null, ['class' => 'form-control']) !!}
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
                {!! Form::label('profesion', 'profesion', ['class' => 'control-label']) !!}
                {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('commercial_id', 'Comercial', ['class' => 'control-label']) !!}
                {!! Form::select('commercial_id', ['1'=>'Pepe','2'=>'Paco'] , null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('placa', 'Placa', ['class' => 'control-label']) !!}
                {!! Form::hidden('placa', '0', ['id' => 'placa']) !!}
                {!! Form::checkbox('placa', '1', null,  ['id' => 'placa']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('pegatina', 'Pegatina', ['class' => 'control-label']) !!}
                {!! Form::hidden('pegatina', '0', ['id' => 'pegatina']) !!}
                {!! Form::checkbox('pegatina', '1', null,  ['id' => 'pegatina']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('portatriptico', 'Portatriptico', ['class' => 'control-label']) !!}
                {!! Form::hidden('portatriptico', '0', ['id' => 'portatriptico']) !!}
                {!! Form::checkbox('portatriptico', '1', null,  ['id' => 'portatriptico']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
                {!! Form::textarea('notas', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::hidden('fecha_alta',null , ['id' => 'fecha_alta']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar agente', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection