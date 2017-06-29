@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.flash')
    {!! Form::Model($formality,['action'=>'formalitiesController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
            {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('categoria', 'Categoria:', ['class' => 'control-label']) !!}
            {!! Form::text('categoria',null, ['class' => 'form-control', 'list'=>'category']) !!}
            <datalist id="category">
                @foreach($categoria as $cat)
                    <option value="{{$cat}}"></option>
                @endforeach
            </datalist>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir Nuevo procedimiento', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection
