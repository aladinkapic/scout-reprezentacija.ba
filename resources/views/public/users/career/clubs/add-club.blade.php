@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            <div class="content__menu">
                <h4>
                    @if(isset($clubData))
                        {{ $clubData->clubRel->title ?? '' }}
                    @else
                        {{ __('Unos kluba') }}
                    @endif
                </h4>

                <div class="cm__btns_w">
                    <a href="{{ route('profile.career-data.clubs') }}" title="{{ __('Nazad na pregled svih klubova') }}">
                        <button class="cm__btn"> <i class="fas fa-chevron-left"></i> <p>{{ __('Nazad') }}</p></button>
                    </a>
                </div>
            </div>

            @if(isset($edit))
                {!! Form::open(array('route' => 'profile.career-data.clubs.update-club-data', 'method' => 'post', 'id' => 'js-form')) !!}
                {!! Form::hidden('id', $clubData->id , ['class' => 'form-control', 'id' => 'id']) !!}
            @else
                {!! Form::open(array('route' => 'profile.career-data.clubs.save-new-club', 'method' => 'post', 'id' => 'js-form')) !!}
            @endif

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group cs2-out">
                        <label for="club_name"> <b>{{ __('Vaš klub') }}</b> </label>
                        {!! Form::text('club_name', $clubData->clubRel->title ?? '', ['s-input' => 'club', 's-val' => $clubData->club_id ?? '', 'class' => 'form-control c-select-2', 'id' => 'club_name',  'aria-describedby' => 'club_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="club_nameHelp" class="form-text text-muted" default="{{ __('Klub za koji trenutno igrate') }}"> {{ __('Klub za koji trenutno igrate') }} </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="season"> <b>{{ __('Sezona') }}</b> </label>
                        {!! Form::select('season', $seasons, $clubData->season ?? $currentSeason, ['class' => 'form-control required', 'id' => 'season', 'aria-describedby' => 'seasonHelp', isset($preview) ? 'disabled => true' : '']) !!}
                        <small id="seasonHelp" class="form-text text-muted"> {{ __('Npr. ') }} {{ date('Y') - 1 }} / {{ date('Y') }}</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="season_name"> <b>{{ __('Naziv takmičenja') }}</b> </label>
                        {!! Form::text('season_name', $clubData->season_name ?? '', ['class' => 'form-control required', 'id' => 'season_name', 'aria-describedby' => 'season_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                        <small id="season_nameHelp" class="form-text text-muted"> {{ __('Takmičenje u kojem se igrač takmiči') }} </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_games"> <b>{{ __('Broj utakmica') }}</b> </label>
                        {!! Form::number('no_games', $clubData->no_games ?? '', ['class' => 'form-control number required', 'id' => 'no_games', 'aria-describedby' => 'no_gamesHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="no_gamesHelp" class="form-text text-muted"> {{ __('Broj minuta u sezoni') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="goals"> <b>{{ __('Broj golova') }}</b> </label>
                        {!! Form::number('goals', $clubData->goals ?? '', ['class' => 'form-control number required', 'id' => 'goals', 'aria-describedby' => 'goalsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="goalsHelp" class="form-text text-muted"> {{ __('Broj golova u sezoni') }} </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="assistance"> <b>{{ __('Broj asistencija') }}</b> </label>
                        {!! Form::number('assistance', $clubData->assistance ?? '', ['class' => 'form-control number required', 'id' => 'assistance', 'aria-describedby' => 'assistanceHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="assistanceHelp" class="form-text text-muted"> {{ __('Broj asistencija u sezoni') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="minutes"> <b>{{ __('Broj minuta') }}</b> </label>
                        {!! Form::number('minutes', $clubData->minutes ?? '', ['class' => 'form-control number required', 'id' => 'minutes', 'aria-describedby' => 'minutesHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="minutesHelp" class="form-text text-muted"> {{ __('Broj odigranih minuta u sezoni') }} </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="red_cards"> <b>{{ __('Broj crvenih kartona') }}</b> </label>
                        {!! Form::number('red_cards', $clubData->red_cards ?? '', ['class' => 'form-control number required', 'id' => 'red_cards', 'aria-describedby' => 'red_cardsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="red_cardsHelp" class="form-text text-muted"> {{ __('Broj crvenih kartona u sezoni') }} </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="yellow_cards"> <b>{{ __('Broj žutih kartona') }}</b> </label>
                        {!! Form::number('yellow_cards', $clubData->yellow_cards ?? '', ['class' => 'form-control number required', 'id' => 'yellow_cards', 'aria-describedby' => 'yellow_cardsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                        <small id="yellow_cardsHelp" class="form-text text-muted"> {{ __('Broj žutih kartona u sezoni') }} </small>
                    </div>
                </div>
            </div>
            @if(Auth()->user()->position == 11 or  Auth()->user()->position == 14)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="without_goal"> <b>{{ __('Broj utakmica bez primljenog gola') }}</b> </label>
                            {!! Form::number('without_goal', $clubData->without_goal ?? '', ['class' => 'form-control number required', 'id' => 'without_goal', 'aria-describedby' => 'without_goalHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="without_goalHelp" class="form-text text-muted"> {{ __('Broj utakmica bez primljenog gola (samo za golmane)') }} </small>
                        </div>
                    </div>
                </div>
            @endif

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
