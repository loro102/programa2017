@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')
        <p>
            {{ link_to_action('rolesController@create','Añadir un nuevo rol',[],['class' => 'btn btn-sm btn-primary']) }}
        </p>
        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-3">Nombre</th>
                <th class="col-md-3">Slug</th>
                <th class="col-md-6">Descripción</th>
            </tr>
            @forelse($roles as $role)
                <tr>
                    <td class="col-md-2">{{link_to_action('rolesController@show',$role->name,['id'=> $role->id],[])}}</td>
                    <td class="col-md-3">{{$role->slug}}</td>
                    <td class="col-md-1">{{$role->description}}</td>

                </tr>
            @empty
                <tr>
                <td class="danger" colspan="12">No hay roles introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection
