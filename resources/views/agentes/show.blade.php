@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('agenteController@index','Volver al listado de agentes',[],[]) }}
            {{ link_to(url()->previous(),'Regresar') }}
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['agente.destroy',$agente->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar agente', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este agente?");')) !!}
                {{ link_to_action('agenteController@edit','Editar agente',['id'=>$agente->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $agente->nombre }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>DNI/NIF:</strong>{{ $agente->nif }}</div>
                <div class="col-md-6"><strong>Dirección:</strong>{{ $agente->direccion }}</div>
                <div class="col-md-3"><strong>Localidad:</strong>{{ $agente->localidad }}</div>
                <div class="col-md-3"><strong>Provincia:</strong>{{ $agente->provincia }}</div>
                <div class="col-md-3"><strong>Código Postal:</strong>{{ $agente->codigopostal }}</div>
                <div class="col-md-3"><strong>Profesión:</strong>{{ $agente->profesion }}</div>
                <div class="col-md-3"><strong>Teléfono 1:</strong>{{ $agente->telefono1 }}</div>
                <div class="col-md-3"><strong>Teléfono 2:</strong>{{ $agente->telefono2 }}</div>
                <div class="col-md-3"><strong>Móvil:</strong>{{ $agente->movil }}</div>
                <div class="col-md-3"><strong>Fax:</strong>{{ $agente->fax }}</div>
                <div class="col-md-3"><strong>E-Mail:</strong>{{ $agente->email }}</div>
                <div class="col-md-3"><strong>Comercial:</strong>{{ $agente->commercial_id }}</div>
                @if ($agente->placa == 1)
                    <div class="col-md-3"><strong>Placa:</strong>Si</div>
                @else
                    <div class="col-md-3"><strong>Placa:</strong>No</div>
                @endif
                @if ($agente->pegatina == 1)
                    <div class="col-md-3"><strong>Pegatina:</strong>Si</div>
                @else
                    <div class="col-md-3"><strong>Pegatina:</strong>No</div>
                @endif
                @if ($agente->portatriptico == 1)
                    <div class="col-md-3"><strong>Portatriptico:</strong>Si</div>
                @else
                    <div class="col-md-3"><strong>Portatriptico:</strong>No</div>
                @endif
                <div class="col-md-3"><strong>Iban:</strong>{{ $agente->iban }}</div>

                <div class="col-md-12 well"><strong>Notas:</strong>{{ $agente->notas }}</div>
            </div>

        </div>
    </div>
@endsection