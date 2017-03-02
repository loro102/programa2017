@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('rolesController@create','Añadir un nuevo role',[],[]) }} |
            {{ link_to_action('rolesController@index','roles',[],[]) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-2">Rol</th>
                <th class="col-md-3">Permisos</th>

            </tr>
            @forelse($roles as $role)
                <tr>
                    <td class="col-md-2">{{link_to_action('roleController@show',$role->nombre,['id'=> $role->id],[])}}</td>
                    <td class="col-md-3"></td>
                </tr>
            @empty
                <tr class="danger">
                <td class="danger" colspan="12">No hay roles introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection