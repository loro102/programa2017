@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::Model($factura,['action'=>'invoicesController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="form-group">
            {!! Form::label('honorario', 'Es un Honorario', ['class' => 'control-label']) !!}
            {!! Form::hidden('honorario', '0', ['id' => 'placa']) !!}
            {!! Form::checkbox('honorario', '1', null,  ['id' => 'placa']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fechafac', 'Fecha de Factura:', ['class' => 'control-label']) !!}
            {!! Form::date('fechafact', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file_id', 'file_id:', ['class' => 'control-label']) !!}
            {!! Form::text('file_id',Request::get('id'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('professional_id', 'Profesional:', ['class' => 'control-label']) !!}
            {!! Form::text('professional_id', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('numfactura', 'Número de Factura:', ['class' => 'control-label']) !!}
            {!! Form::text('numfactura', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Localidad:', ['class' => 'control-label']) !!}
            {!! Form::textarea('descripcion', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('sinoriginal', 'Sin factura original', ['class' => 'control-label']) !!}
            {!! Form::hidden('sinoriginal', '0', ['id' => 'placa']) !!}
            {!! Form::checkbox('sinoriginal', '1', null,  ['id' => 'placa']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cuantia_factura', 'Cuantia de factura:', ['class' => 'control-label']) !!}
            {!! Form::text('cuantia_factura', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cuantia_cliente', 'Cuantia cliente:', ['class' => 'control-label']) !!}
            {!! Form::text('cuantia_cliente', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cuantia_empresa', 'Cuantia empresa:', ['class' => 'control-label']) !!}
            {!! Form::text('cuantia_empresa', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cuantia_indemnizacion', 'Cuantia indemnizacion:', ['class' => 'control-label']) !!}
            {!! Form::text('cuantia_indemnizacion', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('emitirfactcomision', 'Emitir factura por comision', ['class' => 'control-label']) !!}
            {!! Form::hidden('emitirfactcomision', '0', ['id' => 'placa']) !!}
            {!! Form::checkbox('emitirfactcomision', '1', null,  ['id' => 'placa']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('estadopago', 'Estado de pago:', ['class' => 'control-label']) !!}
            {!! Form::text('estadopago', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('estadocobro', 'Estado de cobro:', ['class' => 'control-label']) !!}
            {!! Form::text('estadocobro', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('numpagare', 'Nº de pagaré:', ['class' => 'control-label']) !!}
            {!! Form::text('numpagare', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fechapago', 'Fecha de pago:', ['class' => 'control-label']) !!}
            {!! Form::date('fechapago', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fechacobro', 'Fecha de cobro', ['class' => 'control-label']) !!}
            {!! Form::date('fechacobro', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nota', 'Notas:', ['class' => 'control-label']) !!}
            {!! Form::textarea('nota', '',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {!! Form::submit('Añadir agente', ['class' => 'form-control btn btn-primary btn-block']) !!}
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection