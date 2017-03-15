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
                                        <div class="col-md-4"><strong>Fecha de apertura:</strong> {{$expediente->fechaapertura}}</div>
                                        <div class="col-md-4"><strong>Fecha de cierre:</strong> {{$expediente->fechacierre}}</div>
                                        <div class="col-md-4"><strong>Fecha de cobro Cliente:</strong> {{$expediente->fechacobrocliente}}</div>
                                        <div class="col-md-4"><strong>Fecha de cobro Empresa:</strong> {{$expediente->fechacobroempresa}}</div>
                                        <div class="col-md-4"><strong>Fecha de llegada de talón:</strong> {{$expediente->fechallegadatalon}}</div>
                                        <div class="col-md-4"><strong>Fecha de archivo:</strong> {{$expediente->fechaarchivo}}</div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Panel title</h3>
                                    </div>
                                    <div class="panel-body">
                                        Panel content
                                    </div>
                                </div>

                            </div>
                            <div>{{$expediente->caso_tipo}}</div>
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
                <div role="tabpanel" class="tab-pane panel-primary" id="profesionales">
                    <div class="panel panel-default">
                        <div class="panel-body">
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

@section('javascript')
    @endsection