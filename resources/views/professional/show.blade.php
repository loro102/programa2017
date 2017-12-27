@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        @if ($profesional->activo == 0)
            <div class="alert alert-danger" role="alert">Este profesional no está activo actualmente</div>
        @endif
        <p>
            <span class="pull-right">
                {!! Form::open(['method'=>'DELETE','route'=>['professionals.destroy',$profesional->id]],['class'=>'form-inline']) !!}
                {!! Form::submit('Borrar profesional', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este profesional?");')) !!}
                {{ link_to_action('ProfessionalController@edit','Editar profesional',['id'=>$profesional->id],['class'=>'btn btn-sm btn-warning pull-right ']) }}
                {!! Form::close()!!}
            </span>
        </p>
        <div class="panel panel-default">
            <div class="panel-heading"><h3>{{ $profesional->Nombre }}</h3></div>
            <div class="panel-body">
                <div class="col-md-3"><strong>DNI/NIF:</strong>{{ $profesional->nif }}</div>
                <div class="col-md-6"><strong>Dirección:</strong>{{ $profesional->direccion }}</div>
                <div class="col-md-3"><strong>Localidad:</strong>{{ $profesional->localidad }}</div>
                <div class="col-md-3"><strong>Provincia:</strong>{{ $profesional->provincia }}</div>
                <div class="col-md-3"><strong>Código Postal:</strong>{{ $profesional->codigo_postal }}</div>
                <div class="col-md-3"><strong>Grupo:</strong>{{ $profesional->group->nombre }}</div>
                <div class="col-md-3"><strong>Especialidad:</strong>{{ $profesional->especialidad }}</div>
                <div class="col-md-3"><strong>Teléfono 1:</strong>{{ $profesional->telefono1 }}</div>
                <div class="col-md-3"><strong>Teléfono 2:</strong>{{ $profesional->telefono2 }}</div>
                <div class="col-md-3"><strong>Teléfono 3:</strong>{{ $profesional->telefono3 }}</div>
                <div class="col-md-3"><strong>Móvil:</strong>{{ $profesional->movil }}</div>
                <div class="col-md-3"><strong>Fax:</strong>{{ $profesional->fax }}</div>
                <div class="col-md-3"><strong>E-Mail:</strong>{{ $profesional->email }}</div>

                @if ($profesional->homologado == 1)
                    <div class="col-md-3"><strong>Homologado:</strong>Si</div>
                @else
                    <div class="col-md-3"><strong>Homologado:</strong>No</div>
                @endif
                @if ($profesional->activo == 1)
                    <div class="col-md-3"><strong>Activo:</strong>Si</div>
                @else
                    <div class="col-md-3"><strong>Activo:</strong>No</div>
                @endif
                @if ($profesional->indemnizacion == 1)
                    <div class="col-md-4"><strong>Sus facturas cuentan en la indemnizacion</strong></div>
                @else
                    <div class="col-md-4"><strong>Sus facturas no cuentan en la indemnizacion</strong></div>
                @endif
                <div class="col-md-3"><strong>Iban:</strong>{{ $profesional->iban }}</div>
                <div class="col-md-12 well"><strong>Acuerdo de pago:</strong>{{ $profesional->acuerdo_pago }}</div>

                <div class="col-md-12 well"><strong>Notas:</strong>{{ $profesional->notas }}</div>

                <div>
                    <table class="table table-striped table-condensed table-hover">
                        <tr class="info">
                            <th>Fecha Factura</th>
                            <th>Cliente</th>
                            <th>Importe</th>
                            <th>Importe Empresa</th>
                        </tr>
                        @php
                            //dd($profesional->invoice);
                        @endphp
                        @foreach($profesional->invoice()->orderBy('fechafact','Desc')->get() as $i )

                            @if($i->estadopago == 1)
                                <tr class="danger">
                            @elseif($i->estadopago > 1 and $i->sinoriginal==False)
                                <tr class="success">
                            @elseif($i->estadopago > 1 and $i->sinoriginal==True)
                                <tr class="warning">
                            @else
                                <tr>
                                    @endif
                                    <td>{{Carbon\Carbon::parse($i->fechafact)->format('d-m-Y')}}</td>
                                    <td>{{ link_to_action('filesController@show',$i->file->customer->fullname,['id'=> $i->file->id],[])}}</td>
                                    <td>{{$i->cuantia_factura}}<span class="glyphicon glyphicon-eur"
                                                                     aria-hidden="true"></span></td>
                                    <td>{{$i->cuantia_empresa}}<span class="glyphicon glyphicon-eur"
                                                                     aria-hidden="true"></span></td>
                                </tr>
                                @endforeach
                                <tr class="info">
                                    <td colspan="2"></td>
                                    <td colrow="2">Total factura:{!! $profesional->invoice()->sum('cuantia_factura') !!}
                                        <span class="glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                    <td>Total empresa:{!! $profesional->invoice()->sum('cuantia_empresa') !!}<span
                                                class="glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                </tr>
                                <tr class="info">
                                    <td colspan="2"></td>
                                    <td colspan="2">
                                        Beneficio:{!! $profesional->invoice()->sum('cuantia_factura') - $profesional->invoice()->sum('cuantia_empresa') !!}
                                        <span class="glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                </tr>
                    </table>


                </div>
            </div>
            </div>

        </div>
    </div>
@endsection
