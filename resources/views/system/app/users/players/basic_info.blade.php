@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user"></i> @endsection
@section('ph-main') @if(isset($user)) {{ $user->name ?? '' }} @else {{ __('Unesite korisnika') }} @endif @endsection
@section('ph-short') {{__('Pregledajte / uredite Vaše osnovne informacije na www.portalu scout.reprezentacija.ba!')}} @endsection

@section('ph-navigation')
    / <a href="#"> .. </a>
    / <a href="{{ route('system.users.preview', ['id' => $user->id]) }}"> {{ $user->name ?? '' }} </a>
    / <a href="#">{{ __('Osnovne informacije') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper @if(isset($profile)) p-0 border-none @else p-3 @endif">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.users.update-profile', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $user->id ?? '', ['class' => 'form-control']) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"> <b>{{ __('Ime i prezime') }}</b> </label>
                                    {!! Form::text('name', $user->name ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="nameHelp" class="form-text text-muted"> {{ __('Puno ime i prezime') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                    <label for="height"> <b>{{ __('Visina (cm)') }}</b> </label>
                                    {!! Form::number('height', $user->height ?? '', ['class' => 'form-control required', 'id' => 'height', 'aria-describedby' => 'heightHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 230]) !!}
                                    <small id="heightHelp" class="form-text text-muted"> {{ __('Visina korisnika u cm') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date"> <b>{{ __('Datum rođenja') }}</b> </label>
                                    {!! Form::text('birth_date', isset($user) ? $user->birtDate() : '', ['class' => 'form-control required'.(isset($preview) ? '' : ' datepicker'), 'id' => 'birth_date', 'aria-describedby' => 'birth_dateHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="birth_dateHelp" class="form-text text-muted"> {{ __('Datum rođenja (dd.mm.yyyy)') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_place"> <b>{{ __('Mjesto rođenja') }}</b> </label>
                                    {!! Form::text('birth_place', $user->birth_place ?? '', ['class' => 'form-control', 'id' => 'birth_place', 'aria-describedby' => 'birth_placeHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="birth_placeHelp" class="form-text text-muted"> {{ __('Mjesto rođenja') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="living_place"> <b>{{ __('Mjesto stanovanja') }}</b> </label>
                                    {!! Form::text('living_place', $user->living_place ?? '', ['class' => 'form-control', 'id' => 'living_place', 'aria-describedby' => 'living_placeHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="living_placeHelp" class="form-text text-muted"> {{ __('Mjesto rođenja') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country"> <b>{{ __('Država stanovanja') }}</b> </label>
                                    {!! Form::select('country', $countries, $user->country ?? '', ['class' => 'form-control required select-2', 'id' => 'country', 'aria-describedby' => 'countryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="countryHelp" class="form-text text-muted"> {{ __('Država u kojoj živite') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                                    {!! Form::select('citizenship', $countries, $user->citizenship ?? '', ['class' => 'form-control required select-2', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="citizenshipHelp" class="form-text text-muted"> {{ __('Vaše državljanstvo') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="citizenship_2"> <b>{{ __('Drugo državljanstvo') }}</b> </label>
                                    {!! Form::select('citizenship_2', $countries, $user->citizenship_2 ?? '', ['class' => 'form-control select-2', 'id' => 'citizenship_2', 'aria-describedby' => 'citizenship_2Help', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="citizenship_2Help" class="form-text text-muted"> {{ __('Odaberite drugu državu čiji ste državljanin (ukoliko imate)') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=phone"> <b>{{ __('Telefon') }}</b> </label>
                                    {!! Form::text('phone', $user->phone ?? '', ['class' => 'form-control phone', 'id' => 'phone_number', 'aria-describedby' => 'phoneHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '15']) !!}
                                    <small id="phoneHelp" class="form-text text-muted"> {{ __('Broj telefona korisnika - mobilni ili kućni') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender"> <b>{{ __('Spol') }}</b> </label>
                                    {!! Form::select('gender', $gender, $user->gender ?? '', ['class' => 'form-control required', 'id' => 'gender', 'aria-describedby' => 'genderHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="genderHelp" class="form-text text-muted"> {{ __('Spol korisnika') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=allow_rating"> <b>{{ __('Ocjenjivanje') }}</b> </label>
                                    {!! Form::select('allow_rating', ['0' => 'Ne', '1' => 'Da'], $user->allow_rating ?? '', ['class' => 'form-control', 'id' => 'allow_rating', 'aria-describedby' => 'allow_ratingHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="allow_ratingHelp" class="form-text text-muted"> {{ __('Odaberite da li želite opciju da Vas korisnici ocjenjivaju ili ne') }} </small>
                                </div>
                            </div>
                        </div>

                        @if(!isset($preview))
                            <div class="row mt-3 mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
