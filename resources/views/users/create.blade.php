@extends('layouts.app')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-6 offset-md-3">
            <h1>New user</h1>
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="login">Identifiant / Login</label>
                    <input type="text" name="login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" name="email" id='email' class="form-control">
                </div>
                <input type="submit" value="Valilider" class="btn btn-block btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection