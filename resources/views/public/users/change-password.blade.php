@extends('public.layout.layout')

@section('content')
    <div class="my__profile__wrapper">
        @include('public.users.snippets.left_menu')

        <div class="content__part">
            {!! Form::open(array('route' => 'profile.update-password', 'method' => 'post', 'id' => 'js-form')) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password"> <b>{{ __('Uneste novu šifru') }}</b> </label>
                        {!! Form::password('password', ['class' => 'form-control required', 'id' => 'password', 'aria-describedby' => 'passwordHelp']) !!}
                        <small id="passwordHelp" class="form-text text-muted"> {{ __('Unesite novu šifru za pristup sistemu') }} </small>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn btn-profile">{{ __('Ažurirajte') }}</button>
                </div>
            </div>

            {!! Form::close(); !!}
        </div>
    </div>
@endsection


@section('additional-scripts')
    <!-- Crop images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
@endsection
