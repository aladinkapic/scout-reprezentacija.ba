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
                @elseif(isset($editMyProfile))
                    {!! Form::open(array('route' => 'system.users.update-profile', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $user->id ?? '', ['class' => 'form-control']) !!}
                @elseif(isset($profile))
                    <!-- Do nothing -->
                @else
                    {!! Form::open(array('route' => 'system.users.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                @endif

                    <div class="row">
                        <div class="@if(isset($profile)) col-md-9 @else col-md-12 @endif">
                            @if(isset($profile))
                                @include('system.app.blog.new-post')
                                <!-- Preview all created posts -->
                                @include('system.app.blog.posts-preview')
                            @else
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
                                            <label for="sport"> <b>{{ __('Sport') }}</b> </label>
                                            {!! Form::select('sport', $sport, $user->sport ?? '', ['class' => 'form-control required pick-a-sport', 'id' => 'sport', 'aria-describedby' => 'sportHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="sportHelp" class="form-text text-muted"> {{ __('Sport kojim se bavi korisnik') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position"> <b>{{ __('Pozicija') }}</b> </label>
                                            {!! Form::select('position', $position, $user->position ?? '', ['class' => 'form-control required picked-position', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="positionHelp" class="form-text text-muted"> {{ __('Pozicija koju igra korisnik') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="leg_arm"> <b>{{ __('Jača noga') }}</b> </label>
                                            {!! Form::select('stronger_limb', $leg_arm, $user->leg_arm ?? '', ['class' => 'form-control required', 'id' => 'stronger_limb', 'aria-describedby' => 'stronger_limbHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="stronger_limbHelp" class="form-text text-muted"> {{ __('Odaberite jaču nogu') }} </small>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="citizenship"> <b>{{ __('Državljanstvo') }}</b> </label>
                                            {!! Form::select('citizenship', $countries, $user->citizenship ?? '', ['class' => 'form-control required select-2', 'id' => 'citizenship', 'aria-describedby' => 'citizenshipHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="citizenshipHelp" class="form-text text-muted"> {{ __('Vaše državljanstvo') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                            <label for=phone"> <b>{{ __('Telefon') }}</b> </label>
                                            {!! Form::text('phone', $user->phone_number ?? '', ['class' => 'form-control phone', 'id' => 'phone_number', 'aria-describedby' => 'phoneHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '15']) !!}
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height"> <b>{{ __('Visina (cm)') }}</b> </label>
                                            {!! Form::number('height', $user->height ?? '', ['class' => 'form-control required', 'id' => 'height', 'aria-describedby' => 'heightHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 230]) !!}
                                            <small id="heightHelp" class="form-text text-muted"> {{ __('Visina korisnika u cm') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height"> <b>{{ __('Pod ugovorom') }}</b> </label>
                                            {!! Form::select('under_contract', ['Ne' => 'Ne', 'Da' => 'Da'], $user->under_contract ?? '', ['class' => 'form-control required', 'id' => 'under_contract', 'aria-describedby' => 'under_contractHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="under_contractHelp" class="form-text text-muted"> {{ __('Da li ste trenutno pod ugovorom?') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=facebook"> <b>{{ __('Facebook profil') }}</b> </label>
                                            {!! Form::text('facebook', $user->facebook ?? '', ['class' => 'form-control', 'id' => 'facebook', 'aria-describedby' => 'facebookHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="facebookHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg facebook profila') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=twitter"> <b>{{ __('Twitter profil') }}</b> </label>
                                            {!! Form::text('twitter', $user->twitter ?? '', ['class' => 'form-control', 'id' => 'twitter', 'aria-describedby' => 'twitterHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="twitterHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg twitter profila') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=instagram"> <b>{{ __('Instagram profil') }}</b> </label>
                                            {!! Form::text('instagram', $user->instagram ?? '', ['class' => 'form-control', 'id' => 'instagram', 'aria-describedby' => 'instagramHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="instagramHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg instagram profila') }} </small>
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

                                    @if(isset($preview))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="note"> <b>{{ __('Napomena') }}</b> </label>
                                                    {!! Form::textarea('note', $user->note ?? '', ['class' => 'form-control', 'id' => 'note', 'style' => 'height:120px !important', 'aria-describedby' => 'noteHelp', 'readonly']) !!}
                                                    <small id="noteHelp" class="form-text text-muted"> {{ __('Vidljivo samo administratorima sistema') }} </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                @if(!isset($preview))
                                    <div class="row mt-3 mb-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        @if(isset($profile))
                            @include('system.app.users.right-menu')
                        @endif
                    </div>

                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
