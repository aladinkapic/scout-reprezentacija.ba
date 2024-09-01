@extends('public.layout.layout')

@section('title') {{ $player->name ?? '' }} @endsection
@section('page_title') {{ $player->name ?? '' }} @endsection
@section('seo_title'){{ $player->name ?? '' }}@endsection
@section('seo_uri') {{ isset($player) ? route('home.players.player-info', ['username' => $player->username] ) : "www.scout.reprezentacija.ba" }}@endsection
@section('seo_description'){{ __('Pratite i Vi ' . ($player->name ?? '') . ' na Scout.Reprezentacija.BA!' ) }}@endsection
@section('seo_image'){{ asset(($player->image != '') ? ('images/profile-images/'.$player->image ?? '') : ('images/user.png')) }}@endsection

@section('content')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Profile Header -->
    @include('public.app.players.profile.profile-header')

    <div class="public-container public-container-margin-zero">
        <div class="preview-body-wrapper">
            @include('public.app.players.profile.left-side')
            <div class="pw-right pw-right-body">
                <div class="pw-r-b-info">
                    @if($what == 'info')
                        @include('public.app.players.profile.info')
                    @else
                        @include('public.app.players.profile.timeline')
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('public.app.players.snippets.news')
    {{--@if(($player->from_api == 1 and $player->player_id != null)) @endif--}}
@endsection
