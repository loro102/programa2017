@extends('layouts.app')
@section('content')
    <div class="container">
        @include('partials.flash')
        {!! Form::Model($factura,['route'=>['invoices.update',$factura->id],'class'=>'form-inline','method'=>'PUT','id'=>'factura']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('fechafac', 'Fecha de Factura:', ['class' => 'control-label']) !!}
                {!! Form::date('fechafact', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('file_id', 'Profesional:', ['class' => 'control-label']) !!}
                {!! Form::text('file_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('professional_id', 'Profesional:', ['class' => 'control-label']) !!}
                {!! Form::text('professional_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('numfactura', 'Número de Factura:', ['class' => 'control-label']) !!}
                {!! Form::text('numfactura', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sinoriginal', 'Sin factura original', ['class' => 'control-label']) !!}
                {!! Form::hidden('sinoriginal', '0', ['id' => 'placa']) !!}
                {!! Form::checkbox('sinoriginal', '1', null,  ['id' => 'placa']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cuantia_factura', 'Cuantia de factura:', ['class' => 'control-label']) !!}
                {!! Form::text('cuantia_factura', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cuantia_cliente', 'Cuantia cliente:', ['class' => 'control-label']) !!}
                {!! Form::text('cuantia_cliente', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cuantia_empresa', 'Cuantia empresa:', ['class' => 'control-label']) !!}
                {!! Form::text('cuantia_empresa', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cuantia_indemnizacion', 'Cuantia indemnizacion:', ['class' => 'control-label']) !!}
                {!! Form::text('cuantia_indemnizacion', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('emitirfactcomision', 'Emitir factura por comision', ['class' => 'control-label']) !!}
                {!! Form::hidden('emitirfactcomision', '0', ['id' => 'placa']) !!}
                {!! Form::checkbox('emitirfactcomision', '1', null,  ['id' => 'placa']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('estadopago', 'Estado de pago:', ['class' => 'control-label']) !!}
                {!! Form::text('estadopago', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('estadocobro', 'Estado de cobro:', ['class' => 'control-label']) !!}
                {!! Form::text('estadocobro', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('numpagare', 'Nº de pagaré:', ['class' => 'control-label']) !!}
                {!! Form::text('numpagare', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechapago', 'Fecha de pago:', ['class' => 'control-label']) !!}
                {!! Form::date('fechapago', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechacobro', 'Fecha de cobro', ['class' => 'control-label']) !!}
                {!! Form::date('fechacobro', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nota', 'Notas:', ['class' => 'control-label']) !!}
                {!! Form::textarea('nota', null,['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar factura', ['class' => 'form-control btn btn-primary btn-block']) !!}

            </div>

        </div>


        {!! Form::Close() !!}
        <div class="form-group">
            {!! Form::open(['method'=>'DELETE','route'=>['invoices.destroy',$factura->id]],['class'=>'form-inline']) !!}
            {!! Form::submit('Borrar Factura', array('class' => 'btn btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este cliente?");')) !!}
            {!! Form::close()!!}
        </div>

    </div>

@endsection