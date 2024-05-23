@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-book"></i> @endsection
@section('ph-main') {{ __('Obavijesti') }} @endsection
@section('ph-short')
    {{__('Pregled svih javnih obavijesti na stranici')}}
    @if(isset($preview))
        | <a href="{{ route('system.other.public-notifications.edit', ['id' => $pn->id ]) }}">{{ __('Uredite') }}</a>
        | <a href="{{ route('system.other.public-notifications.delete', ['id' => $pn->id ]) }}">{{ __('Obrišite') }}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.other.public-notifications.index')}}"> {{ __('Obavijesti') }} </a>
    @if(isset($create))
        / <a href="#"> {{ __('Unos obavijesti') }} </a>
    @else
        / <a href="#"> {{ __('Obavijesti') }} </a>
    @endif
@endsection


<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.other.public-notifications.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $pn->id ?? '', ['class' => 'form-control']) !!}
                @else
                    {!! Form::open(array('route' => 'system.other.public-notifications.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from"> <b>{{ __('Datum od') }}</b> </label>
                                {!! Form::text('from', isset($pn) ? $pn->dateFrom() : '', ['class' => 'form-control required datepicker', 'id' => 'from', 'aria-describedby' => 'fromHelp', isset($preview) ? 'readonly' : '', 'maxlength' => 10]) !!}
                                <small id="fromHelp" class="form-text text-muted"> {{ __('Datum od kad se prikazuje') }} </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to"> <b>{{ __('Datum do') }}</b> </label>
                                {!! Form::text('to', isset($pn) ? $pn->dateTo() : '', ['class' => 'form-control required datepicker', 'id' => 'to', 'aria-describedby' => 'toHelp', isset($preview) ? 'readonly' : '', 'maxlength' => '10']) !!}
                                <small id="descriptionHelp" class="form-text text-muted"> {{ __('Datum do kad se prikazuje') }} </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="link"> <b>{{ __('Link') }}</b> </label>
                                {!! Form::text('link', $pn->link ?? '', ['class' => 'form-control required', 'id' => 'link', 'aria-describedby' => 'linkHelp', isset($preview) ? 'readonly' : '', 'maxlength' => 300]) !!}
                                <small id="linkHelp" class="form-text text-muted"> {{ __('Link na koji može voditi') }} </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content"> <b>{{ __('Sadržaj') }}</b> </label>
                                {!! Form::textarea('content', $pn->content ?? '', ['class' => 'form-control required', 'id' => 'content', 'aria-describedby' => 'contentHelp', isset($preview) ? 'readonly' : '', 'style' => 'height:120px !important;']) !!}
                                <small id="contentHelp" class="form-text text-muted"> {{ __('Sadržaj poruke') }} </small>
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
