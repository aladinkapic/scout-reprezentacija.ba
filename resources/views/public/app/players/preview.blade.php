@extends('public.layout.layout')

@section('page_title') {{ $player->name ?? '' }} @endsection
@section('seo_title'){{ $player->name ?? '' }}@endsection
@section('seo_uri'){{ route("home.players.preview", ["id" => $player->id, "what" => "timeline"]) }}@endsection
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
@endsection
