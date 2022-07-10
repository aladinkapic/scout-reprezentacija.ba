@extends('public.layout.layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Profile Header -->
    <div class="pp-header">
        <div class="public-container">
            <div class="preview-wrapper">
                <div class="pw-left">
                    <div class="image-wrapper">
                        <img src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
                    </div>
                </div>
                <div class="pw-right pw-right-header">
                    <h1> {{ $club->title ?? '' }} </h1>
                    <div class="social-networks">
                        <p> {{ $club->city ?? '' }}, {{ $club->countryRel->title ?? '' }} </p>
                    </div>
                    <div class="bottom-white">
                        <div class="bw-title">
                            <div class="icon-wrapper">
                                <i class="fa fa-info"></i>
                            </div>
                            <h2> {{ __('Detaljne informacije') }} </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="public-container">
        <div class="preview-body-wrapper">
            <div class="pw-left pw-left-body">
                <div class="tb-row">
                    <div class="tb-row-col-flex">
                        <p class="key"><span>{{ __('Sport') }}</span></p>
                        <p class="value"> {{ $club->categoryRel->value ?? '' }} </p>
                    </div>
                    <div class="tb-row-col-flex">
                        <p class="key"><span>{{ __('Godina osnivanja') }}</span></p>
                        <p class="value"> {{ $club->year ?? '' }} </p>
                    </div>
                </div>

                <div class="tb-row img-thumb-wrapper">
                    @foreach($club->blogPosts as $post)
                        @if(isset($post->image) and $post->image != '')
                            <div class="img-thumb" post-id="{{ $post->id }}">
                                <img src="{{ asset('images/blog/' . $post->image ?? '') }}" alt="">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="pw-right pw-right-body">
                <div class="pw-r-b-info">
                    <div class="posts-wrapper">
                        @foreach($club->blogPosts as $post)
                            <div class="single-post">
                                <div class="sp-header">
                                    <div class="sp-h-img-wrapper">
                                        <img src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
                                    </div>
                                    <div class="sp-h-name-field">
                                        <p> {{ $club->title ?? '' }} </p>
                                        <span> {{ __('Objavljeno') }} {{ $post->createdAt() }} </span>
                                    </div>
                                    <div class="sp-icons">
                                        <div class="sp-i-wrapper love-it-trigger @if($post->checkIfLiked()) loved-it @endif" post-id="{{ $post->id }}" title="{{ __('Ukupno ') }} {{ $post->likesRel->count() }} {{ __('sviđanja') }}">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="sp-post">
                                    {!! nl2br($post->post ?? '') !!}
                                </div>

                                <!-- Iframe - youtube video -->
                                @if(isset($post->youtube) and $post->youtube != '')
                                    <div class="iframe-wrapper">
                                        <iframe src="{{ $post->youtube ?? '' }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                                    </div>
                                @endif

                            <!-- Image -->
                                @if(isset($post->image) and $post->image != '')
                                    <div class="image-wrapper">
                                        <img src="{{ asset('images/blog/' . $post->image ?? '') }}" alt="">
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="image-preview d-none">
                        <div class="ip-post-preview">
                            <div class="upper-icons">
                                <div class="ui-icon-wrapper">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="img-wrapper">
                                <img class="post-image-src" src="/images/blog/81299a99dca41ec9d03a0c3e12128820.jpeg" alt="">
                            </div>
                            <div class="post-details">
                                <h4 class="post-title">  </h4>
                                <p> <span class="post-date"></span> <i class="fas fa-clock"></i> </p>

                                <p class="description post-description">

                                </p>
                            </div>

                            <div class="arrow-icon-wrapper left-arrow-icon-wrapper" post-id="">
                                <i class="fas fa-angle-left"></i>
                            </div>
                            <div class="arrow-icon-wrapper right-arrow-icon-wrapper" post-id="">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
