<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <title> {{ __('Prijavite se') }} </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/LogoMali.png') }}"/>

    <!-- CSS files + fonts -->
    <script src="https://kit.fontawesome.com/bccf934f7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="loading-gif d-none">
    <img src="{{ asset('images/loading.gif') }}" alt="">
</div>
<div class="register-form">
    <div class="rf-image">
        <img src="{{ asset('images/logo-90deg.png') }}" alt="">
    </div>
    <div class="rf-form">
        <div class="center-element">
            <div class="rf-f-header">
                <h2 class="tb-color mb-4"> <b>{{ __('Kreirajte svoj profil na skaut platformi Reprezentacija.ba') }}</b> </h2>
                <p>
                    Napišite koje ste godište, za koji klub igrate i još što mislite da je važno. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas kontaktirati ako ispunjavate naše kriterije. Govorimo bosanski, engleski, njemački, talijanski, francuski, švedski..
                </p>

                <div class="progress-line">
                    <div class="pl-e-bar"> <div class="pl-e-bar-fill"></div> </div>
                    <div class="pl-element pl-e-first">
                        <div class="pl-e-icon-w" title="{{ __('Lični podaci') }}">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="pl-element pl-e-second">
                        <div class="pl-e-icon-w" title="{{ __('Mjesto boravišta') }}">
                            <i class="fas fa-map-pin"></i>
                        </div>
                    </div>
                    <div class="pl-element pl-e-third">
                        <div class="pl-e-icon-w" title="{{ __('Ostale informacije') }}">
                            <i class="fas fa-futbol"></i>
                        </div>
                    </div>
                    <div class="pl-element pl-e-forth">
                        <div class="pl-e-icon-w" title="{{ __('Zahtjev poslan') }}">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rf-f-body">
                {!! Form::open(array('route' => 'system.users.update', 'method' => 'post')) !!}
                    <div class="rf-body-element rf-body-element-1 ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"><b>{{ __('Ime i prezime') }}</b></label>
                                    {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'aria-describedby' => 'nameHelp', 'maxlength' => '50']) !!}
                                    <small id="nameHelp" class="form-text text-muted">{{ __('Unesite Vaše ime prezime') }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"><b>{{ __('Email adresa') }}</b></label>
                                    {!! Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'aria-describedby' => 'emailHelp', 'maxlength' => '50']) !!}
                                    <small id="emailHelp" class="form-text text-muted">{{ __('Unesite Vašu email adresu') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="c-bootstrap-field">
                                    <label for="prefix"> <b>{{ __('Broj telefona') }}</b> </label>
                                    <div class="input-elements">
                                        {!! Form::select('prefix', $phone_prefixes, '+387', ['class' => 'form-control', 'id' => 'prefix', 'aria-describedby' => 'prefixHelp', 'style' => 'width:80px; margin-right:10px;']) !!}

                                        {!! Form::number('phone', '', ['class' => 'form-control', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '13']) !!}
                                    </div>
                                    <small id="prefixHelp" class="form-text text-muted"> {{ __('Unesite Vaš broj telefona') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date"><b>{{ __('Datum rođenja') }}</b></label>
                                    {!! Form::text('birth_date', '', ['class' => 'form-control datepicker', 'id' => 'birth_date', 'aria-describedby' => 'birth_dateHelp', 'maxlength' => '10']) !!}
                                    <small id="birth_dateHelp" class="form-text text-muted">{{ __('Unesite Vaš datum rođenja') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender"><b>{{ __('Spol') }}</b></label>
                                    {!! Form::select('gender', $gender, '7', ['class' => 'form-control', 'id' => 'gender', 'aria-describedby' => 'genderHelp']) !!}
                                    <small id="genderHelp" class="form-text text-muted">{{ __('Odaberite Vaš spol') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rf-body-element rf-body-element-2 d-none">
                        {{--<div class="row">--}}
                        {{--    <div class="col-md-6">--}}
                        {{--        <label for="address"><b>{{ __('Adresa stanovanja') }}</b></label>--}}
                        {{--        {!! Form::text('address', '', ['class' => 'form-control', 'id' => 'address', 'aria-describedby' => 'addressHelp', 'maxlength' => '50']) !!}--}}
                        {{--        <small id="addressHelp" class="form-text text-muted">{{ __('Vaša adresa stanovanja (Nije obavezno polje)') }}</small>--}}
                        {{--    </div>--}}
                        {{--</div>--}}

                        <div class="row">
                            <div class="col-md-6">
                                <label for="living_place"><b>{{ __('Grad') }}</b></label>
                                {!! Form::text('living_place', '', ['class' => 'form-control', 'id' => 'living_place', 'aria-describedby' => 'living_placeHelp','maxlength' => '50']) !!}
                                <small id="living_placeHelp" class="form-text text-muted">{{ __('Grad u kojem trenutno živite') }}</small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country"> <b>{{ __('Država') }}</b> </label>
                                    {!! Form::select('country', $countries, '', ['class' => 'form-control select-2', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;']) !!}
                                    <small id="countryHelp" class="form-text text-muted"> {{ __('Odaberite državu u kojoj trenutno živite') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                                    {!! Form::select('citizenship', $countries, '', ['class' => 'form-control select-2', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', 'style' => 'width:100%;']) !!}
                                    <small id="citizenshipHelp" class="form-text text-muted"> {{ __('Odaberite državu čiji ste državljanin') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="citizenship_2"> <b>{{ __('Drugo državljanstvo') }}</b> </label>
                                    {!! Form::select('citizenship_2', $countries, '', ['class' => 'form-control select-2', 'id' => 'citizenship_2', 'aria-describedby' => 'citizenship_2Help', 'style' => 'width:100%;']) !!}
                                    <small id="citizenship_2Help" class="form-text text-muted"> {{ __('Odaberite drugu državu čiji ste državljanin (ukoliko imate)') }} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rf-body-element rf-body-element-3 d-none">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sport"><b>{{ __('Nogomet / Futsal?') }}</b></label>
                            {!! Form::select('sport', $sports, '', ['class' => 'form-control', 'id' => 'sport', 'aria-describedby' => 'sportHelp']) !!}
                            <small id="sportHelp" class="form-text text-muted">{{ __('Sport kojim se bavite') }}</small>
                        </div>
                        <div class="col-md-6">
                            <label for="club"><b>{{ __('Vaš klub') }}</b></label>
                            {!! Form::select('club', [], '', ['class' => 'form-control s2-search-clubs', 'id' => 'club', 'aria-describedby' => 'clubHelp','style' => 'width:100% !important;']) !!}
                            <small id="clubHelp" class="form-text text-muted">{{ __('Klub za koji trenutno igrate') }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note"> <b>{{ __('Ostale informacije') }}</b> </label>
                                {!! Form::textarea('note', '', ['class' => 'form-control', 'id' => 'note', 'aria-describedby' => 'noteHelp', 'style' => 'height:120px !important;' ,'maxlength' => '1000']) !!}
                                <small id="noteHelp" class="form-text text-muted"> {{ __('Ostale bitne informacije koje želite podijeliti sa nama') }} </small>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="rf-body-element rf-body-element-4 d-none">
                        <p class="text-danger">
                            <b>{{ __('Vaš zahtjev za kreiranje profila na Scout Reprezentacija.Ba je uspješno poslan. Skauti Reprezentacija.ba će provjeriti ove podatke, te će Vas, ukoliko ispunjavate naše kriterije, kontaktirati putem emaila i/ili telefona.') }}</b>
                        </p>
                    </div>

                    <div class="row mt-3 mb-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="button-wrapper create-profile-back-btn d-none">
                                <b>{{__('Nazad')}}</b>
                            </div>
                            <div class="button-wrapper create-profile-next-btn">
                                <b>{{__('Dalje')}}</b>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ __('Imate kreiran profil?') }} <a href="{{ route('auth.login') }}"><b>{{ __('Prijavite se') }}</b></a>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>
