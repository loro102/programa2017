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
        {!! Form::Model($formality,['route'=>['formality.update',$formality->id],'class'=>'form-inline','method'=>'PUT','id'=>'formality']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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
                {!! Form::submit('Editar Procedimiento', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection