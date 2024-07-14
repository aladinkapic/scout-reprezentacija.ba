@extends('public.layout.layout')

@section('content')
    <div class="create__new_profile__w">
        <div class="profile__wrapper">
            @include('auth.includes.left-side')

            <div class="profile__wrapper_right">

                @include('auth.includes.inner-menu')

                {!! Form::open(array('route' => 'auth.create-new-profile.update-career', 'method' => 'post', 'id' => 'js-form')) !!}

                <div class="row">
                    <div class="col-md-12">
                        <label for="club"><b>{{ __('Vaš klub') }}</b></label>
                        {!! Form::select('club', [], 'Test', ['class' => 'form-control s2-search-clubs', 'id' => 'club', 'aria-describedby' => 'clubHelp','style' => 'width:100% !important;']) !!}
                        <small id="clubHelp" class="form-text text-danger"><b>{{ __('Klub za koji trenutno igrate (ako nije na listi, obavezno ga napišite u napomeni)') }}</b></small>
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
