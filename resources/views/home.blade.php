@extends('layouts.app')

@section('content')

    {!! Form::open(['method'=>'GET','url'=>'searchc','class'=>'form form-inline',])!!}
    <div class="input-group">
        {!! Form::text('search', null, ['class' => 'form-control','placeholder'=>'Buscar']) !!}
    </div>
    <div class="input-group">
        {!! Form::select('select', ['1' => 'Clientes', '2' => 'Expedientes','3'=>'Oponentes'],1, ['class' => 'form-control','placeholder'=>'Buscar']) !!}
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
    </button>
    {!! Form::close() !!}
@endsection
