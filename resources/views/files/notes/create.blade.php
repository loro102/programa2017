@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.flash')
    {!! Form::Model($nota,['action'=>'noteController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::hidden('fecha',Carbon\Carbon::Now()) !!}
            {!! Form::hidden('file_id', Request::get('file')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Nota:', ['class' => 'control-label']) !!}
            {!! Form::textarea('nota',null,['class' => 'form-control input-lg','rows'=>'6']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Nueva nota', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection