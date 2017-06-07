@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('opponentController@index','Volver al listado de agentes',[],[]) }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['opponent.destroy',$agente->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar agente', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este contario?");')) !!}
