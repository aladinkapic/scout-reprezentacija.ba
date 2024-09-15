@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('auth.includes.left-side')

            <div class="profile__wrapper_right">

                @include('auth.includes.inner-menu')

                {!! Form::open(array('route' => 'auth.create-new-profile.update-career', 'method' => 'post', 'id' => 'js-form')) !!}

                @if(!Auth()->user()->submitted)
                    @include('auth.includes.alert-message')
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <label for="sport"><b>{{ __('Nogomet / Futsal?') }}</b></label>
                        {!! Form::select('sport', $sports, $user->sport ?? '', ['class' => 'form-control required new-profile-sport', 'id' => 'sport', 'aria-describedby' => 'sportHelp']) !!}
                        <small id="sportHelp" class="form-text text-muted"><b>{{ __('Sport kojim se bavite') }}</b></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position"> <b>{{ __('Pozicija') }}</b> </label>
                            {!! Form::select('position', $position, $user->position ?? '', ['class' => 'form-control required new-profile-position', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="positionHelp" class="form-text text-muted"> {{ __('Pozicija na kojoj igrač igra') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position_2"> <b>{{ __('Sekundarna pozicija') }}</b> </label>
                            {!! Form::select('position_2', $position, $user->position_2 ?? '', ['class' => 'form-control new-profile-position', 'id' => 'position_2', 'aria-describedby' => 'position_2Help', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="position_2Help" class="form-text text-muted"> {{ __('Druga pozicija na kojoj igrač igra') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
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
                            <label for="leg_arm"> <b>{{ __('Jača noga') }}</b> </label>
                            {!! Form::select('stronger_limb', $leg_arm, $user->stronger_limb ?? '', ['class' => 'form-control required', 'id' => 'stronger_limb', 'aria-describedby' => 'stronger_limbHelp', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="stronger_limbHelp" class="form-text text-muted"> {{ __('Odaberite jaču nogu') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shirt_number"> <b>{{ __('Broj na dresu') }}</b> </label>
                            {!! Form::number('shirt_number', $user->shirt_number ?? '', ['class' => 'form-control required', 'id' => 'shirt_number', 'aria-describedby' => 'shirt_numberHelp', isset($preview) ? 'disabled => true' : '', 'min' => '0', 'max' => '99', 'step' => '1']) !!}
                            <small id="shirt_numberHelp" class="form-text text-muted"> {{ __('Unesite Vaš trenutni broj na dresu') }} </small>
                        </div>
                    </div>
                </div>


{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <label for="club"><b>{{ __('Vaš klub') }}</b></label>--}}
{{--                        {!! Form::select('club', [], 'Test', ['class' => 'form-control s2-search-clubs', 'id' => 'club', 'aria-describedby' => 'clubHelp','style' => 'width:100% !important;']) !!}--}}
{{--                        <small id="clubHelp" class="form-text text-danger"><b>{{ __('Klub za koji trenutno igrate (ako nije na listi, obavezno ga napišite u napomeni)') }}</b></small>--}}
{{--                    </div>--}}
{{--                </div>--}}


                @if(!Auth()->user()->submitted)
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn">{{ __('Sljedeće korak') }}</button>
                        </div>
                    </div>
                @endif
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
@endsection

@section('additional-scripts')
    <!-- Crop images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
