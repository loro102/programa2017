@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::Model($sort,['action'=>'sortController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir Nueva Clase de Expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection
