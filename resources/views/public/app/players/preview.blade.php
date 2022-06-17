@extends('public.layout.layout')

@section('content')
    <!-- Profile Header -->
    @include('public.app.players.profile.profile-header')

    <div class="public-container">
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
