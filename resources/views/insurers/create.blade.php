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
    {!! Form::Model($aseguradora,['action'=>'insurersController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefonos', 'Telefonos:', ['class' => 'control-label']) !!}
            {!! Form::textarea('telefonos', '') !!}

        </div>
        <div class="form-group">
            {!! Form::label('faxes', 'Faxes:', ['class' => 'control-label']) !!}
            {!! Form::textarea('faxes', '') !!}

        </div>
        <div class="form-group">
            {!! Form::label('emails', 'Correos Electronicos:', ['class' => 'control-label']) !!}
            {!! Form::textarea('emails', '') !!}

        </div>
        <div class="form-group">
            {!! Form::label('direccion', 'Dirección:', ['class' => 'control-label']) !!}
            {!! Form::text('direccion', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('codigo_postal', 'Codigo Postal:', ['class' => 'control-label']) !!}
            {!! Form::text('codigo_postal', '', ['class' => 'form-control']) !!}
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
            {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
            {!! Form::textarea('notas', '') !!}

        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir Nueva Compañía de seguros', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection
