@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-edit"></i> @endsection
@section('ph-main') {{ __('Uredite Vaš post') }}  @endsection
@section('ph-short')
    {{__('Uredite ili u potpunosti izmijenite Vaš post na portalu!')}}

    | <a href="{{ route('system.users.delete-post', ['id' => $post->id]) }}"> {{ __('Obrišite') }} </a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.users.index')}}"> {{ __('Korisnici') }} </a>
    / <a href="{{ route('system.users.profile') }}"> {{ __('Moj profil') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.users.update-post', 'id' => 'js-form', 'method' => 'PUT')) !!}
                {!! Form::hidden('id', $post->id ?? '', ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::textarea('summernoteDesc', $post->content ?? '', ['class' => 'form-control required', 'id' => 'summernoteDesc', 'style' => 'height:200px !important;']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Spremite')}}</b> </button>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#summernoteDesc').summernote({
                                    height: 'auto',
                                    disableResizeEditor: true,
                                    toolbar: [ ['font', ['bold', 'italic', 'underline']], ['insert', ['link']] ],
                                });
                            });
                        </script>
                    </div>

                    @include('system.app.users.right-menu')
                </div>

                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
