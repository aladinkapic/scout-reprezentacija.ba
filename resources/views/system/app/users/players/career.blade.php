@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user"></i> @endsection
@section('ph-main') @if(isset($user)) {{ $user->name ?? '' }} @else {{ __('Unesite korisnika') }} @endif @endsection
@section('ph-short') {{__('Pregledajte / uredite Vaše osnovne informacije na www.portalu scout.reprezentacija.ba!')}} @endsection

@section('ph-navigation')
    / <a href="#"> .. </a>
    / <a href="{{ route('system.users.preview', ['id' => $user->id]) }}"> {{ $user->name ?? '' }} </a>
    / <a href="#">{{ __('Karijera') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper @if(isset($profile)) p-0 border-none @else p-3 @endif">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.users.update-profile', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $user->id ?? '', ['class' => 'form-control']) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
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
                                    {!! Form::select('position', $position, $user->position ?? '', ['class' => 'form-control required', 'id' => 'position', 'aria-describedby' => 'positionHelp', isset($preview) ? 'disabled => true' : '']) !!}
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
                                    {!! Form::select('stronger_limb', $leg_arm, $user->stronger_limb ?? '', ['class' => 'form-control required', 'id' => 'stronger_limb', 'aria-describedby' => 'stronger_limbHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                    <small id="stronger_limbHelp" class="form-text text-muted"> {{ __('Odaberite jaču nogu') }} </small>
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

                        @if(!isset($preview))
                            <div class="row mt-3 mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
