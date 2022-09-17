@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Citati kroisnika') }} @endsection
@section('ph-short')
    {{__('Pregled svih citata na scout.reprezentacija.ba sistemu !')}}
    | <a href="{{ route('system.additional.quote.create') }}">{{ __('Unos') }}</a>
@endsection

@section('ph-navigation') / <a href="{{route('system.additional.quote.index')}}"> {{ __('Citati') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.additional.quote.save', 'files'=>'true', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"> <b>{{ __('Ime i prezime') }}</b> </label>
                            {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'aria-describedby' => 'nameHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="nameHelp" class="form-text text-muted"> {{ __('Unesite ime i prezime osobe koju citirate!') }} </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="formFile" class="form-label"><b> {{ __('Odaberite fotografiju') }} </b></label>
                            <input class="form-control pt-1" type="file" id="image" name="image">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"> <b>{{ __('Titula osobe') }}</b> </label>
                            {!! Form::text('title', '', ['class' => 'form-control', 'id' => 'title', 'aria-describedby' => 'titleHelp', isset($preview) ? 'readonly' : '', 'placeholder' => 'Selektor reprezentacije BiH']) !!}
                            <small id="titleHelp" class="form-text text-muted"> {{ __('Titula osobe koju citirate') }} </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="quote"> <b>{{ __('Citat') }}</b> </label>
                            {!! Form::textarea('quote', '', ['class' => 'form-control', 'id' => 'quote', 'aria-describedby' => 'quoteHelp', isset($preview) ? 'readonly' : '', 'style' => 'height:120px !important;']) !!}
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
