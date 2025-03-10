@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('system.app.users.new-profile.snippets.left-menu')

            <div class="profile__wrapper_right">

                @include('system.app.users.new-profile.snippets.inner-menu')

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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="height"> <b>{{ __('Pod ugovorom') }}</b> </label>
                            {!! Form::select('under_contract', ['Ne' => 'Ne', 'Da' => 'Da'], $user->under_contract ?? '', ['class' => 'form-control required', 'id' => 'under_contract', 'aria-describedby' => 'under_contractHelp', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="under_contractHelp" class="form-text text-muted"> {{ __('Da li ste trenutno pod ugovorom?') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="height"> <b>{{ __('Visina (cm)') }}</b> </label>
                            {!! Form::number('height', $user->height ?? '0', ['class' => 'form-control', 'id' => 'height', 'aria-describedby' => 'heightHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => 230]) !!}
                            <small id="heightHelp" class="form-text text-muted"> {{ __('Visina korisnika u cm') }} </small>
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
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
