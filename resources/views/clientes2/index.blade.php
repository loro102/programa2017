@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h2 class="panel-title pull-left" style="padding-top: 7.5px;">Busqueda</h2>
        </div>
        <div class="panel-body">
            {!! Form::open(['method'=>'GET','url'=>'searchc','class'=>'form form-inline',])!!}
            <div class="input-group">
                {!! Form::text('search', null, ['class' => 'form-control','placeholder'=>'Buscar']) !!}
            </div>
            <div class="input-group">
                {!! Form::select('select', ['1' => 'Clientes', '2' => 'Expedientes','3'=>'Oponentes'],1, ['class' => 'form-control','placeholder'=>'Buscar']) !!}
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
            </button>
            {!! Form::close() !!}
            <table class="table table-striped table-bordered nowrap" id="books-table">
                <thead>
                <tr>
                    <th>cliente</th>
                    <th>dni</th>
                    <th width="70">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($resultados as $resultado)
                    <tr>
                        <th>{{link_to_action('clientes@show',$resultado->Apellidonombre($resultado->id),['id'=> $resultado->id],[])}}</th>
                        <th>{{link_to_action('clientes@show',$resultado->nif,['id'=> $resultado->id],[])}}</th>

                    </tr>
                @empty
                    <tr>
                        <td class="col-md-12 danger">No se ha encontrado resultados</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

