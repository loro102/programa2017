@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::Model($profesional,['route'=>['professionals.update',$profesional->id],'class'=>'form-inline','method'=>'PUT','id'=>'profesional']) !!}
        <div class="row">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label']) !!}
                {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nif', 'NIF:', ['class' => 'control-label']) !!}
                {!! Form::text('nif', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('group_id', 'Grupo:', ['class' => 'control-label']) !!}
                {!! Form::select('group_id', $grupo,null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('especialidad', 'Especialidad:', ['class' => 'control-label']) !!}
                {!! Form::text('especialidad', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('direccion', 'Direccion:', ['class' => 'control-label']) !!}
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label']) !!}
                {!! Form::text('localidad', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('provincia', 'Provincia:', ['class' => 'control-label']) !!}
                {!! Form::text('provincia', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('codigo_postal', 'Codigo Postal:', ['class' => 'control-label']) !!}
                {!! Form::text('codigo_postal', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono1', 'Telefono:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono1', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono2', 'Telefono 2:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono2', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono3', 'Telefono 3:', ['class' => 'control-label']) !!}
                {!! Form::text('telefono3', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('movil', 'Movil:', ['class' => 'control-label']) !!}
                {!! Form::text('movil', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
                {!! Form::text('fax', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('iban', 'Iban:', ['class' => 'control-label']) !!}
                {!! Form::text('iban', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('homologado', 'Homologado', ['class' => 'control-label']) !!}
                {!! Form::hidden('homologado', '0', ['id' => 'homologado']) !!}
                {!! Form::checkbox('homologado', '1', null,  ['id' => 'homologado']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('activo', 'Activo', ['class' => 'control-label']) !!}
                {!! Form::hidden('activo', '0', ['id' => 'pegatina']) !!}
                {!! Form::checkbox('activo', '1', null,  ['id' => 'pegatina']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('indemnizacion', 'Las facturas de este profesional cuentan para la indemnizacion', ['class' => 'control-label']) !!}
                {!! Form::hidden('indemnizacion', '0', ['id' => 'pegatina']) !!}
                {!! Form::checkbox('indemnizacion', '1', null,  ['id' => 'pegatina']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('acuerdo_pago', 'Acuerdo de pago:', ['class' => 'control-label']) !!}
                {!! Form::textarea('acuerdo_pago', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('notas', 'Notas:', ['class' => 'control-label']) !!}
                {!! Form::textarea('notas', null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">

            <div class="form-group">
                {!! Form::submit('Editar agente', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

        {!! Form::Close() !!}
    </div>

@endsection