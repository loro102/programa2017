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
    {!! Form::Model($expediente,['action'=>'filesController@store','class'=>'form-inline']) !!}
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
                    {!! Form::hidden('customer_id',Request::get('customer') , ['id' => 'id']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('solicitor_id', 'Abogado:', ['class' => 'control-label']) !!}
                    {!! Form::select('solicitor_id', $abogado , 1 , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechaapertura', 'Fecha de Apertura:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechaapertura', \Carbon\Carbon::now()->toDateString() , ['class' => 'form-control']) !!}
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
                    {!! Form::date('fechallegadatalon', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechaarchivo', 'Fecha de Archivo:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechaarchivo', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('caso_tipo', 'Caso tipo:', ['class' => 'control-label']) !!}
                    {!! Form::text('caso_tipo', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phase_id', 'Fase:', ['class' => 'control-label']) !!}
                    {!! Form::select('phase_id', $fase , null , ['class' => 'form-control']) !!}
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
                    {!! Form::date('fecha_designacion', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_reclamacion_aj', 'Fecha de Reclamacion de AJ:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_reclamacion_aj', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_cobro_aj', 'Fecha de Cobro de AJ:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_cobro_aj', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fechaofertamotivada', 'Fecha de la Oferta Motivada:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechaofertamotivada', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecharespuestamotivada', 'Fecha de Respuesta Motivada:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecharespuestamotivada', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('respuestamotivadaaceptada', 'Respuesta Motivada Aceptada', ['class' => 'control-label']) !!}
                    {!! Form::hidden('respuestamotivadaaceptada', '0', ['id' => 'respuestamotivadaaceptada']) !!}
                    {!! Form::checkbox('respuestamotivadaaceptada', '1', null,  ['id' => 'respuestamotivadaaceptada']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    {!! Form::text('descripcion', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('estimacion', 'Estimacion de indemnizacion:', ['class' => 'control-label']) !!}
                    {!! Form::text('estimacion', '',['class'=>'form-control']) !!}
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
                    {!! Form::date('fecha_accidente', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hora_accidente', 'Hora del suceso:', ['class' => 'control-label']) !!}
                    {!! Form::time('hora_accidente', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecha_baja_laboral', 'Fecha de Baja Laboral:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_baja_laboral', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_alta_laboral', 'Fecha de Alta Laboral:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_alta_laboral', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_ingreso_hospital', 'Fecha de Ingreso Hospitalario:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_ingreso_hospital', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_alta_hospital', 'Fecha de Alta Hospitalaria:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_alta_hospital', '', ['class' => 'form-control']) !!}
                </div><div class="form-group">
                    {!! Form::label('fecha_alta_direccion_medica', 'Fecha de Alta Direccion Médica:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_alta_direccion_medica', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('desarrollo_suceso', 'Desarrollo del suceso:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('desarrollo_suceso', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lugar', 'Lugar:', ['class' => 'control-label']) !!}
                    {!! Form::text('lugar', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
                    {!! Form::text('localidad', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion_expediente', 'Descripcion del expediente:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('descripcion_expediente', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('condicion', 'Condicion:', ['class' => 'control-label']) !!}
                    {!! Form::text('condicion', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('danos_vehiculo', 'Daños del vehiculo:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('danos_vehiculo', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('danos_materiales', 'Daños materiales:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('danos_materiales', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('danos_personales', 'Daños Personales:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('danos_personales', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cuantia_asistencia_juridica', 'Cuantia de Asistencia Jurídica:', ['class' => 'control-label']) !!}
                    <div class="input-group">
                        {!! Form::text('cuantia_asistencia_juridica', '', ['class' => 'form-control']) !!}
                        <div class="input-group-addon">€</div></div>
                </div>
                <div class="form-group">
                    {!! Form::label('cuantia_asistencia_sanitaria', 'Cuantía Asistencia Sanitaria:', ['class' => 'control-label']) !!}
                    <div class="input-group">
                        {!! Form::text('cuantia_asistencia_sanitaria', '', ['class' => 'form-control']) !!}
                        <div class="input-group-addon">€</div></div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="juridico">
                <div class="form-group">
                    {!! Form::label('formalidad', 'Formalidad:', ['class' => 'control-label']) !!}
                    {!! Form::select('formalidad', $categoria , 1 , ['class' => 'form-control','id'=>'tipo_procedimiento']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('formalities_id', 'Procedimiento:', ['class' => 'control-label']) !!}
                    {!! Form::select('formalities_id', $formalidad , null, ['class' => 'form-control','id'=>'procedimientos']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('numero_procedimiento', 'Nº de Procedimiento:', ['class' => 'control-label']) !!}
                    {!! Form::text('numero_procedimiento','', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('diligencias_previas', 'Diligencias previas:', ['class' => 'control-label']) !!}
                    {!! Form::text('diligencias_previas', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecha_denuncia', 'Fecha de Denuncia:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_denuncia', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecha_demanda', 'Fecha de Demanda:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_demanda', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecha_audienciaprevia', 'Fecha de Audiencia Previa:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_audienciaprevia', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fecha_juicio', 'Fecha de Juicio:', ['class' => 'control-label']) !!}
                    {!! Form::date('fecha_juicio', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="extra">
                <div class="form-group">
                    {!! Form::label('vehiculo', 'Vehiculo:', ['class' => 'control-label']) !!}
                    {!! Form::text('vehiculo', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('matricula', 'Matricula:', ['class' => 'control-label']) !!}
                    {!! Form::text('matricula', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('conductor', 'Conductor:', ['class' => 'control-label']) !!}
                    {!! Form::text('conductor', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tomador', 'Tomador:', ['class' => 'control-label']) !!}
                    {!! Form::text('tomador', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('numero_poliza', 'Numero de Póliza:', ['class' => 'control-label']) !!}
                    {!! Form::text('numero_poliza', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('ref_expediente', 'Nº de Referencia de Expediente:', ['class' => 'control-label']) !!}
                    {!! Form::text('ref_expediente', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('insurer_id', 'Compañia de seguros:', ['class' => 'control-label']) !!}
                    {!! Form::select('insurer_id', $aseguradora , 1 , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('processor_id', 'Tramitador de la aseguradora:', ['class' => 'control-label']) !!}
                    {!! Form::select('processor_id',$processor, 1 , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechapoliza', 'Fecha de Póliza:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechapoliza', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('finfechapoliza', 'Fecha de Fin Póliza:', ['class' => 'control-label']) !!}
                    {!! Form::date('finfechapoliza', '', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="form-group">
            
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir Nuevo Expediente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>




@endsection
