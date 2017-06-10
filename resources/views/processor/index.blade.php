@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('insurersController@create','Añadir una nuevo tramitador',[],['class' => 'btn btn-sm btn-primary']) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Nombre</th>
                <th class="col-md-2">Telefonos</th>
                <th class="col-md-2">Fax</th>
                <th class="col-md-2">Correo electronico</th>
                <th class="col-md-1">Cargo</th>
            </tr>
            @forelse($processors as $processor)
                <tr>
                    <td class="col-md-2">{{link_to_action('formalitiesController@edit',$processor->nombre,['id'=> $processor->id],[])}}</td>
                    <td class="col-md-2">
                        <div>
                            <div class="row">{{$processor->telefono}}</div>
                            <div class="row">{{$processor->telefono2}}</div>
                        </div>
                          </td>
                    <td class="col-md-2">{{$processor->fax}}</td>
                    <td class="col-md-2">{{$processor->email}}</td>
                    <td class="col-md-2">{{$processor->cargo}}</td>
                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay clases de expedientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection