@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.flash')

        <table class="table-bordered table-striped table-hover col-md-12">
            <tr>
                <th class="col-md-3">Usuario</th>
                <th class="col-md-6">email</th>
                <th class="col-md-3">acciones</th>

            </tr>
            @forelse($users as $user)
                <tr>
                    <td class="col-md-3">{{link_to_action('userController@show',$user->name,['id'=> $user->id],[])}}</td>
                    <td class="col-md-6">{{$user->email}}</td>
                    <td class="col-md-3"></td>

            @empty
                <tr>
                <td class="danger" colspan="12">No hay usuarios introducidos</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endsection
