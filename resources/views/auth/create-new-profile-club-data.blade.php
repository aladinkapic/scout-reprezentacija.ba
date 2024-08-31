@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('auth.includes.left-side')

            <div class="profile__wrapper_right">

                @include('auth.includes.inner-menu')

                {!! Form::open(array('route' => 'auth.create-new-profile.update-club-data', 'method' => 'post', 'id' => 'js-form')) !!}

                @if(isset($clubData))
                    <div class="row">
                        <div class="col-md-12">
                            <label for="club"><b>{{ __('Vaš klub') }}</b></label>
                            {!! Form::text('club', $clubData->clubRel->title ?? '', ['class' => 'form-control', 'id' => 'club', 'aria-describedby' => 'clubHelp', 'readonly' => 'true']) !!}
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <label for="club"><b>{{ __('Vaš klub') }}</b></label>
                            {!! Form::select('club', [], '', ['class' => 'form-control s2-search-clubs', 'id' => 'club', 'aria-describedby' => 'clubHelp','style' => 'width:100% !important;']) !!}
                            <small id="clubHelp" class="form-text text-danger"><b>{{ __('Klub za koji trenutno igrate (ako nije na listi, obavezno ga napišite u napomeni)') }}</b></small>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="season"> <b>{{ __('Sezona') }}</b> </label>
                            {!! Form::select('season', $seasons, $clubData->season ?? $currentSeason, ['class' => 'form-control', 'id' => 'season', 'aria-describedby' => 'seasonHelp', isset($preview) ? 'disabled => true' : '']) !!}
                            <small id="seasonHelp" class="form-text text-muted"> {{ __('Npr. ') }} {{ date('Y') - 1 }} / {{ date('Y') }}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="season_name"> <b>{{ __('Naziv takmičenja') }}</b> </label>
                            {!! Form::text('season_name', $clubData->season_name ?? '', ['class' => 'form-control ', 'id' => 'season_name', 'aria-describedby' => 'season_nameHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="season_nameHelp" class="form-text text-muted"> {{ __('Takmičenje u kojem se igrač takmiči') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_games"> <b>{{ __('Broj utakmica') }}</b> </label>
                            {!! Form::number('no_games', $clubData->no_games ?? '', ['class' => 'form-control number', 'id' => 'no_games', 'aria-describedby' => 'no_gamesHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="no_gamesHelp" class="form-text text-muted"> {{ __('Broj minuta u sezoni') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="goals"> <b>{{ __('Broj golova') }}</b> </label>
                            {!! Form::number('goals', $clubData->goals ?? '', ['class' => 'form-control number', 'id' => 'goals', 'aria-describedby' => 'goalsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="goalsHelp" class="form-text text-muted"> {{ __('Broj golova u sezoni') }} </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assistance"> <b>{{ __('Broj asistencija') }}</b> </label>
                            {!! Form::number('assistance', $clubData->assistance ?? '', ['class' => 'form-control number', 'id' => 'assistance', 'aria-describedby' => 'assistanceHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="assistanceHelp" class="form-text text-muted"> {{ __('Broj asistencija u sezoni') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="minutes"> <b>{{ __('Broj minuta') }}</b> </label>
                            {!! Form::number('minutes', $clubData->minutes ?? '', ['class' => 'form-control number', 'id' => 'minutes', 'aria-describedby' => 'minutesHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="minutesHelp" class="form-text text-muted"> {{ __('Broj odigranih minuta u sezoni') }} </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="red_cards"> <b>{{ __('Broj crvenih kartona') }}</b> </label>
                            {!! Form::number('red_cards', $clubData->red_cards ?? '', ['class' => 'form-control number', 'id' => 'red_cards', 'aria-describedby' => 'red_cardsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="red_cardsHelp" class="form-text text-muted"> {{ __('Broj crvenih kartona u sezoni') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="yellow_cards"> <b>{{ __('Broj žutih kartona') }}</b> </label>
                            {!! Form::number('yellow_cards', $clubData->yellow_cards ?? '', ['class' => 'form-control number', 'id' => 'yellow_cards', 'aria-describedby' => 'yellow_cardsHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                            <small id="yellow_cardsHelp" class="form-text text-muted"> {{ __('Broj žutih kartona u sezoni') }} </small>
                        </div>
                    </div>
                </div>
                @if(Auth()->user()->position == 11 or  Auth()->user()->position == 14)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="without_goal"> <b>{{ __('Broj utakmica bez primljenog gola') }}</b> </label>
                                {!! Form::number('without_goal', $clubData->without_goal ?? '', ['class' => 'form-control number', 'id' => 'without_goal', 'aria-describedby' => 'without_goalHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                                <small id="without_goalHelp" class="form-text text-muted"> {{ __('Broj utakmica bez primljenog gola (samo za golmane)') }} </small>
                            </div>
                        </div>
                    </div>
                @endif

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="note"> <b>{{ __('Napomena') }}</b> </label>
                            {!! Form::textarea('note', Auth()->user()->note ?? '', ['class' => 'form-control', 'id' => 'note', 'aria-describedby' => 'noteHelp', 'style' => 'height:80px !important;' ,'maxlength' => '1000']) !!}
                            <small id="noteHelp" class="form-text text-danger"> <b>{{ __('Ukoliko ne možete pronaći klub, molimo da nam u napomeni napišete naziv vašeg kluba. ') }}</b> </small>
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
@endsection
