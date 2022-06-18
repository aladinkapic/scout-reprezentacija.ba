@extends('public.layout.layout')

@section('content')
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
            </div>


            <div class="pw-right pw-right-body">
                <div class="pw-r-b-info">
                    @foreach($club->posts as $post)
                        <div class="single-post">
                            <div class="sp-header">
                                <div class="sp-h-iw">
                                    <img src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
                                </div>
                                <div class="sp-h-data">
                                    <p> {{ $club->title ?? '' }} </p>
                                    <span> {{ $post->getDate() }} </span>
                                    <div class="love-it loved-it">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="sp-body">
                                <p> {!! $post->content ?? '' !!} </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
