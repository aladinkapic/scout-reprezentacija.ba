@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            {!! Form::open(array('route' => 'profile.info.career.update', 'method' => 'post', 'id' => 'js-form')) !!}

            <div class="row">
                <div class="col-md-12">
                    <label for="sport"><b>{{ __('Nogomet / Futsal?') }}</b></label>
                    {!! Form::select('sport', $sports, Auth()->user()->sport ?? '', ['class' => 'form-control required new-profile-sport', 'id' => 'sport', 'aria-describedby' => 'sportHelp']) !!}
                    <small id="sportHelp" class="form-text text-muted"><b>{{ __('Sport kojim se bavite') }}</b></small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="position"> <b>{{ __('Pozicija') }}</b> </label>
                        {!! Form::select('position', $position, Auth()->user()->position ?? '', ['class' => 'form-control required new-profile-position', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'disabled => true' : '']) !!}
                        <small id="positionHelp" class="form-text text-muted"> {{ __('Pozicija na kojoj igrač igra') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="position_2"> <b>{{ __('Sekundarna pozicija') }}</b> </label>
                        {!! Form::select('position_2', $position, Auth()->user()->position_2 ?? '', ['class' => 'form-control new-profile-position', 'id' => 'position_2', 'aria-describedby' => 'position_2Help', isset($preview) ? 'disabled => true' : '']) !!}
                        <small id="position_2Help" class="form-text text-muted"> {{ __('Druga pozicija na kojoj igrač igra') }} </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="height"> <b>{{ __('Pod ugovorom') }}</b> </label>
                        {!! Form::select('under_contract', ['Ne' => 'Ne', 'Da' => 'Da'], Auth()->user()->under_contract ?? '', ['class' => 'form-control required', 'id' => 'under_contract', 'aria-describedby' => 'under_contractHelp', isset($preview) ? 'disabled => true' : '']) !!}
                        <small id="under_contractHelp" class="form-text text-muted"> {{ __('Da li ste trenutno pod ugovorom?') }} </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="leg_arm"> <b>{{ __('Jača noga') }}</b> </label>
                        {!! Form::select('stronger_limb', $leg_arm, Auth()->user()->stronger_limb ?? '', ['class' => 'form-control required', 'id' => 'stronger_limb', 'aria-describedby' => 'stronger_limbHelp', isset($preview) ? 'disabled => true' : '']) !!}
                        <small id="stronger_limbHelp" class="form-text text-muted"> {{ __('Odaberite jaču nogu') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="shirt_number"> <b>{{ __('Broj na dresu') }}</b> </label>
                        {!! Form::number('shirt_number', Auth()->user()->shirt_number ?? '', ['class' => 'form-control required', 'id' => 'shirt_number', 'aria-describedby' => 'shirt_numberHelp', isset($preview) ? 'disabled => true' : '', 'min' => '0', 'max' => '99', 'step' => '1']) !!}
                        <small id="shirt_numberHelp" class="form-text text-muted"> {{ __('Unesite Vaš trenutni broj na dresu') }} </small>
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
