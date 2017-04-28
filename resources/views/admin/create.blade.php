@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::Model($agente,['action'=>'agenteController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
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
            {!! Form::label('codigo_postal', 'Codigo Postal:', ['class' => 'control-label']) !!}
            {!! Form::text('codigo_postal', '', ['class' => 'form-control']) !!}
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
            {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
            {!! Form::text('fax', '', ['class' => 'form-control']) !!}
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
            {!! Form::label('profesion', 'profesion', ['class' => 'control-label']) !!}
            {!! Form::text('profesion', '', ['class' => 'form-control']) !!}
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
            {!! Form::textarea('notas', '',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('fecha_alta', \Carbon\Carbon::now()->toDateString(), ['id' => 'id']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir agente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection