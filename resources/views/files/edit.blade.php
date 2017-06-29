@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($expediente,['route'=>['expediente.update',$expediente->id],'class'=>'form-inline','method'=>'PUT','id'=>'expediente']) !!}
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#inicio" aria-controls="inicio" role="tab" data-toggle="tab">Datos expediente</a></li>
                <li role="presentation"><a href="#representado" aria-controls="representado" role="tab" data-toggle="tab">Datos del representado</a></li>
                <li role="presentation"><a href="#suceso" aria-controls="suceso" role="tab" data-toggle="tab">Datos del suceso</a></li>
                <li role="presentation"><a href="#juridico" aria-controls="juridico" role="tab" data-toggle="tab">Datos jurídicos</a></li>
                <li role="presentation"><a href="#extra" aria-controls="extra" role="tab" data-toggle="tab">Otros datos</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="inicio">
                    <div class="form-group">
                        {!! Form::hidden('customer_id',null , ['id' => 'id']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('phase_id', 'Fase:', ['class' => 'control-label']) !!}
                        {!! Form::select('phase_id', $fase , null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('solicitor_id', 'Abogado:', ['class' => 'control-label']) !!}
                        {!! Form::select('solicitor_id', $abogado , null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechaapertura', 'Fecha de Apertura:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechaapertura', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechacierre', 'Fecha de Cierre:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechacierre', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechacobroempresa', 'Fecha de cobro Empresa:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechacobroempresa', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechacobrocliente', 'Fecha de cobro Cliente:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechacobrocliente', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechallegadatalon', 'Fecha del Talón:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechallegadatalon', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechaarchivo', 'Fecha de Archivo:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechaarchivo', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('caso_tipo', 'Caso tipo:', ['class' => 'control-label']) !!}
                        {!! Form::text('caso_tipo', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('sort_id', 'Tipo de expediente:', ['class' => 'control-label']) !!}
                        {!! Form::select('sort_id', $sort , null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('firma_carta_abogado', 'Firma carta de designación:', ['class' => 'control-label']) !!}
                        {!! Form::hidden('firma_carta_abogado', '0', ['id' => 'firma_carta_abogado']) !!}
                        {!! Form::checkbox('firma_carta_abogado', '1', null,  ['id' => 'firma_carta_abogado']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_designacion', 'Fecha de designacion de abogado:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_designacion', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_reclamacion_aj', 'Fecha de Reclamacion de AJ:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_reclamacion_aj', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_cobro_aj', 'Fecha de Cobro de AJ:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_cobro_aj', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fechaofertamotivada', 'Fecha de la Oferta Motivada:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechaofertamotivada', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecharespuestamotivada', 'Fecha de Respuesta Motivada:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecharespuestamotivada', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('respuestamotivadaaceptada', 'Respuesta Motivada Aceptada', ['class' => 'control-label']) !!}
                        {!! Form::hidden('respuestamotivadaaceptada', '0', ['id' => 'respuestamotivadaaceptada']) !!}
                        {!! Form::checkbox('respuestamotivadaaceptada', '1', null,  ['id' => 'respuestamotivadaaceptada']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                        {!! Form::text('descripcion', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('estimacion', 'Estimacion de indemnizacion:', ['class' => 'control-label']) !!}
                        {!! Form::text('estimacion', null,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="representado">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Representado:', ['class' => 'control-label']) !!}
                        {!! Form::text('nombre', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechanacimiento', 'Fecha de Nacimiento:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechanacimiento', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
                        {!! Form::text('nif', '', ['class' => 'form-control']) !!}
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="suceso">
                    <div class="form-group">
                        {!! Form::label('fecha_accidente', 'Fecha del suceso:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_accidente', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('hora_accidente', 'Hora del suceso:', ['class' => 'control-label']) !!}
                        {!! Form::time('hora_accidente', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_baja_laboral', 'Fecha de Baja Laboral:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_baja_laboral', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_alta_laboral', 'Fecha de Alta Laboral:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_alta_laboral', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_ingreso_hospital', 'Fecha de Ingreso Hospitalario:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_ingreso_hospital', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_alta_hospital', 'Fecha de Alta Hospitalaria:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_alta_hospital', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('fecha_alta_direccion_medica', 'Fecha de Alta Direccion Médica:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_alta_direccion_medica', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('desarrollo_suceso', 'Desarrollo del suceso:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('desarrollo_suceso', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lugar', 'Lugar:', ['class' => 'control-label']) !!}
                        {!! Form::text('lugar', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
                        {!! Form::text('localidad', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('descripcion_expediente', 'Descripcion del expediente:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('descripcion_expediente', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('condicion', 'Condicion:', ['class' => 'control-label']) !!}
                        {!! Form::text('condicion', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('danos_vehiculo', 'Daños del vehiculo:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('danos_vehiculo', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('danos_materiales', 'Daños materiales:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('danos_materiales', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('danos_personales', 'Daños Personales:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('danos_personales', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('cuantia_asistencia_juridica', 'Cuantia de Asistencia Jurídica:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            {!! Form::text('cuantia_asistencia_juridica', null, ['class' => 'form-control']) !!}
                            <div class="input-group-addon">€</div></div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('cuantia_asistencia_sanitaria', 'Cuantía Asistencia Sanitaria:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            {!! Form::text('cuantia_asistencia_sanitaria', null, ['class' => 'form-control']) !!}
                            <div class="input-group-addon">€</div></div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="juridico">
                    <div class="form-group">
                        {!! Form::label('formalidad', 'Formalidad:', ['class' => 'control-label']) !!}
                        {!! Form::select('formalidad', $categoria ,null , ['class' => 'form-control','id'=>'tipo_procedimiento']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('formality_id', 'Procedimiento:', ['class' => 'control-label']) !!}
                        {!! Form::select('formality_id', $procedimiento , null , ['class' => 'form-control','id'=>'procedimientos']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('numero_procedimiento', 'Nº de Procedimiento:', ['class' => 'control-label']) !!}
                        {!! Form::text('numero_procedimiento',null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('diligencias_previas', 'Diligencias previas:', ['class' => 'control-label']) !!}
                        {!! Form::text('diligencias_previas', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_denuncia', 'Fecha de Denuncia:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_denuncia', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_demanda', 'Fecha de Demanda:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_demanda', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_audienciaprevia', 'Fecha de Audiencia Previa:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_audienciaprevia', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha_juicio', 'Fecha de Juicio:', ['class' => 'control-label']) !!}
                        {!! Form::date('fecha_juicio', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="extra">
                    <div class="form-group">
                        {!! Form::label('vehiculo', 'Vehiculo:', ['class' => 'control-label']) !!}
                        {!! Form::text('vehiculo', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('matricula', 'Matricula:', ['class' => 'control-label']) !!}
                        {!! Form::text('matricula', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('conductor', 'Conductor:', ['class' => 'control-label']) !!}
                        {!! Form::text('conductor', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tomador', 'Tomador:', ['class' => 'control-label']) !!}
                        {!! Form::text('tomador', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tomador', 'Tomador:', ['class' => 'control-label']) !!}
                        {!! Form::text('tomador', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('numero_poliza', 'Numero de Póliza:', ['class' => 'control-label']) !!}
                        {!! Form::text('numero_poliza', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ref_expediente', 'Nº de Referencia de Expediente:', ['class' => 'control-label']) !!}
                        {!! Form::text('ref_expediente', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('insurer_id', 'Compañia de seguros:', ['class' => 'control-label']) !!}
                        {!! Form::select('insurer_id', $aseguradora , null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('processor_id', 'Tramitador de la aseguradora:', ['class' => 'control-label']) !!}
                        {!! Form::select('processor_id',$tramiciasel, $tramicia->id , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechapoliza', 'Fecha de Póliza:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechapoliza', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('finfechapoliza', 'Fecha de Fin Póliza:', ['class' => 'control-label']) !!}
                        {!! Form::date('finfechapoliza', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::submit('Editar Expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection
