@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('auth.includes.left-side')

            <div class="profile__wrapper_right">

                @include('auth.includes.inner-menu')

                {!! Form::open(array('route' => 'auth.create-new-profile.update-basic-info', 'method' => 'post', 'id' => 'js-form')) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><b>{{ __('Ime i prezime') }}</b></label>
                                {!! Form::text('name', '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', 'maxlength' => '50']) !!}
                                <small id="nameHelp" class="form-text text-muted"><b>{{ __('Unesite Vaše ime prezime') }}</b></small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label for="email"><b>{{ __('Email adresa') }}</b></label>
                                {!! Form::text('email', '', ['class' => 'form-control email required', 'id' => 'email', 'aria-describedby' => 'emailHelp', 'maxlength' => '50']) !!}
                                <small id="emailHelp" class="form-text text-muted"><b>{{ __('Unesite Vašu email adresu') }}</b></small>
                            </div>
                        </div>
                        <div class="col-md-6 mt-1">
                            <div class="form-group">
                                <label for="password"><b>{{ __('Vaša šifra') }}</b></label>
                                {!! Form::password('password', ['class' => 'form-control required', 'id' => 'password', 'aria-describedby' => 'Help', 'maxlength' => '50']) !!}
                                <small id="passwordHelp" class="form-text text-muted"><b>{{ __('Unesite Vašu šifru') }}</b></small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="c-bootstrap-field">
                                <label for="prefix"> <b>{{ __('Broj telefona') }}</b> </label>
                                <div class="input-elements">
                                    {!! Form::select('prefix', $phone_prefixes, '+387', ['class' => 'form-control', 'id' => 'prefix', 'aria-describedby' => 'prefixHelp', 'style' => 'width:80px; margin-right:10px;']) !!}

                                    {!! Form::number('phone', '', ['class' => 'form-control', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '13']) !!}
                                </div>
                                <small id="prefixHelp" class="form-text text-muted"> <b>{{ __('Unesite Vaš broj telefona') }}</b> </small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_date"><b>{{ __('Datum rođenja') }}</b></label>
                                {!! Form::text('birth_date', '', ['class' => 'form-control required datepicker', 'id' => 'birth_date', 'aria-describedby' => 'birth_dateHelp', 'maxlength' => '10']) !!}
                                <small id="birth_dateHelp" class="form-text text-muted"><b>{{ __('Unesite Vaš datum rođenja') }}</b></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender"><b>{{ __('Spol') }}</b></label>
                                {!! Form::select('gender', $gender, '7', ['class' => 'form-control', 'id' => 'gender', 'aria-describedby' => 'genderHelp']) !!}
                                <small id="genderHelp" class="form-text text-muted"><b>{{ __('Odaberite Vaš spol') }}</b></small>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4 mb-4">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="living_place"><b>{{ __('Grad') }}</b></label>
                            {!! Form::text('living_place', '', ['class' => 'form-control required', 'id' => 'living_place', 'aria-describedby' => 'living_placeHelp','maxlength' => '50']) !!}
                            <small id="living_placeHelp" class="form-text text-muted"><b>{{ __('Grad u kojem trenutno živite') }}</b></small>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country"> <b>{{ __('Država') }}</b> </label>
                                {!! Form::select('country', $countries, '21', ['class' => 'form-control required', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;']) !!}
                                <small id="countryHelp" class="form-text text-muted"> <b>{{ __('Odaberite državu u kojoj trenutno živite') }}</b> </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                                {!! Form::select('citizenship', $countries, '21', ['class' => 'form-control required', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', 'style' => 'width:100%;']) !!}
                                <small id="citizenshipHelp" class="form-text text-muted"> <b>{{ __('Odaberite državu čiji ste državljanin') }}</b> </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="citizenship_2"> <b>{{ __('Drugo državljanstvo') }}</b> </label>
                                {!! Form::select('citizenship_2', $countries, '', ['class' => 'form-control', 'id' => 'citizenship_2', 'aria-describedby' => 'citizenship_2Help', 'style' => 'width:100%;']) !!}
                                <small id="citizenship_2Help" class="form-text text-muted"> <b>{{ __('Odaberite drugu državu čiji ste državljanin (ukoliko imate)') }}</b> </small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn">{{ __('Sljedeće korak') }}</button>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
