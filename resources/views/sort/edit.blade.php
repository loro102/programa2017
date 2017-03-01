@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($sort,['route'=>['sort.update',$sort->id],'class'=>'form-inline','method'=>'PUT','id'=>'sort']) !!}
        <div class="row">
            {{ Form::hidden('id', $sort->id) }}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar Clase de Expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection