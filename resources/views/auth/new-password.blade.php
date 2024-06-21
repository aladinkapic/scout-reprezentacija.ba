<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title> {{ __('Prijavite se') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>

    <!-- CSS files + fonts -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="auth-form">
    <div class="af-image">
        <img src="{{ asset('images/logo-90deg.png') }}" alt="">
    </div>
    <div class="af-form">
        <div class="aff-container">
            <div class="aff-header">
                <h1 class="tb-color mb-4"> <b>{{ __('Reprezentacija.BA Group') }}</b> </h1>
            </div>

            <div class="aff-short">
                <p>
                    {{ __('Dobro došli nazad. Unesite Vašu novu korisničku šifru i uživajte koristeći sistem!') }}
                </p>
            </div>
            <hr>
            <div class="aff-form">
                {!! Form::hidden('api_token', $user->api_token, ['class' => 'form-control', 'id' => 'api_token']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="mb-2"> <b> {{ __('Vaša šifra / lozinka') }} </b> </label>
                            {!! Form::password('password', ['class' => 'form-control form-control-sm mb-2', 'id' => 'password', 'aria-describedby' => 'passwordHelp']) !!}
                            <small id="passwordHelp" class="form-text text-muted"> {{ __('Vaša korisnička šifra / lozinka') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pswAgain" class="mb-2"> <b> {{ __('Ponovite šifru / lozinku') }} </b> </label>
                            {!! Form::password('pswAgain', ['class' => 'form-control form-control-sm mb-2', 'id' => 'pswAgain', 'aria-describedby' => 'pswAgainHelp']) !!}
                            <small id="pswAgainHelp" class="form-text text-muted"> {{__('Ponovite vašu šifru / lozinku')}} </small>
                        </div>
                    </div>
                </div>

                <div class="row aff-links">
                    <div class="col-md-6 mt-3">
                        <a href="{{ route('auth.forgot-password') }}" class="tb-color mr-2"> {{ __('Zaboravili ste šifru?') }} </a>
                        <span>|</span>
                        <a href="{{ route('auth.create-profile') }}"> {{ __('Kreirajte korisnički nalog') }} </a>
                    </div>
                    <div class="col-md-6 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn restart-psw-btn"> {{ __('IZMIJENITE ŠIFRU') }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
