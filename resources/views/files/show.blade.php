@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <div class="panel panel-default panel-primary">
            <div class="panel-heading">Datos del Cliente</div>
            <div class="panel-body">
                <div class="col-md-6"><strong>Cliente:</strong> {{$cliente->getFullNameAttribute($cliente->id)}}</div>
                <div class="col-md-3"><strong>Nif:</strong> {{$cliente->nif}}</div>
                <div class="col-md-3"><strong>Fecha de nacimiento:</strong> {{$cliente->fechanacimiento}}</div>
                <div class="col-md-12"><strong>Dirección:</strong> {{$cliente->direccion}} {{$cliente->codigopostal}} {{$cliente->localidad}} ({{$cliente->provincia}})</div>
                <div class="col-md-4"><strong>Teléfono:</strong> {{$cliente->telefono1}}</div>
                <div class="col-md-4"><strong>Teléfono 2:</strong> {{$cliente->telefono2}}</div>
                <div class="col-md-4"><strong>Movil:</strong> {{$cliente->movil}}</div>
                <div class="col-md-6"><strong>Correo Electrónico:</strong> {{$cliente->email}}</div>

            </div>
        </div>
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active panel-primary"><a href="#expediente" aria-controls="expediente" role="tab" data-toggle="tab">Datos expediente</a></li>
                <li role="presentation"><a href="#profesionales" aria-controls="profesionales" role="tab" data-toggle="tab">profesionales</a></li>
                <li role="presentation"><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">facturas</a></li>
                <li role="presentation"><a href="#indemnizacion" aria-controls="indemnizacion" role="tab" data-toggle="tab">indemnización</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane panel-primary active" id="expediente">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Datos expediente</div>
                                    <div class="panel-body">
                                        <div class="col-md-5 bg-info"><strong>Abogado:</strong> {{$expediente->id_solicitor}}</div>
                                        <div class="col-md-2 "><strong>Caso tipo:</strong> {{$expediente->caso_tipo}}</div>
                                        <div class="col-md-5 "><strong>Tipo de expediente:</strong> {{$expediente->sort_file_id}}</div>
                                        @if($expediente->firma_carta_abogado == 1)
                                            <div class="col-md-12 text-success"><strong>El cliente ha firmado la designacion de abogado</strong></div>
                                            <div class="col-md-4"><strong>Fecha de designación:</strong> {{$expediente->fecha_designacion}}</div>
                                            @if (is_null($expediente->fecha_reclamacion_aj))
                                                <div class="col-md-4 text-danger"><strong>Asistencia jurídica sin reclamar</strong></div>
                                            @else
                                                <div class="col-md-4"><strong>fecha de reclamacion aj:</strong> {{$expediente->fecha_reclamacion_aj}}</div>
                                                @if(is_null($expediente->fecha_cobro_aj))
                                                    <div class="col-md-4 text-danger"><strong>Asistencia jurídica sin cobrar</strong></div>
                                                    @else
                                                    <div class="col-md-4"><strong>fecha de cobro de aj:</strong> {{$expediente->fecha_cobro_aj}}</div>
                                                @endif
                                            @endif
                                            @else
                                            <div class="col-md-8 text-danger"><strong>El cliente no ha firmado la designación de abogado</strong></div>

                                        @endif

                                        <div class="col-md-4"><strong>Fecha de apertura:</strong> {{$expediente->fechaapertura}}</div>
                                        <div class="col-md-4"><strong>Fecha de cierre:</strong> {{$expediente->fechacierre}}</div>
                                        <div class="col-md-4"><strong>Fecha de archivo:</strong> {{$expediente->fechaarchivo}}</div>
                                        <div class="col-md-4"><strong>Fecha de llegada de talón:</strong> {{$expediente->fechallegadatalon}}</div>
                                        <div class="col-md-4"><strong>Fecha de cobro Cliente:</strong> {{$expediente->fechacobrocliente}}</div>
                                        <div class="col-md-4"><strong>Fecha de cobro Empresa:</strong> {{$expediente->fechacobroempresa}}</div>


                                        @if (notNullValue($expediente->fechaofertamotivada))
                                        <div class="col-md-4"><strong>Fecha de Reclamacion Previa:</strong> {{$expediente->fechaofertamotivada}}</div>
                                        @endif
                                        @if (notNullValue($expediente->fechaofertamotivada))
                                        @if($expediente->respuestamotivadaaceptada == true)
                                        <div class="col-md-4 bg-success"><strong>Fecha de Oferta Motivada:</strong> {{$expediente->fecharespuestamotivada}}</div>
                                            @else
                                            <div class="col-md-4 bg-danger"><strong>Fecha de Oferta Motivada:</strong> {{$expediente->fecharespuestamotivada}}</div>
                                            @endif
                                        @endif
                                        <div class="col-md-4"><strong>Estimación de indemnización:</strong> {{$expediente->estimacon}}</div>
                                        @if(notNullValue($expediente->descripcion))
                                        <div class="col-md-12"><strong>Descripción del expediente:</strong><div class="well well-sm">{{$expediente->descripcion}}</div> </div>
                                        @endif


                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Datos del suceso</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4"><strong>Fecha del suceso:</strong> {{$expediente->fecha_accidente}}</div>
                                        <div class="col-md-4"><strong>Hora:</strong> {{$expediente->hora_accidente}}</div>
                                        @if(notNullValue($expediente->fecha_baja_laboral))
                                        <div class="col-md-4"><strong>Fecha de baja laboral:</strong> {{$expediente->fecha_baja_laboral}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_alta_laboral))
                                        <div class="col-md-4"><strong>Fecha de alta laboral:</strong> {{$expediente->fecha_alta_laboral}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_ingreso_hospital))
                                        <div class="col-md-4"><strong>Fecha de ingreso hospitalario:</strong> {{$expediente->fecha_ingreso_hospital}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_alta_hospital))
                                            <div class="col-md-4"><strong>Fecha de alta hospitalario:</strong> {{$expediente->fecha_alta_hospital}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_alta_direccion_medica))
                                            <div class="col-md-4"><strong>Fecha de alta por dirección médica:</strong> {{$expediente->fecha_alta_direccion_medica}}</div>
                                        @endif
                                        @if(notNullValue($expediente->desarrollo_suceso))
                                            <div class="col-md-12"><strong>Desarrollo del suceso:</strong><div class="well well-sm"> {{$expediente->desarrollo_suceso}}</div></div>
                                        @endif
                                        @if(notNullValue($expediente->danos_vehiculo))
                                            <div class="col-md-12"><strong>Daños del vehículo:</strong><div class="well well-sm">{{$expediente->danos_vehiculo}}</div> </div>
                                        @endif
                                        @if(notNullValue($expediente->danos_materiales))
                                            <div class="col-md-12"><strong>Daños materiales:</strong><div class="well well-sm">{{$expediente->danos_materiales}}</div> </div>
                                        @endif
                                        @if(notNullValue($expediente->danos_personales))
                                            <div class="col-md-12"><strong>Daños personales:</strong><div class="well well-sm">{{$expediente->danos_personales}}</div> </div>
                                        @endif
                                        @if(notNullValue($expediente->condicion))
                                            <div class="col-md-4"><strong>Condición:</strong>{{$expediente->condicion}}</div>
                                        @endif
                                        @if(notNullValue($expediente->cuantia_asistencia_juridica))
                                            <div class="col-md-4"><strong>Cuantía de Asistencia Jurídica:</strong>{{$expediente->cuantia_asistencia_juridica}}<div class="glyphicon glyphicon-euro"></div></div>
                                        @endif
                                        @if(notNullValue($expediente->cuantia_asistencia_sanitaria))
                                            <div class="col-md-4"><strong>Cuantía de Asistencia Sanitaria:</strong>{{$expediente->cuantia_asistencia_sanitaria}}<div class="glyphicon glyphicon-euro"></div></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Datos Jurídicos</div>
                                    <div class="panel-body">
                                        @if(notNullValue($expediente->formalidad))
                                            <div class="col-md-4"><strong>Tipo de procedimiento:</strong> {{$expediente->formalidad}}</div>
                                            <div class="col-md-4"><strong>Procedimiento:</strong> {{$expediente->formalities_id}}</div>
                                        @endif
                                        @if(notNullValue($expediente->numero_procedimiento))
                                                <div class="col-md-4"><strong>Número de procedimiento:</strong> {{$expediente->numero_procedimiento}}</div>
                                        @endif
                                        @if(notNullValue($expediente->diligencias_previas))
                                                <div class="col-md-4"><strong>Diligencias Previas:</strong> {{$expediente->diligencias_previas}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_denuncia))
                                                <div class="col-md-4"><strong>Fecha de denuncia:</strong> {{$expediente->fecha_denuncia}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_demanda))
                                                <div class="col-md-4"><strong>Fecha de demanda:</strong> {{$expediente->fecha_demanda}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_audienciaprevia))
                                                <div class="col-md-4"><strong>Fecha de audiencia previa:</strong> {{$expediente->fecha_audienciaprevia}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fecha_juicio))
                                                <div class="col-md-4"><strong>Fecha de Juicio:</strong> {{$expediente->fecha_juicio}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Datos del vehículo accidentado</div>
                                    <div class="panel-body">
                                        @if(notNullValue($expediente->vehiculo))
                                            <div class="col-md-4"><strong>Vehículo:</strong> {{$expediente->vehiculo}}</div>
                                        @endif
                                        @if(notNullValue($expediente->matricula))
                                            <div class="col-md-4"><strong>Matrícula:</strong> {{$expediente->matricula}}</div>
                                        @endif
                                        @if(notNullValue($expediente->conductor))
                                            <div class="col-md-4"><strong>Conductor:</strong> {{$expediente->conductor}}</div>
                                        @endif
                                        @if(notNullValue($expediente->tomador))
                                            <div class="col-md-4"><strong>Tomador:</strong> {{$expediente->tomador}}</div>
                                        @endif
                                        @if(notNullValue($expediente->numero_poliza))
                                            <div class="col-md-4"><strong>Número de póliza:</strong> {{$expediente->numero_poliza}}</div>
                                        @endif
                                        @if(notNullValue($expediente->ref_expediente))
                                            <div class="col-md-4"><strong>Número de referencia de expediente:</strong> {{$expediente->ref_expediente}}</div>
                                        @endif
                                        @if(notNullValue($expediente->insurer_id))
                                            <div class="col-md-4"><strong>Aseguradora:</strong> {{$expediente->insurer_id}}</div>
                                        @endif
                                        @if(notNullValue($expediente->processor_id))
                                            <div class="col-md-4"><strong>Tramitador de la Aseguradora:</strong> {{$expediente->processor_id}}</div>
                                        @endif
                                        @if(notNullValue($expediente->fechapoliza))
                                            <div class="col-md-4"><strong>Fecha de póliza:</strong> {{$expediente->fechapoliza}}</div>
                                        @endif
                                        @if(notNullValue($expediente->finfechapoliza))
                                            <div class="col-md-4"><strong>Fecha de Fin de Póliza:</strong> {{$expediente->finfechapoliza}}</div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane panel-primary" id="profesionales">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#profesional" aria-expanded="false" aria-controls="profesional">
                                Agregar un profesional al expediente
                            </button>
                            <div class="collapse" id="profesional">
                                <div class="well">
                                    formulario de creacion
                                </div>
                            </div>

                            <div>123456</div>
                            <div>12345</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            Basic panel example
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane panel-primary" id="facturas">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                {{ link_to_action('invoicesController@create','Añadir un nuevo factura',['id'=> $expediente->id],[]) }} |
                                {{ link_to_action('invoicesController@index','facturas',[],[]) }}
                            </p>
                            <table class="table-bordered table-striped table-hover col-md-12">
                                <tr>
                                    <th class="col-md-2">Fecha</th>
                                    <th class="col-md-3">Nº</th>
                                    <th class="col-md-2">Abonado</th>
                                    <th class="col-md-2">Profesional</th>
                                    <th class="col-md-2">Descripcion</th>
                                    <th class="col-md-1">Importe Cliente</th>
                                    <th class="col-md-1">Importe Empresa</th>
                                    <th class="col-md-2">Importe Factura</th>

                                    <th class="col-md-1">Actividad</th>
                                </tr>
                                @forelse($facturas as $factura)
                                    <tr>
                                        <td class="col-md-2">{{link_to_action('invoicesController@edit',$factura->fechafact,['id'=> $factura->id],[])}}</td>
                                        <td class="col-md-3">{{link_to_action('invoicesController@edit',$factura->numfactura,['id'=> $factura->id],[])}}</td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->file_id,['id'=> $factura->id],[])}}</td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->professional_id,['id'=> $factura->id],[])}}</td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->descripcion,['id'=> $factura->id],[])}}</td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->cuantia_cliente,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->cuantia_empresa,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                        <td class="col-md-1">{{link_to_action('invoicesController@edit',$factura->cuantia_factura,['id'=> $factura->id],[])}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                        <td class="col-md-1"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{$factura->id}}">
                                                editar factura
                                            </button>

                                            <!-- Modal de lista de tramitadores-->
                                            <div class="modal fade " id="{{$factura->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$factura->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" onclick="document.location.reload();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="$factura->id"></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="embed-responsive embed-responsive-4by3">
                                                                <iframe class="embed-responsive-item" src="/invoices/{{$factura->id}}/edit"></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="document.location.reload();">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td class="danger" colspan="12">No hay facturas introducidos</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td class="col-md-2"></td>
                                    <td class="col-md-3"></td>
                                    <td class="col-md-1"></td>
                                    <td class="col-md-1"></td>
                                    <td class="col-md-1">Total:</td>
                                    <td class="col-md-1">{{array_get($total,'cliente')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                    <td class="col-md-1">{{array_get($total,'empresa')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                    <td class="col-md-1">{{array_get($total,'factura')}} <span class="glyphicon glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                </tr>
                                <tr>
                                    <td class="col-md-2"></td>
                                    <td class="col-md-3"></td>
                                    <td class="col-md-1"></td>
                                    <td class="col-md-1"></td>
                                    <td class="col-md-1">Beneficio:</td>
                                    <td class="col-md-1">{{$beneficio}} <span class="glyphicon glyphicon-eur" aria-hidden="true"></span></td>
                                    <td class="col-md-1"></td>
                                    <td class="col-md-1"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane panel-primary" id="indemnizacion">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            <div>123456789</div>
                            Basic panel example
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Notas" aria-expanded="false" aria-controls="Notas">
                Notas
            </button>
            <div class="collapse" id="Notas">
                <div class="well">
                    ...
                </div>
            </div>
    </div>
@endsection
