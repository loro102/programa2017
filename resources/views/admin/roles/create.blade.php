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
    {!! Form::Model($role,['action'=>'rolesController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('name', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
            {!! Form::text('slug', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Descripción:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir rol', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection