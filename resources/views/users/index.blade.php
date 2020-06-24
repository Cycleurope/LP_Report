@extends('layouts.app')
@section('content')
<div class="container-flui p-5">
    <div class="row">
        <div class="col-12">
            <h1>Comptes Utilisateurs</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(count($users))
            <div class="card border-0">
                <div class="card-body">
                    {{ $users->links() }}
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>Identifiant</th>
                                <th>Nom</th>
                                <th>Adresse e-mail</th>
                                <th>Ville</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>{{ $u->login }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email}}</td>
                                <td>{{ $u->city }}</td>
                                <td>
                                    @foreach($u->roles as $role)
                                    <span>{{ $role->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            @else
            <div class="alert alert-primary">{{ __('No User') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection