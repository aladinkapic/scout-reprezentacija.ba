@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-user"></i> @endsection
@section('ph-main') @if(isset($user)) {{ $user->name ?? '' }} @else {{ __('Unesite korisnika') }} @endif @endsection
@section('ph-short') {{__('Pregledajte / uredite Vaše osnovne informacije na www.portalu scout.reprezentacija.ba!')}} @endsection

@section('ph-navigation')
    / <a href="#"> .. </a>
    / <a href="{{ route('system.users.preview', ['id' => $user->id]) }}"> {{ $user->name ?? '' }} </a>
    / <a href="#">{{ __('Osnovne informacije') }}</a>
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
