@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Partneri') }} @endsection
@section('ph-short')
    {{__('Pregled svih partnera na scout.reprezentacija.ba sistemu !')}}
    | <a href="{{ route('system.additional.partners.create') }}">{{ __('Unos') }}</a>
@endsection

@section('ph-navigation') / <a href="{{route('system.additional.partners.index')}}"> {{ __('Partneri') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.additional.partners.save', 'files'=>'true', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link"> <b>{{ __('Link') }}</b> </label>
                            {!! Form::text('link', '', ['class' => 'form-control', 'id' => 'link', 'aria-describedby' => 'linkHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="country_idHelp" class="form-text text-muted"> {{ __('Unesite link web stranice, polje nije obavezno!') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{ __('Odaberite logo') }}</label>
                            <input class="form-control" type="file" id="image" name="image">
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
