@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($documento,['route'=>['documentos.update',$documento->id],'class'=>'form-inline','method'=>'PUT','id'=>'formality']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('fecha_documento', 'Fecha del Documento:', ['class' => 'control-label']) !!}
                {!! Form::date('fecha_documento', Carbon\Carbon::Now(), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_entrada', 'Fecha de Entrada:', ['class' => 'control-label']) !!}
                {!! Form::date('fecha_entrada', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_salida', 'Fecha de Salida:', ['class' => 'control-label']) !!}
                {!! Form::date('fecha_salida', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('asunto', 'Asunto:', ['class' => 'control-label']) !!}
                {!! Form::text('asunto', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remitente', 'Remitente:', ['class' => 'control-label']) !!}
                {!! Form::text('remitente', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('destinatario', 'Destinatario:', ['class' => 'control-label']) !!}
                {!! Form::text('destinatario', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contenido', 'Contenido:', ['class' => 'control-label']) !!}
                {!! Form::textarea('contenido',null,['class' => 'form-control input-lg','rows'=>'6']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Modificar documento', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection
