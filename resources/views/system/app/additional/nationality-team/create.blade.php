@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-flag"></i> @endsection
@section('ph-main') {{ __('Statistika u reprezentaciji') }} @endsection
@section('ph-short')
    {{__('Unesite / uredite informacije o Vašim nastupima u reprezentaciji')}}
    @if(isset($preview))
        | <a href="{{route('system.additional.nat-team-data.edit', ['id' => $clubData->id ?? ''])}}"> {{ __('Uredite') }} </a>
        | <a href="{{route('system.additional.nat-team-data.delete', ['id' => $clubData->id ?? ''])}}"> {{ __('Obrišite') }} </a>
    @endif
@endsection

@section('ph-navigation')
    @if($loggedUser->role == 0)
        / <a href="{{ route('system.users.edit', ['id' => $clubData->userRel->id] ) }}"> {{ $clubData->userRel->name ?? '' }}</a>
    @else
        / <a href="{{ route('system.users.profile') }}"> {{ __('Moj profil') }}</a>
    @endif
    @if(isset($create))
        / <a href="{{route('system.additional.club-data.create')}}"> {{ __('Statistika u klubu') }} </a>
    @else
        / <a href="{{route('system.additional.club-data.preview', ['id' => $clubData->id ?? '' ])}}"> {{ $clubData->season ?? '' }} </a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.additional.nat-team-data.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $clubData->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.additional.nat-team-data.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country_id"> <b>{{ __('Reprezentacija') }}</b> </label>
                                {!! Form::select('country_id', $countries, $clubData->country_id ?? '', ['class' => 'form-control required select-2', 'id' => 'club_id', 'aria-describedby' => 'country_idHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="country_idHelp" class="form-text text-muted"> {{ __('Odaberite reprezentaciju u kojoj ste igrali') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="season"> <b>{{ __('Sezona') }}</b> </label>
                                {!! Form::select('season', $seasons, $clubData->season ?? '', ['class' => 'form-control', 'id' => 'season', 'aria-describedby' => 'seasonHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="seasonHelp" class="form-text text-muted"> {{ __('Npr. ') }} {{ date('Y') - 1 }} / {{ date('Y') }}</small>
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
                    <div class="row">
                        <div class="@if($loggedUser->position == 11 or  $loggedUser->position == 14) col-md-6 @else col-md-12 @endif">
                            <div class="form-group">
                                <label for="category"> <b>{{ __('Tim') }}</b> </label>
                                {!! Form::select('category', $team,  $clubData->category ?? '', ['class' => 'form-control required', 'id' => 'category', 'aria-describedby' => 'categoryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="categoryHelp" class="form-text text-muted"> {{ __('Odaberite tim u kojem ste igrali') }} </small>
                            </div>
                        </div>
                        @if($loggedUser->position == 11 or  $loggedUser->position == 14)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="without_goal"> <b>{{ __('Broj utakmica bez primljenog gola') }}</b> </label>
                                    {!! Form::number('without_goal', $clubData->without_goal ?? '', ['class' => 'form-control number required', 'id' => 'without_goal', 'aria-describedby' => 'without_goalHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'step' => 1]) !!}
                                    <small id="without_goalHelp" class="form-text text-muted"> {{ __('Broj utakmica bez primljenog gola (samo za golmane)') }} </small>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                            </div>
                        </div>
                    @endif
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
