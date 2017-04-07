<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>
<div class="container">
<div id="app">
    {{link_to_action('processorController@create','Añadir un nuevo tramitador',['aseguradora'=> $aseguradora],['class'=>'btn btn-primary'],[])}}

    @include('partials.flash')
    <table class="table-bordered table-striped table-hover col-md-12">
        <tr>
            <th class="col-md-3">Nombre</th>
            <th class="col-md-2">Telefonos</th>
            <th class="col-md-1">Fax</th>
            <th class="col-md-2">Correo electronico</th>
            <th class="col-md-1">Cargo</th>
            <th class="col-md-3">Notas</th>

        </tr>
        @forelse($processors as $processor)
            <tr>
                <td class="col-md-2">{{link_to_action('processorController@edit',$processor->nombre,['id'=> $processor->id],[])}}</td>
                <td class="col-md-2"><div>
                        <div class="row">{{$processor->telefono}}</div>
                        <div class="row">{{$processor->telefono2}}</div>
                    </div></td>
                <td class="col-md-2">{{$processor->fax}}</td>
                <td class="col-md-2">{{$processor->email}}</td>
                <td class="col-md-1">{{$processor->cargo}}</td>
                <td class="col-md-2">{{$processor->notas}}</td>
                <td class="col-md-1">
                    {!! Form::open(['method'=>'DELETE','route'=>['processor.destroy',$processor->id]],['class'=>'form-inline']) !!}
                    {!! Form::submit('Borrar', array('class' => 'btn btn-sm btn-danger pull-right ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este tramitador?");')) !!}
                    {!! Form::close()!!}
                </td>
            </tr>
        @empty
            <tr>
                <td class="danger" colspan="12">No hay ningun tramitador introducido</td>
            </tr>
        @endforelse
    </table>
</div>

</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>