@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            {!! Form::open(array('route' => 'profile.info.update', 'method' => 'post', 'id' => 'js-form')) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name"><b>{{ __('Ime i prezime') }}</b></label>
                        {!! Form::text('name', Auth()->user()->name ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', 'maxlength' => '50']) !!}
                        <small id="nameHelp" class="form-text text-muted"><b>{{ __('Unesite Vaše ime prezime') }}</b></small>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 mt-1">
                    <div class="form-group">
                        <label for="email"><b>{{ __('Email adresa') }}</b></label>
                        {!! Form::text('email', Auth()->user()->email ?? '', ['class' => 'form-control email required', 'id' => 'email', 'aria-describedby' => 'emailHelp', 'maxlength' => '50']) !!}
                        <small id="emailHelp" class="form-text text-muted"><b>{{ __('Unesite Vašu email adresu') }}</b></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone"><b>{{ __('Broj telefona') }}</b></label>
                        {!! Form::text('phone', Auth()->user()->phone ?? '', ['class' => 'form-control required', 'id' => 'phone', 'aria-describedby' => 'phoneHelp', 'maxlength' => '20']) !!}
                        <small id="phoneHelp" class="form-text text-muted"><b>{{ __('Unesite Vaš broj telefona') }}</b></small>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth_date"><b>{{ __('Datum rođenja') }}</b></label>
                        {!! Form::text('birth_date', Auth()->user()->birtDate() ?? '', ['class' => 'form-control required datepicker', 'id' => 'birth_date', 'aria-describedby' => 'birth_dateHelp', 'maxlength' => '10']) !!}
                        <small id="birth_dateHelp" class="form-text text-muted"><b>{{ __('Unesite Vaš datum rođenja') }}</b></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender"><b>{{ __('Spol') }}</b></label>
                        {!! Form::select('gender', $gender, Auth()->user()->gender ?? '7', ['class' => 'form-control', 'id' => 'gender', 'aria-describedby' => 'genderHelp']) !!}
                        <small id="genderHelp" class="form-text text-muted"><b>{{ __('Odaberite Vaš spol') }}</b></small>
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-4">

            <div class="row">
                <div class="col-md-6">
                    <label for="living_place"><b>{{ __('Grad') }}</b></label>
                    {!! Form::text('living_place', Auth()->user()->living_place ?? '', ['class' => 'form-control required', 'id' => 'living_place', 'aria-describedby' => 'living_placeHelp','maxlength' => '50']) !!}
                    <small id="living_placeHelp" class="form-text text-muted"><b>{{ __('Grad u kojem trenutno živite') }}</b></small>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country"> <b>{{ __('Država') }}</b> </label>
                        {!! Form::select('country', $countries, Auth()->user()->country ?? '21', ['class' => 'form-control required', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'style' => 'width:100%;']) !!}
                        <small id="countryHelp" class="form-text text-muted"> <b>{{ __('Odaberite državu u kojoj trenutno živite') }}</b> </small>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                        {!! Form::select('citizenship', $countries, Auth()->user()->citizenship ?? '21', ['class' => 'form-control required', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', 'style' => 'width:100%;']) !!}
                        <small id="citizenshipHelp" class="form-text text-muted"> <b>{{ __('Odaberite državu čiji ste državljanin') }}</b> </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="citizenship_2"> <b>{{ __('Drugo državljanstvo') }}</b> </label>
                        {!! Form::select('citizenship_2', $countries, Auth()->user()->citizenship_2 ?? '', ['class' => 'form-control', 'id' => 'citizenship_2', 'aria-describedby' => 'citizenship_2Help', 'style' => 'width:100%;']) !!}
                        <small id="citizenship_2Help" class="form-text text-muted"> <b>{{ __('Odaberite drugu državu čiji ste državljanin (ukoliko imate)') }}</b> </small>
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-4">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=facebook"> <b>{{ __('Facebook profil') }}</b> </label>
                        {!! Form::text('facebook', Auth()->user()->facebook ?? '', ['class' => 'form-control', 'id' => 'facebook', 'aria-describedby' => 'facebookHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="facebookHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg facebook profila') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=twitter"> <b>{{ __('Twitter profil') }}</b> </label>
                        {!! Form::text('twitter', Auth()->user()->twitter ?? '', ['class' => 'form-control', 'id' => 'twitter', 'aria-describedby' => 'twitterHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="twitterHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg twitter profila') }} </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=instagram"> <b>{{ __('Instagram profil') }}</b> </label>
                        {!! Form::text('instagram', Auth()->user()->instagram ?? '', ['class' => 'form-control', 'id' => 'instagram', 'aria-describedby' => 'instagramHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="instagramHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg instagram profila') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=youtube"> <b>{{ __('Youtube kanal') }}</b> </label>
                        {!! Form::text('youtube', Auth()->user()->youtube ?? '', ['class' => 'form-control', 'id' => 'youtube', 'aria-describedby' => 'youtubeHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="youtubeHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg youtube kanala') }} </small>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn btn-profile">{{ __('Ažurirajte') }}</button>
                </div>
            </div>

            {!! Form::close(); !!}
        </div>
    </div>
@endsection


@section('additional-scripts')
    <!-- Crop images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
