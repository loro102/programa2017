@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($permiso,['route'=>['permisos.update',$permiso->id],'class'=>'form-inline','method'=>'PUT','id'=>'permiso']) !!}
        <div class="row">
            {{ Form::hidden('id', $permiso->id) }}
            <div class="form-group">
            {!! Form::label('name', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Descripción:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar permiso', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>


        {!! Form::Close() !!}
    </div>

@endsection