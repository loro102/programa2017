@extends('layouts.modal')

@section('content')
<div class="container">
    @include('partials.flash')
    {!! Form::Model($tramitador,['action'=>'processorController@store','class'=>'form-inline']) !!}
    <div class="row">

        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
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
            {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
            {!! Form::text('fax', '', ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo Electronico:', ['class' => 'control-label']) !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('cargo', 'Cargo:', ['class' => 'control-label']) !!}
            {!! Form::text('cargo', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
            {!! Form::textarea('notas', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::hidden('insurer_id',$aseguradora) !!}
        </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir Nuevo tramitador', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection
