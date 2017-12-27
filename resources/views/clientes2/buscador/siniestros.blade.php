@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {!! Form::open(['method'=>'GET','url'=>'searchsiniestro','class'=>'form-inline col-md-12'])!!}
        <div class="panel panel-default col-md-12">
            <div class="panel panel-body">
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('fromdateaccidente', 'Fecha de siniestro desde:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdateaccidente', Carbon\Carbon::now()->subYears(20) , ['class' => 'form-control']) !!}
                        {!! Form::label('todateaccidente', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todateaccidente', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('fromdateapertura', 'Fecha de apertura desde:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdateapertura', Carbon\Carbon::now()->subYears(20) , ['class' => 'form-control']) !!}
                        {!! Form::label('todateapertura', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todateapertura', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('cierre', 'Filtrar fechas de cierre:', ['class' => 'control-label']) !!}
                        {!! Form::checkbox('cierre', 1, false) !!}
                        {!! Form::label('fromdatecierre', 'Cerrado desde:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdatecierre', Carbon\Carbon::now()->subYears(20), ['class' => 'form-control']) !!}
                        {!! Form::label('todatecierre', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todatecierre', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('alta', 'Filtrar fechas de alta:', ['class' => 'control-label']) !!}
                        {!! Form::checkbox('alta', 1, false) !!}
                        {!! Form::label('fromdatealta', 'De Filtar fecha de alta:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdateealta', Carbon\Carbon::now()->subYears(20), ['class' => 'form-control']) !!}
                        {!! Form::label('todateealta', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todatealta', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('cobro', 'Filtrar fechas de cobro:', ['class' => 'control-label']) !!}
                        {!! Form::checkbox('cobro', 1, false) !!}
                        {!! Form::label('fromdatecobro', 'Cobrado desde:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdatecobro', Carbon\Carbon::now()->subYears(20), ['class' => 'form-control']) !!}
                        {!! Form::label('todatecobro', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todatecobro', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('archivo', 'Filtrar fechas de archivo:', ['class' => 'control-label']) !!}
                        {!! Form::checkbox('archivo', 1, false) !!}
                        {!! Form::label('fromdatearchivo', 'Arhivado desde:', ['class' => 'control-label']) !!}
                        {!! Form::date('fromdatearchivo', Carbon\Carbon::now()->subYears(20), ['class' => 'form-control']) !!}
                        {!! Form::label('todatearchivo', 'hasta:', ['class' => 'control-label']) !!}
                        {!! Form::date('todatearchivo', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">

                    <div class="form-group">
                        {!! Form::label('aj', 'Filtrar AJ:', ['class' => 'control-label']) !!}
                        {!! Form::select('aj', ['1' => 'Con Asistencia jurídica', '0' => 'Sin asistencia Jurídica','-1'=>'Indiferente'],-1, ['class' => 'form-control','placeholder'=>'Buscar']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('lugar', 'lugar:', ['class' => 'control-label']) !!}
                        {!! Form::select('lugar', $lugar,'0', ['class' => 'form-control','placeholder'=>'Buscar']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('aseguradora', 'Filtrar por aseguradora:', ['class' => 'control-label']) !!}
                        {!! Form::select('aseguradora', $aseguradoras,0, ['class' => 'form-control','placeholder'=>'Buscar']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('order', 'Ordenado por:', ['class' => 'control-label']) !!}
                        {!! Form::select('order', ['fechapertura' => 'Fecha de apertura', 'apellido' => 'apellido','fecha_accidente'=>'fecha de accidente','fase'=>'fase','aj'=>'Asistencia Jurídica'],'fechapertura', ['class' => 'form-control','placeholder'=>'Buscar']) !!}

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default col-md-12">
            <div class="panel panel-body">
                <div class="form-group">
                    {!! Form::label('fase', 'Filtrar por fase:', ['class' => 'control-label']) !!}
                    @foreach ( $fases as $fase )
                        {!! Form::checkbox( 'fase[]',$fase->id,true) !!}
                        {!! Form::label($fase->id,  $fase->nombre) !!}
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel panel-default col-md-12">
            <div class="panel panel-body">
                <div class="form-group">
                    {!! Form::label('tramitador', 'Filtrar por abogado:', ['class' => 'control-label']) !!}
                    @foreach ( $abogados as $abogado )
                        {!! Form::checkbox( 'abogado[]',$abogado->id,true) !!}
                        {!! Form::label($abogado->id,  $abogado->Nombre) !!}
                    @endforeach
                </div>
            </div>
        </div>

        <div class="">

            <div class="form-group">
                {!! Form::submit('Buscar expedientes', ['class' => 'form-control btn btn-primary btn-block']) !!}
            </div>
        </div>

    {!! Form::Close() !!}

@endsection
