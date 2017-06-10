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
        @include('partials.flash')
        <p>
            {{ link_to_action('insurersController@create','Añadir una nueva aseguradora',[],['class' => 'btn btn-sm btn-primary']) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
                <th class="col-md-2">Telefonos</th>
                <th class="col-md-2">Faxes</th>
                <th class="col-md-2">Correos electronicos</th>
                <th class="col-md-1">Categoria</th>
            </tr>
            @forelse($aseguradoras as $aseguradora)
                <tr>
                    <td class="col-md-3">{{$aseguradora->nombre}}</td>
                    <td class="col-md-2">{{$aseguradora->telefonos}}</td>
                    <td class="col-md-2">{{$aseguradora->faxes}}</td>
                    <td class="col-md-2">{{$aseguradora->emails}}</td>
                    <td class="col-md-3">

                        <div>
                            {!! Form::open(['method'=>'DELETE','route'=>['insurers.destroy',$aseguradora->id]],['class'=>'form-inline']) !!}
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{$aseguradora->nombre}}">
                                    Mostrar Tramitadores
                                </button>

                                <!-- Modal de lista de tramitadores-->
                                <div class="modal fade " id="{{$aseguradora->nombre}}" tabindex="-1" role="dialog" aria-labelledby="{{$aseguradora->nombre}}l">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="{{$aseguradora->nombre}}">Lista de Tramitadores de {{$aseguradora->nombre}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="embed-responsive embed-responsive-4by3">
                                                    <iframe class="embed-responsive-item" src="/processor/{{$aseguradora->id}}"></iframe>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::submit('Borrar', array('class' => 'btn btn-sm btn-danger ','id'=>'deletebtn', 'onclick' => 'return confirm("¿Estas seguro de querer eliminar este tramitador?");')) !!}
                            {!! Form::close()!!}
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay clases de expedientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection