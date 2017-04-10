@extends('layouts.modal')

@section('content')
<div class="container">
    @extends('partials.flash')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::Model($contrario,['action'=>'opponentController@store','class'=>'form-inline']) !!}
    <div class="row">

        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
            {!! Form::hidden('file_id', Request::get('file')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
            {!! Form::text('nif', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fechanacimiento', 'Fecha de nacimiento:', ['class' => 'control-label']) !!}
            {!! Form::date('fechanacimiento', '',['class'=>'form-control']) !!}
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
            {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
            {!! Form::text('telefono', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono2', 'Telefono 2:', ['class' => 'control-label']) !!}
            {!! Form::text('telefono2', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('movil', 'Móvil:', ['class' => 'control-label']) !!}
            {!! Form::text('movil', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Correo Electrónico:', ['class' => 'control-label']) !!}
            {!! Form::email('email', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('insurer_id', 'Compañia de seguros:', ['class' => 'control-label']) !!}
            {!! Form::select('insurer_id', $aseguradora , null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('processor_id', 'Tramitador de la aseguradora:', ['class' => 'control-label']) !!}
            {!! Form::select('processor_id',['placeholder'=>'Selecciona'], null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('vehiculo', 'Vehículo:', ['class' => 'control-label']) !!}
            {!! Form::text('vehiculo', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('conductor', 'Conductor:', ['class' => 'control-label']) !!}
            {!! Form::text('conductor', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('num_poliza', 'Nº de Póliza:', ['class' => 'control-label']) !!}
            {!! Form::text('num_poliza', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('refexpediente', 'Referencia del Expediente:', ['class' => 'control-label']) !!}
            {!! Form::text('refexpediente', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('matricula', 'Matrícula:', ['class' => 'control-label']) !!}
            {!! Form::text('matricula', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('propietario', 'Propietario:', ['class' => 'control-label']) !!}
            {!! Form::text('propietario', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tomador', 'Tomador:', ['class' => 'control-label']) !!}
            {!! Form::text('tomador', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apunte', 'Apunte:', ['class' => 'control-label']) !!}
            {!! Form::textarea('apunte', '',['class'=>'form-control']) !!}
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir contrario al expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection