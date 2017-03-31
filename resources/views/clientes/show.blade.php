@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('clientes@index','Volver al listado de Clientes',[],[]) }}
            {{ link_to(url()->previous(),'Regresar') }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['cliente.destroy',$cliente->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar cliente', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este cliente?");')) !!}
                {{ link_to_action('clientes@edit','Editar cliente',['id'=>$cliente->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $cliente->fullname }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>DNI/NIF:</strong>{{ $cliente->nif }}</div>
                <div class="col-md-6"><strong>Dirección:</strong>{{ $cliente->direccion }}</div>
                <div class="col-md-3"><strong>Localidad:</strong>{{ $cliente->localidad }}</div>
                <div class="col-md-3"><strong>Provincia:</strong>{{ $cliente->provincia }}</div>
                <div class="col-md-3"><strong>Código Postal:</strong>{{ $cliente->codigopostal }}</div>
                <div class="col-md-3"><strong>Fecha de nacimiento:</strong>{{ $cliente->fechanacimiento }}</div>
                <div class="col-md-3"><strong>Teléfono 1:</strong>{{ $cliente->telefono1 }}</div>
                <div class="col-md-3"><strong>Teléfono 2:</strong>{{ $cliente->telefono2 }}</div>
                <div class="col-md-3"><strong>Móvil:</strong>{{ $cliente->movil }}</div>
                <div class="col-md-3"><strong>E-Mail:</strong>{{ $cliente->email }}</div>
                <div class="col-md-3"><strong>Agente:</strong>{{ $cliente->agent->nombre}}</div>
                <div class="col-md-12 well"><strong>Notas:</strong>{{ $cliente->notas }}</div>
            </div>
            <div class="panel-footer">
                {{ link_to_action('filesController@create','',['customer'=>$cliente->id],['class'=>'btn btn-lg btn-success pull-right glyphicon glyphicon-plus']) }}
                Expedientes trafico
                <table class="table table-bordered table table-striped">
                    <tr>
                        <th class="col-md-1">Fecha de apertura</th>
                        <th class="col-md-1">Fase</th>
                        <th class="col-md-1">Fecha de siniestro</th>
                        <th class="col-md-1">lugar</th>
                        <th class="col-md-8">Descripcion del suceso</th>
                    </tr>
                    @forelse($expedientes as $expediente)
                    <tr>
                        <td class="col-md-1">{{link_to_action('filesController@show',$expediente->fechaapertura,['id'=> $expediente->id],[])}}</td>
                        <td class="col-md-1">{{$expediente->fechacierre}}</td>
                        <td class="col-md-1">{{$expediente->fecha_accidente}} {{$expediente->hora}}</td>
                        <td class="col-md-1">{{$expediente->lugar}}</td>
                        <td class="col-md-8">{{$expediente->desarrollo_suceso}}</td>
                    </tr>
                        @empty
                        @endforelse
                </table>
                Expedientes otros
                <table class="table table-bordered table table-striped">
                    <tr>
                        <th class="col-md-1">Fecha de apertura</th>
                        <th class="col-md-1">Fase</th>
                        <th class="col-md-1">Fecha de suceso</th>
                        <th class="col-md-2">Clasificación</th>
                        <th class="col-md-6">Descripcion del expediente</th>
                    </tr>
                    @forelse($expedientes as $expediente)
                        <tr>
                            <td class="col-md-1">{{$expediente->fechaapertura}}</td>
                            <td class="col-md-1">{{$expediente->fechacierre}}</td>
                            <td class="col-md-1">{{$expediente->fecha_accidente}} {{$expediente->hora}}</td>
                            <td class="col-md-2">{{$expediente->sort_file_id}}</td>
                            <td class="col-md-6">{{$expediente->descripcion_expediente}}</td>
                        </tr>
                    @empty
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection