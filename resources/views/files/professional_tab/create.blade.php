@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.flash')
    {!! Form::Model($prof,['action'=>'FileprofessionalController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::hidden('file_id', Request::get('file')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('', 'Tipo de profesional:', ['class' => 'control-label']) !!}
            {!! Form::select('', $grupo , null , ['class' => 'form-control','id'=>'grupo']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('professional_id', 'Profesional:', ['class' => 'control-label']) !!}
            {!! Form::select('professional_id', ['placeholder'=>'Selecciona'] , null , ['class' => 'form-control','id'=>'professional_id']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Agregar profesional al expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection
