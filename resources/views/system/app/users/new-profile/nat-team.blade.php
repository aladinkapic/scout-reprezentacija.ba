@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('system.app.users.new-profile.snippets.left-menu')

            <div class="profile__wrapper_right">
                @include('system.app.users.new-profile.snippets.inner-menu')

                <div class="row nt-data-wrapper">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country_id"> <b>{{ __('Reprezentacija') }}</b> </label>
                                    {!! Form::select('country_id', $countries, $clubData->country_id ?? '', ['class' => 'form-control', 'id' => 'club_id', 'aria-describedby' => 'country_idHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="country_idHelp" class="form-text text-muted"> {{ __('Odaberite reprezentaciju u kojoj ste igrali') }} </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category"> <b>{{ __('Tim') }}</b> </label>
                                    {!! Form::select('category', $team,  $clubData->category ?? '', ['class' => 'form-control', 'id' => 'category', 'aria-describedby' => 'categoryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="categoryHelp" class="form-text text-muted"> {{ __('Odaberite tim u kojem ste igrali') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="season"> <b>{{ __('Sezona debija za reprezentaciju') }}</b> </label>
                                    {!! Form::select('season', $seasons, $clubData->season ?? $currentSeason, ['class' => 'form-control', 'id' => 'season', 'aria-describedby' => 'seasonHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="seasonHelp" class="form-text text-muted"> {{ __('Npr. ') }} {{ date('Y') - 1 }} / {{ date('Y') }}</small>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
