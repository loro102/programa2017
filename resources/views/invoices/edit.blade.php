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
        {!! Form::Model($factura,['route'=>['invoices.update',$factura->id],'class'=>'form-inline','method'=>'PUT','id'=>'factura']) !!}
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de la factura</div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('numfactura', 'Número de Factura:', ['class' => 'control-label']) !!}
                        {!! Form::text('numfactura', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechafac', 'Fecha de Factura:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechafact', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('numsuplido', 'Número de Suplido:', ['class' => 'control-label']) !!}
                        {!! Form::text('numsuplido', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechasupl', 'Fecha de Suplido:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechasupl', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('numcontrafactura', 'Número de ContraFactura:', ['class' => 'control-label']) !!}
                        {!! Form::text('numcontrafactura', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fechacontrafac', 'Fecha de ContraFactura:', ['class' => 'control-label']) !!}
                        {!! Form::date('fechacontrafact', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('descripcion', 'Descripcion:', ['class' => 'control-label']) !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows'=>'4']) !!}
                    </div>
                    @if(Request::get('prof')!=0)
                        {!! Form::hidden('professional_id',null, ['class' => 'form-control']) !!}
                    @else
                        <div class="form-group">
                            {!! Form::label('grupo', 'Sector:', ['class' => 'control-label']) !!}
                            {!! Form::select('grupo',$sector,$sectoredit , ['class' => 'form-control']) !!}
                            {!! Form::label('professional_id', 'Profesional:', ['class' => 'control-label']) !!}
                            {!! Form::select('professional_id',$profesional,null , ['class' => 'form-control']) !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Cuantías</div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('cuantia_factura', 'Factura:', ['class' => 'control-label']) !!}
                        {!! Form::number('cuantia_factura', null, ['class' => 'form-control ','onkeyup'=>'cuantias();',]) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('cuantia_cliente', 'Cliente:', ['class' => 'control-label']) !!}
                        {!! Form::number('cuantia_cliente', null, ['class' => 'form-control','aria-describedby'=>'euros']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('cuantia_empresa', 'Empresa:', ['class' => 'control-label']) !!}
                        {!! Form::number('cuantia_empresa', null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('cuantia_indemnizacion', 'Indemnizacion:', ['class' => 'control-label']) !!}
                        {!! Form::number('cuantia_indemnizacion',null, ['class' => 'form-control']) !!}

                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Datos del pago</div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('estadopago', 'Estado de pago:', ['class' => 'control-label']) !!}
                        {!! Form::select('estadopago', $metodos,null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('estadocobro', 'Estado de cobro:', ['class' => 'control-label']) !!}
                        {!! Form::select('estadocobro', $metodos,null, ['class' => 'form-control']) !!}
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
                        {!! Form::textarea('nota', null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>






            {!! Form::hidden('file_id',null, ['class' => 'form-control']) !!}







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