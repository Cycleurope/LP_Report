<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background: #ffa000">
    <div id="main-signin-wrapper" class="p-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-6 d-none d-lg-block p-0">
                    
                </div>
                <div class="col-lg-8 col-xl-6 p-5">
                    <div class="card border-0 p-5">
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 offset-md-4 mb-3">
                                        <h1 style="font-weight: 900">Reporting<br />La Poste</h1>
                                        <h3 style="font-weight: 100">Connexion</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>
                                    <div class="col-md-8">
                                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                                        @error('login')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>
                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Se connecter
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>