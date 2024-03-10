@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-futbol"></i> @endsection
@section('ph-main') {{ __('Statistika u klubu') }} @endsection
@section('ph-short')
    {{__('Unesite / uredite informacije o Vašim nastupima u klubovima')}}
    @if(isset($preview))
        | <a href="{{route('system.additional.club-data.edit', ['id' => $clubData->id ?? ''])}}"> {{ __('Uredite') }} </a>
        | <a href="{{route('system.additional.club-data.delete', ['id' => $clubData->id ?? ''])}}"> {{ __('Obrišite') }} </a>
    @endif
@endsection

@section('ph-navigation')
    @if($loggedUser->role == 0)
        / <a href="{{ route('system.users.preview', ['id' => $user->id] ) }}"> {{ $user->name ?? '' }}</a>
    @else
        / <a href="{{ route('system.users.profile') }}"> {{ __('Moj profil') }}</a>
    @endif
    @if(isset($create))
        / <a href="{{route('system.additional.club-data.create')}}"> {{ __('Statistika u klubu') }} </a>
    @else
        / <a href="{{route('system.additional.club-data.preview', ['id' => $clubData->id ?? '' ])}}"> {{ $clubData->seasonRel->value ?? '' }} </a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <link href="" rel="stylesheet" />

    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.additional.club-data.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $clubData->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.additional.club-data.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                    {!! Form::hidden('user_id', $user->id, ['class' => 'form-control']) !!}
                @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="club_id"> <b>{{ __('Naziv kluba') }}</b> </label>
                                {!! Form::select('club_id', [($clubData->club_id ?? '') => $clubData->clubRel->title ?? ''], $clubData->club_id ?? '', ['class' => 'form-control required s2-search-clubs', 'id' => 'club_id', 'aria-describedby' => 'club_idHelp']) !!}
                                <small id="club_idHelp" class="form-text text-muted"> {{ __('Odaberite klub u kojem ste igrali') }} </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="season"> <b>{{ __('Sezona') }}</b> </label>
                                {!! Form::select('season', $seasons, $clubData->season ?? '', ['class' => 'form-control', 'id' => 'season', 'aria-describedby' => 'seasonHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="seasonHelp" class="form-text text-muted"> {{ __('Npr. ') }} {{ date('Y') - 1 }} / {{ date('Y') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="season_name"> <b>{{ __('Naziv takmičenja') }}</b> </label>
                                {!! Form::text('season_name', $clubData->season_name ?? '', ['class' => 'form-control', 'id' => 'season_name', 'aria-describedby' => 'season_nameHelp', isset($preview) ? 'readonly' : '']) !!}
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
                    @if($loggedUser->position == 11 or  $loggedUser->position == 14)
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shirt_number"> <b>{{ __('Broj na dresu') }}</b> </label>
                                {!! Form::number('shirt_number', $clubData->shirt_number ?? '', ['class' => 'form-control number required', 'id' => 'shirt_number', 'aria-describedby' => 'shirt_numberHelp', isset($preview) ? 'readonly' : '', 'min' => 0, 'max' => '100', 'step' => 1]) !!}
                                <small id="shirt_numberHelp" class="form-text text-muted"> {{ __('Unesite Vaš broj na dresu u odabranoj sezoni') }} </small>
                            </div>
                        </div>
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
