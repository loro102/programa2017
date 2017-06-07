@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($processor,['route'=>['processor.update',$processor->id],'class'=>'form-inline','method'=>'PUT','id'=>'formality']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono', null) !!}

            </div>
            <div class="form-group">
                {!! Form::label('telefono2', 'Telefono 2:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono2', null) !!}

            </div>
            <div class="form-group">
                {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
                {!! Form::text('fax', null) !!}

            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null) !!}

            </div>
            <div class="form-group">
                {!! Form::label('cargo', 'Cargo:', ['class' => 'control-label']) !!}
                {!! Form::text('cargo', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
                {!! Form::textarea('notas', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::hidden('insurer_id',null) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar Tramitador', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection