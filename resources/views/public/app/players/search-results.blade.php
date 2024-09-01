@extends('public.layout.layout')

@section('title') {{ __('Pretraga igrača na Scout.Reprezentacija.BA') }} @endsection

@section('content')

    @include('public.app.players.snippets.search')

    <div class="public-container players-list">
        @foreach($users as $user)
            <div class="player-card">
                <a href="{{route('home.players.player-timeline', ['username' => $user->username] )}}" class="text-center d-block mb-4">
                    <div class="pc-img-wrapper">
                        <img src="@if($user->image != '') {{ asset('images/profile-images/'.$user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                    </div>
                </a>

                <div class="pc-data">
                    <b> <h3 class="text-center mt-3"> {{ $user->name ?? '' }} </h3> </b>
                    <p class="text-center m-0"> {{ __($user->positionRel->value ?? '') }} </p>
                    <p class="text-center mt-2 mb-0"> <b> {{ $user->lastClub->clubRel->title ?? '' }} </b> </p>
                    <p class="text-center mt-0"> <i class="fas fa-map-pin"></i> {{ ucwords(strtolower( $user->citizenshipRel->title ?? '')) ?? '' }}  </p>

                    @if($user->from_api == 1 and $user->player_id != null)
                        <a href="{{route('home.players.player-info', ['username' => $user->username] )}}" class="text-center d-block mb-4">
                            <button class="btn btn-dark btn-sm yellow-btn"> <p class="m-0">{{ __('Profil igrača') }}</p> </button>
                        </a>
                    @else
                        <a href="{{route('home.players.player-timeline', ['username' => $user->username] )}}" class="text-center d-block mb-4">
                            <button class="btn btn-dark btn-sm yellow-btn"> <p class="m-0">{{ __('Profil igrača') }}</p> </button>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="pages">
            @for($i=1; $i<=$noPages; $i++)
                <div class="single-page @if($i == $currentPage) focus @endif" page="{{ $i }}">
                    <p> {{$i}} </p>
                </div>
            @endfor
            @if($noPages != 2)
                <div class="single-page next-one" page="{{$nextPage}}">
                    <p>{{ __('Sljedeća stranica') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
