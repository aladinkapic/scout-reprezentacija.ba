@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{ __('Unos šifarnika') }} @endsection
@section('ph-short')
    {{__('Unesite / uredite instance šifarnika')}} {{ $keyword }}

    @if(isset($edit))
        | <a href="{{ route('system.settings.core.keywords.delete') }}" sample-id="{{ $kwrd->id ?? '' }}" title="{{__('Obrišite šifarnik')}}" class="delete-item" data-toggle="modal" data-target="#deleteData"> {{ __('Obrišite') }} </a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="#"> {{ __('Šifarnici') }} </a>
    / <a href="{{route('system.settings.core.keywords.index')}}"> {{ __('Ostalo') }} </a>
    / <a href="{{route('system.settings.core.keywords.preview', ['keyword' => $key])}}"> {{ $keyword }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.settings.core.keywords.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $kwrd->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.settings.core.keywords.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                    {!! Form::hidden('keyword', $key ?? '', ['class' => 'form-control']) !!}
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="value"> <b>{{ __('Instanca šifarnika') }}</b> </label>
                                {!! Form::text('value', $kwrd->value ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'valueHelp', isset($preview) ? 'readonly' : '', 'maxlength' => 150]) !!}
                                <small id="valueHelp" class="form-text text-muted"> {{ __('Naziv šifarnika koji će se prikazivati') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"> <b>{{ __('Kratki opis') }}</b> </label>
                                {!! Form::text('description', $kwrd->description ?? '', ['class' => 'form-control', 'id' => 'email', 'aria-describedby' => 'descriptionHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '250']) !!}
                                <small id="descriptionHelp" class="form-text text-muted"> {{ __('Kratki opis vrijednosti šifarnika - vidljivo samo administratoru') }} </small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                        </div>
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
