@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user"></i> @endsection
@section('ph-main') @if(isset($user)) {{ $user->name ?? '' }} @else {{ __('Unesite korisnika') }} @endif @endsection
@section('ph-short')
    {{__('Pregledajte / uredite osnovne informacije o korisnicima u sistemu !')}}

    @if(isset($preview))
        | <a href="{{route('system.users.edit', ['id' => $user->id])}}"> {{ __('Uredite') }} </a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.users.index')}}"> {{ __('Korisnici') }} </a>
    @if(isset($profile))
        / <a href="{{ route('system.users.profile') }}"> {{ __('Moj profil') }}</a>
    @elseif(isset($user))
        / <a href="{{ route('system.users.preview', ['id' => $user->id]) }}"> {{ $user->name ?? '' }} </a>
    @else
        / <a href="#">{{ __('Unesite korisnika') }}</a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.users.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $user->id ?? '', ['class' => 'form-control']) !!}
                @elseif(isset($profile))
                    {!! Form::open(array('route' => 'system.users.update-profile', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $user->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.users.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> <b>{{ __('Ime') }}</b> </label>
                            {!! Form::text('name', $user->name ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="nameHelp" class="form-text text-muted"> {{ __('Ime korisnika') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="surname"> <b>{{ __('Prezime') }}</b> </label>
                            {!! Form::text('surname', $user->surname ?? '', ['class' => 'form-control required', 'id' => 'surname', 'aria-describedby' => 'surnameHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="surnameHelp" class="form-text text-muted"> {{ __('Prezime korisnika') }} </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(isset($create))
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"> <b>{{ __('Lozinka / šifra') }}</b> </label>
                                {!! Form::password('password', ['class' => 'form-control required', 'id' => 'password', 'aria-describedby' => 'passwordHelp']) !!}
                                <small id="passwordHelp" class="form-text text-muted"> {{ __('Lozinka / šifra za pristup računu') }} </small>
                            </div>
                        </div>
                    @endif
                    <div class="{{isset($create) ? 'col-md-6' : 'col-md-12'}}">
                        <div class="form-group">
                            <label for="email"> <b>{{ __('Email') }}</b> </label>
                            {!! Form::email('email', $user->email ?? '', ['class' => 'form-control required', 'id' => 'email', 'aria-describedby' => 'emailHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="emailHelp" class="form-text text-muted"> {{ __('Adresa e-Pošte') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date"> <b>{{ __('Datum rođenja') }}</b> </label>
                            {!! Form::text('birth_date', isset($user) ? $user->birtDate() : '', ['class' => 'form-control required'.(isset($preview) ? '' : ' datepicker'), 'id' => 'birth_date', 'aria-describedby' => 'birth_dateHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="birth_dateHelp" class="form-text text-muted"> {{ __('Datum rođenja (dd.mm.yyyy)') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="years_old"> <b>{{ __('Starost') }}</b> </label>
                            {!! Form::text('years_old', $user->years_old ?? '', ['class' => 'form-control required', 'id' => 'years_old', 'aria-describedby' => 'years_oldHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="years_oldHelp" class="form-text text-muted"> {{ __('Broj godina korisnika') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                            {!! Form::select('citizenship', $countries, $user->citizenship ?? '', ['class' => 'form-control required', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="citizenshipHelp" class="form-text text-muted"> {{ __('Državljanstvo korisnika') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=phone_number"> <b>{{ __('Telefon') }}</b> </label>
                            {!! Form::text('phone_number', $user->phone_number ?? '', ['class' => 'form-control phone_number', 'id' => 'phone_number', 'aria-describedby' => 'phone_numberHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '15']) !!}
                            <small id="phone_numberHelp" class="form-text text-muted"> {{ __('Broj telefona korisnika - mobilni ili kućni') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender"> <b>{{ __('Spol') }}</b> </label>
                            {!! Form::select('gender', [], $user->gender ?? '', ['class' => 'form-control required', 'id' => 'gender', 'aria-describedby' => 'genderHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="genderHelp" class="form-text text-muted"> {{ __('Spol korisnika') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="height"> <b>{{ __('Visina (cm)') }}</b> </label>
                            {!! Form::number('height', $user->height ?? '', ['class' => 'form-control required', 'id' => 'height', 'aria-describedby' => 'heightHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 230]) !!}
                            <small id="heightHelp" class="form-text text-muted"> {{ __('Visina korisnika u cm') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sport"> <b>{{ __('Sport') }}</b> </label>
                            {!! Form::select('sport', [], $user->sport ?? '', ['class' => 'form-control required', 'id' => 'sport', 'aria-describedby' => 'sportHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="sportHelp" class="form-text text-muted"> {{ __('Sport kojim se bavi korisnik') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position"> <b>{{ __('Pozicija') }}</b> </label>
                            {!! Form::select('position', [], $user->position ?? '', ['class' => 'form-control required', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="positionHelp" class="form-text text-muted"> {{ __('Pozicija koju igra korisnik') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="leg_arm"> <b>{{ __('Jača ruka/noga') }}</b> </label>
                            {!! Form::select('leg_arm', [], $user->leg_arm ?? '', ['class' => 'form-control required', 'id' => 'leg_arm', 'aria-describedby' => 'leg_armHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="leg_armHelp" class="form-text text-muted"> {{ __('Sport kojim se bavi korisnik') }} </small>
                        </div>
                    </div>
                </div>

                @if($loggedUser->role == 0 and !isset($profile))
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role"> <b>{{ __('Nivo pristupa') }}</b> </label>
                                {!! Form::select('role', ['0' => 'Administrator', '1' => 'Korisnik'], $user->role ?? '1', ['class' => 'form-control', 'id' => 'role', 'aria-describedby' => 'roleHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="roleHelp" class="form-text text-muted"> {{ __('Odaberite nivo pristupa za korisnika') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="active"> <b>{{ __('Pristup sistemu') }}</b> </label>
                                {!! Form::select('active', ['0' => 'Ne', '1' => 'Da'], $user->active ?? '1', ['class' => 'form-control', 'id' => 'role', 'aria-describedby' => 'activeHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="activeHelp" class="form-text text-muted"> {{ __('Da li korisnik ima pravo pristupa sistemu?') }} </small>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!isset($preview))
                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                        </div>
                    </div>
                @endif
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
