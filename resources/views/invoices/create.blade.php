@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::Model($factura,['action'=>'invoicesController@store','class'=>'form-inline']) !!}
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Datos de la factura</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('numfactura', 'Número de Factura:', ['class' => 'control-label']) !!}
                    {!! Form::text('numfactura', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechafac', 'Fecha de Factura:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechafact', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('numsuplido', 'Número de Suplido:', ['class' => 'control-label']) !!}
                    {!! Form::text('numsuplido', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechasupl', 'Fecha de Suplido:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechasupl', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('numcontrafactura', 'Número de ContraFactura:', ['class' => 'control-label']) !!}
                    {!! Form::text('numcontrafactura', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('fechacontrafac', 'Fecha de ContraFactura:', ['class' => 'control-label']) !!}
                    {!! Form::date('fechacontrafact', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('descripcion', '', ['class' => 'form-control','rows'=>'4']) !!}
                </div>
                @if(Request::get('prof')!=0)
                    {!! Form::hidden('professional_id',Request::get('id'), ['class' => 'form-control']) !!}
                @else
                    <div class="form-group">
                        {!! Form::label('grupo', 'Sector:', ['class' => 'control-label']) !!}
                        {!! Form::select('grupo', $sector,[''] , ['class' => 'form-control'], ['class' => 'form-control']) !!}
                        {!! Form::label('professional_id', 'Profesional:', ['class' => 'control-label']) !!}
                        {!! Form::select('professional_id',['No has seleccionado sector'],[''] , ['class' => 'form-control']) !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Cuantías</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('cuantia_factura', 'Factura:', ['class' => 'control-label']) !!}
                    {!! Form::number('cuantia_factura', 0, ['class' => 'form-control ','onkeyup'=>'cuantias();',]) !!}
                    
                </div>
                <div class="form-group">
                    {!! Form::label('cuantia_cliente', 'Cliente:', ['class' => 'control-label']) !!}
                    {!! Form::number('cuantia_cliente', 0, ['class' => 'form-control','aria-describedby'=>'euros']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('cuantia_empresa', 'Empresa:', ['class' => 'control-label']) !!}
                    {!! Form::number('cuantia_empresa', 0, ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('cuantia_indemnizacion', 'Indemnizacion:', ['class' => 'control-label']) !!}
                    {!! Form::number('cuantia_indemnizacion', 0, ['class' => 'form-control']) !!}

                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Datos del pago</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('estadopago', 'Estado de pago:', ['class' => 'control-label']) !!}
                    {!! Form::select('estadopago', $metodos,'', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('estadocobro', 'Estado de cobro:', ['class' => 'control-label']) !!}
                    {!! Form::select('estadocobro', $metodos,'', ['class' => 'form-control']) !!}
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
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">Otros datos</div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('emitirfact
                    .honorario', 'Emitir factura por honorarios', ['class' => 'control-label']) !!}
                    {!! Form::hidden('honorario', '0', []) !!}
                    {!! Form::checkbox('honorario', '1', null,  ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('emitirfactcomision', 'Emitir factura por comision', ['class' => 'control-label']) !!}
                    {!! Form::hidden('emitirfactcomision', '0', []) !!}
                    {!! Form::checkbox('emitirfactcomision', '1', null,  ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sinoriginal', 'Falta la factura original', ['class' => 'control-label']) !!}
                    {!! Form::hidden('sinoriginal', '0', []) !!}
                    {!! Form::checkbox('sinoriginal', '1', null,  ['class' => 'form-control']) !!}
                </div>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('nota', 'Notas:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('nota', '',['class'=>'form-control']) !!}
                </div>
            </div>
        </div>





        
            {!! Form::hidden('file_id',Request::get('id'), ['class' => 'form-control']) !!}







    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
            {!! Form::submit('Añadir factura', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>
    </div>

    {!! Form::Close() !!}
</div>

@endsection