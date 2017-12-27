@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        @if ($contrario->posible_culpable == true)
            <div class="alert alert-danger" role="alert">Posible culpable</div>
        @endif
        <p>
            {{ link_to_action('filesController@show','Volver al expediente',['id'=>$contrario->file_id],[]) }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['opponent.destroy',$contrario->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar contrario', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este contrario?");')) !!}
                {{ link_to_action('opponentController@edit','Editar contrario',['id'=>$contrario->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $contrario->nombre }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>DNI/NIF:</strong>{{ $contrario->nif }}</div>
                <div class="col-md-6"><strong>Dirección:</strong>{{ $contrario->direccion }}</div>
                <div class="col-md-3"><strong>Localidad:</strong>{{ $contrario->localidad }}</div>
                <div class="col-md-3"><strong>Provincia:</strong>{{ $contrario->provincia }}</div>
                <div class="col-md-3"><strong>Código Postal:</strong>{{ $contrario->codigo_postal }}</div>
                <div class="col-md-3"><strong>Vehiculo:</strong>{{ $contrario->vehiculo }}</div>
                <div class="col-md-3"><strong>Profesión:</strong>{{ $contrario->especialidad }}</div>
                <div class="col-md-3"><strong>Teléfono 1:</strong>{{ $contrario->telefono }}</div>
                <div class="col-md-3"><strong>Teléfono 2:</strong>{{ $contrario->telefono2 }}</div>
                <div class="col-md-3"><strong>Móvil:</strong>{{ $contrario->movil }}</div>
                <div class="col-md-3"><strong>E-Mail:</strong>{{ $contrario->email }}</div>
                <div class="col-md-3"><strong>Vehículo:</strong>{{ $contrario->vehiculo }}</div>
                <div class="col-md-3"><strong>Conductorl:</strong>{{ $contrario->conductor }}</div>
                <div class="col-md-3"><strong>Nº de Póliza:</strong>{{ $contrario->num_poliza }}</div>
                <div class="col-md-3"><strong>Ref de Expediente:</strong>{{ $contrario->refexpediente }}</div>
                <div class="col-md-3"><strong>Matrícula:</strong>{{ $contrario->matricula }}</div>
                <div class="col-md-3"><strong>Propietario:</strong>{{ $contrario->propietario }}</div>
                <div class="col-md-3"><strong>Aseguradora:</strong>{{ $aseguradora }}</div>
                <div class="col-md-3"><strong>Tramitador:</strong>{{ $contrario->processor->nombre }}</div>
                <div class="col-md-3"><strong>Tomador:</strong>{{ $contrario->tomador }}</div>
                <div class="col-md-12"><strong>Apunte:</strong>{{ $contrario->apunte }}</div>



            </div>

        </div>
    </div>
@endsection
