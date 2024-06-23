@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user"></i> @endsection
@section('ph-main') @if(isset($user)) {{ $user->name ?? '' }} @else {{ __('Unesite korisnika') }} @endif @endsection
@section('ph-short')
    {{__('Pregledajte / uredite osnovne informacije o korisnicima u sistemu !')}}

    @if(isset($preview))
        | <a href="{{route('system.users.edit', ['id' => $user->id])}}"> {{ __('Uredite') }} </a>
        | <a href="{{route('system.users.delete', ['id' => $user->id])}}"> {{ __('Obrišite') }} </a>

        | <a href="{{route('system.users.preview-wall', ['id' => $user->id])}}"> {{ __('Uredite zid') }} </a>
        | <a href="{{ route('system.users.switch-to-user', ['id' => $user->id ]) }}">{{ __('Prebaci se na korisnika') }}</a>
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
    <div class="content-wrapper @if(isset($profile)) p-0 border-none @else p-3 @endif">

        @if(session()->has("success"))
            <div class="alert alert-success">
                {{ session()->get("success") }} asdsadas
            </div>
        @endif

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
                        <div class="@if(isset($profile) or (isset($preview) and $loggedUser->role == 0)) col-md-9 @else col-md-12 @endif">

                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            @if(isset($profile))
                                {!! Form::open(array('route' => 'system.blog-posts.save', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
                                    {!! Form::hidden('category', '0', ['class' => 'form-control']) !!}
                                    {!! Form::hidden('owner', $user->id, ['class' => 'form-control', 'id' => 'owner']) !!}
                                    {!! Form::hidden('edit_post', '', ['class' => 'form-control', 'id' => 'edit_post']) !!}
                                    {!! Form::hidden('edit_post_image', '', ['class' => 'form-control', 'id' => 'edit_post_image']) !!}
                                    {!! Form::hidden('post_id', '', ['class' => 'form-control', 'id' => 'post_id']) !!}

                                    @if(!$root)
                                        @include('system.app.blog.new-post')
                                    @endif
                                {!! Form::close(); !!}

                                <!-- Preview all created posts -->
                                @include('system.app.blog.posts-preview', ['data' => $user->blogPosts, 'user' => $user, 'root' => $root])
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="sport"> <b>{{ __('Sport') }}</b> </label>
                                            {!! Form::select('sport', $sport, $user->sport ?? '', ['class' => 'form-control required pick-a-sport', 'id' => 'sport', 'aria-describedby' => 'sportHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="sportHelp" class="form-text text-muted"> {{ __('Sport kojim se igrač bavi') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position"> <b>{{ __('Pozicija') }}</b> </label>
                                            {!! Form::select('position', $position, $user->position ?? '', ['class' => 'form-control', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="positionHelp" class="form-text text-muted"> {{ __('Pozicija na kojoj igrač igra') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position_2"> <b>{{ __('Druga pozicija') }}</b> </label>
                                            {!! Form::select('position_2', $position, $user->position_2 ?? '', ['class' => 'form-control', 'id' => 'position_2', 'aria-describedby' => 'position_2Help', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="position_2Help" class="form-text text-muted"> {{ __('Druga pozicija na kojoj igrač igra') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="leg_arm"> <b>{{ __('Jača noga') }}</b> </label>
                                            {!! Form::select('stronger_limb', $leg_arm, $user->stronger_limb ?? '', ['class' => 'form-control', 'id' => 'stronger_limb', 'aria-describedby' => 'stronger_limbHelp', isset($preview) ? 'disabled => true' : '']) !!}
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height"> <b>{{ __('Visina (cm)') }}</b> </label>
                                            {!! Form::number('height', $user->height ?? '0', ['class' => 'form-control', 'id' => 'height', 'aria-describedby' => 'heightHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 230]) !!}
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=instagram"> <b>{{ __('Instagram profil') }}</b> </label>
                                            {!! Form::text('instagram', $user->instagram ?? '', ['class' => 'form-control', 'id' => 'instagram', 'aria-describedby' => 'instagramHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="instagramHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg instagram profila') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=youtube"> <b>{{ __('Youtube kanal') }}</b> </label>
                                            {!! Form::text('youtube', $user->youtube ?? '', ['class' => 'form-control', 'id' => 'youtube', 'aria-describedby' => 'youtubeHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="youtubeHelp" class="form-text text-muted"> {{ __('Unesite link Vašeg youtube kanala') }} </small>
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

                                @if($loggedUser->role == 0 and !isset($profile))
                                    <hr>

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="init_club"> <b>{{ __('Klub za koji igra') }}</b> </label>--}}
{{--                                                {!! Form::text('init_club', $user->init_club ?? '', ['class' => 'form-control', 'id' => 'init_club', 'aria-describedby' => 'init_clubHelp', isset($preview) ? 'readonly' : '']) !!}--}}
{{--                                                <small id="init_clubHelp" class="form-text text-muted"> {{ __('Inicijalni klub za koji igrač igra') }} </small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="from_api"> <b>{{ __('Automatsko ažuriranje') }}</b> </label>
                                                {!! Form::select('from_api', ['0' => 'Ne', '1' => 'Da'], $user->from_api ?? '', ['class' => 'form-control', 'id' => 'from_api', 'aria-describedby' => 'from_apiHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                                <small id="from_apiHelp" class="form-text text-muted"> {{ __('Da li se podaci automatski ažuriraju sa API-a?') }} </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="player_id"> <b>{{ __('Id igrača') }}</b> </label>
                                                {!! Form::text('player_id', $user->player_id ?? '', ['class' => 'form-control', 'id' => 'player_id', 'aria-describedby' => 'player_idHelp', isset($preview) ? 'readonly' : '']) !!}
                                                <small id="player_id" class="form-text text-muted"> {{ __('Id igrača sa reprezentacija.ba API-a') }} </small>
                                            </div>
                                        </div>
                                    </div>

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

                                @if(!isset($preview))
                                    <div class="row mt-3 mb-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        @if(isset($profile) or (isset($preview) and $loggedUser->role == 0))
                            @include('system.app.users.right-menu')
                        @endif
                    </div>

                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
