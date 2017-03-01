@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('clientes@create','Añadir un nuevo cliente',[],[]) }} |
            {{ link_to_action('clientes@index','Clientes',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-8">nombre</th>
                <th class="col-md-4">DNI/NIF</th>
            </tr>
            @forelse($clientes as $cliente)
                <tr>
                    <td class="col-md-8">{{link_to_action('clientes@show',$cliente->apellidos,['id'=> $cliente->id],[])}} , {{link_to_action('clientes@show',$cliente->nombre,['id'=> $cliente->id],[])}}</td>
                    <td class="col-md-4">{{link_to_action('clientes@show',$cliente->nif,['id'=> $cliente->id],[])}}</td>
                </tr>
            @empty
                <tr>
                <td class="col-md-12 danger">No hay clientes introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection