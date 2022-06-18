@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-futbol"></i> @endsection
@section('ph-main') {{ $club->title ?? 'Nema naziva' }} @endsection
@section('ph-short')
    {{__('Pregledajte detaljne informacije o klubu')}}
    | <a href="{{route('system.additional.clubs.delete-post', ['id' => $post->id ?? ''])}}"> {{ __('Obrišite') }} </a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.additional.clubs.index')}}"> {{ __('Klubovi') }} </a>
    / <a href="{{route('system.additional.clubs.preview', ['id' => $club->id ?? '' ])}}"> {{ $club->title ?? '' }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('route' => 'system.additional.clubs.update-post', 'id' => 'js-form', 'method' => 'PUT')) !!}
                {!! Form::hidden('id', $post->id ?? '', ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::textarea('description', $post->content ?? '', ['class' => 'form-control required', 'id' => 'description', 'style' => 'height:200px !important;', 'maxlength' => '500']) !!}
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Spremite')}}</b> </button>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('#description').summernote({
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
