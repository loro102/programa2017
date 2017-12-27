@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($contrario,['route'=>['opponent.update',$contrario->id],'class'=>'form-inline','method'=>'PUT','id'=>'contario']) !!}
        <div class="row">
            {{ Form::hidden('id', $contrario->id) }}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
                {!! Form::text('nif', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechanacimiento', 'Fecha de nacimiento:', ['class' => 'control-label']) !!}
                {!! Form::date('fechanacimiento', null,['class'=>'form-control']) !!}
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
                {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono2', 'Telefono 2:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('movil', 'Móvil:', ['class' => 'control-label']) !!}
                {!! Form::text('movil', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electrónico:', ['class' => 'control-label']) !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('insurer_id', 'Compañia de seguros:', ['class' => 'control-label']) !!}
                {!! Form::select('insurer_id', $aseguradora , null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('processor_id', 'Tramitador de la aseguradora:', ['class' => 'control-label']) !!}
                {!! Form::select('processor_id',$tramitador, null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('vehiculo', 'Vehículo:', ['class' => 'control-label']) !!}
                {!! Form::text('vehiculo', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('conductor', 'Conductor:', ['class' => 'control-label']) !!}
                {!! Form::text('conductor', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('num_poliza', 'Nº de Póliza:', ['class' => 'control-label']) !!}
                {!! Form::text('num_poliza', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('refexpediente', 'Referencia del Expediente:', ['class' => 'control-label']) !!}
                {!! Form::text('refexpediente', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('matricula', 'Matrícula:', ['class' => 'control-label']) !!}
                {!! Form::text('matricula', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('propietario', 'Propietario:', ['class' => 'control-label']) !!}
                {!! Form::text('propietario', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tomador', 'Tomador:', ['class' => 'control-label']) !!}
                {!! Form::text('tomador', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apunte', 'Apunte:', ['class' => 'control-label']) !!}
                {!! Form::textarea('apunte', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('posible_culpable', 'Posible Culpable', ['class' => 'control-label']) !!}
                {!! Form::hidden('posible_culpable', '0', ['id' => 'posible_culpable']) !!}
                {!! Form::checkbox('posible_culpable', '1', ['id' => 'posible_culpable']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar contrario', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection
