@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-futbol"></i> @endsection
@section('ph-main') @if(isset($club)) {{ $club->title ?? 'Nema naziva' }} @else {{ __('Pregled klubova') }} @endif @endsection
@section('ph-short')
    {{__('Pregledajte detaljne informacije o klubu')}}
    @if(isset($preview))
        | <a href="{{route('system.additional.clubs.edit', ['id' => $club->id ?? ''])}}"> {{ __('Uredite') }} </a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="{{route('system.additional.clubs.index')}}"> {{ __('Klubovi') }} </a>
    @if(isset($create))
        / <a href="{{route('system.additional.clubs.create')}}"> {{ __('Unos kluba') }} </a>
    @else
        / <a href="{{route('system.additional.clubs.preview', ['id' => $club->id ?? '' ])}}"> {{ $club->title ?? '' }} </a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">
        <div class="row">
            <div class="col-md-12">
                @if(isset($edit))
                    {!! Form::open(array('route' => 'system.additional.clubs.update', 'id' => 'js-form', 'method' => 'PUT')) !!}
                    {!! Form::hidden('id', $club->id ?? '', ['class' => 'form-control']) !!}
                @elseif(isset($timeline))
{{--                    {!! Form::open(array('route' => 'system.additional.clubs.save-post', 'id' => 'js-form', 'method' => 'POST')) !!}--}}
{{--                    {!! Form::hidden('id', $club->id ?? '', ['class' => 'form-control']) !!}--}}
                @else
                    {!! Form::open(array('route' => 'system.additional.clubs.save', 'id' => 'js-form', 'method' => 'POST')) !!}
                @endif
                    <div class="row">
                        <div class="@if(isset($timeline)) col-md-9 @else col-md-12 @endif">
                            @if(isset($timeline))
                                {!! Form::open(array('route' => 'system.blog-posts.save', 'method' => 'POST', 'enctype' => 'multipart/form-data')) !!}
                                {!! Form::hidden('category', '1', ['class' => 'form-control']) !!}

                                {!! Form::hidden('edit_post', '', ['class' => 'form-control', 'id' => 'edit_post']) !!}
                                {!! Form::hidden('owner', $club->id, ['class' => 'form-control', 'id' => 'edit_post']) !!}
                                {!! Form::hidden('edit_post_image', '', ['class' => 'form-control', 'id' => 'edit_post_image']) !!}
                                {!! Form::hidden('post_id', '', ['class' => 'form-control', 'id' => 'post_id']) !!}

                                @include('system.app.blog.club.new-post')
                                {!! Form::close(); !!}
                                <!-- Preview all created posts -->
                                @include('system.app.blog.club.posts-preview', ['data' => $club->blogPosts])
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title"> <b>{{ __('Naziv kluba') }}</b> </label>
                                            {!! Form::text('title', $club->title ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'titleHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="titleHelp" class="form-text text-muted"> {{ __('Puni naziv kluba') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="year"> <b>{{ __('Godina osnivanja') }}</b> </label>
                                            {!! Form::number('year', $club->year ?? '', ['class' => 'form-control number', 'id' => 'year', 'aria-describedby' => 'yearHelp', isset($preview) ? 'readonly' : '', 'min' => '1800', 'max' => date('Y'), 'step' => '1']) !!}
                                            <small id="yearHelp" class="form-text text-muted"> {{ __('Godina kada je klub osnovan') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city"> <b>{{ __('Grad') }}</b> </label>
                                            {!! Form::text('city', $club->city ?? '', ['class' => 'form-control required', 'id' => 'city', 'aria-describedby' => 'cityHelp', isset($preview) ? 'readonly' : '']) !!}
                                            <small id="cityHelp" class="form-text text-muted"> {{ __('Grad u kojem se klub nalazi') }} </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country"> <b>{{ __('Država') }}</b> </label>
                                            {!! Form::select('country', $countries, $club->country ?? '30', ['class' => 'form-control required select-2', 'id' => 'country', 'aria-describedby' => 'countryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="countryHelp" class="form-text text-muted"> {{ __('Država u kojoj se klub nalazi') }} </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="@if($loggedUser->role == 0) col-md-6 @else col-md-12 @endif">
                                        <div class="form-group">
                                            <label for="category"> <b>{{ __('Kategorija') }}</b> </label>
                                            {!! Form::select('category', $sport, $club->category ?? '', ['class' => 'form-control required', 'id' => 'category', 'aria-describedby' => 'categoryHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                            <small id="categoryHelp" class="form-text text-muted"> {{ __('Kategorija kojoj klub pripada') }} </small>
                                        </div>
                                    </div>
                                    @if($loggedUser->role == 0)
                                        <div class="@if($loggedUser->role == 0) col-md-6 @else col-md-12 @endif">
                                            <div class="form-group">
                                                <label for="owner"> <b>{{ __('Odgovorna osoba') }}</b> </label>
                                                {!! Form::select('owner', $users, $club->owner ?? '', ['class' => 'form-control select-2', 'id' => 'owner', 'aria-describedby' => 'ownerHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                                <small id="ownerHelp" class="form-text text-muted"> {{ __('Odaberite odgovornu osobu koja će imati pristup informacijama kluba') }} </small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if(!isset($preview))
                                    <div class="row mt-3">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                        @if(isset($timeline))
                            @include('system.app.additional.clubs.snippets.right-menu')
                        @endif
                    </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
