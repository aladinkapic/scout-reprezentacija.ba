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
                    {{ __('Unesite Vaš email, a mi ćemo vam poslati upute za ponovno postavljanje vaše šifre!') }}
                </p>
            </div>
            <hr>
            <div class="aff-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email" class="mb-2"> <b> {{ __('Vaš email') }} </b> </label>
                            {!! Form::email('email', '', ['class' => 'form-control form-control-sm mb-2', 'id' => 'email', 'aria-describedby' => 'emailHelp']) !!}
                            <small id="emailHelp" class="form-text text-muted"> {{__('Molimo da unesete Vaš email!')}} </small>
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
                        <button type="submit" class="btn reset-password"> {{ __('DALJE') }} </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
