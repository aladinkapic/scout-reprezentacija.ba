@extends('public.layout.layout')

@section('content')

    @include('public.app.players.snippets.search')


    <div class="public-container players-list">
        @foreach($users as $user)
            <div class="player-card">
                <a href="{{route('home.players.preview', ['id' => $user->id, 'what' => 'timeline'] )}}" class="text-center d-block mb-4">
                <div class="pc-img-wrapper">
                    <img src="@if($user->image != '') {{ asset('images/profile-images/'.$user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
                </a>

                <div class="pc-data">
                   <b> <h3 class="text-center mt-3"> {{ $user->name ?? '' }} </h3> </b>

                    <p class="text-center m-0"> {{ $user->positionRel->value ?? '' }} </p>

                    <p class="text-center mt-2 mb-0"> <b> {{ $user->lastClub->clubRel->title ?? '' }} </b> </p>

                    <p class="text-center mt-0"> <i class="fas fa-map-pin"></i> {{ ucwords(strtolower( $user->citizenshipRel->title ?? '')) ?? '' }}  </p>

                    <a href="{{route('home.players.preview', ['id' => $user->id, 'what' => 'timeline'] )}}" class="text-center d-block mb-4">
                        <button class="btn btn-dark btn-sm"> <p class="m-0">{{ __('Profil igrača') }}</p> </button>
                    </a>
                </div>
            </div>
        @endforeach

        <div class="pages">
            @for($i=1; $i<=$noPages; $i++)
                <div class="single-page " page="{{ $i }}">
                    <p> {{$i}} </p>
                </div>
            @endfor

            @if($noPages != 2)
                <div class="single-page next-one" page="{{$nextPage}}">
                    <p>Sljedeća stranica</p>
                </div>
            @endif
        </div>

{{--        <div class="player-card">--}}

{{--        </div>--}}

{{--        <div class="player-card">--}}

{{--        </div>--}}

{{--        <div class="player-card">--}}

{{--        </div>--}}

{{--        <div class="player-card">--}}

{{--        </div>--}}

{{--        <div class="player-card">--}}

{{--        </div>--}}


{{--        <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
{{--        <script src="{{ asset('js/app.js') }}"></script>--}}

{{--        @include('system.layout.snippets.filters.filter-header', ['var' => $users])--}}
{{--        <table class="table table-bordered m-0 p-0" id="filtering">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col" style="text-align:center;">#</th>--}}
{{--                @include('system.layout.snippets.filters.filters_header')--}}
{{--                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @php $i=1; @endphp--}}
{{--            @foreach($users as $user)--}}
{{--                <tr>--}}
{{--                    <td class="text-center">{{ $i++}}</td>--}}
{{--                    <td class="user-with-image">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <img src="@if($user->image != '') {{ asset('images/profile-images/'.$user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">--}}
{{--                        </div>--}}
{{--                        <p>{{ $user->name ?? ''}}</p>--}}
{{--                    </td>--}}
{{--                    <td> {{ $user->sportRel->value ?? ''}} </td>--}}
{{--                    <td> {{ $user->positionRel->value ?? ''}} </td>--}}
{{--                    <td> {{ $user->height ?? ''}} </td>--}}
{{--                    <td> {{ $user->years_old ?? ''}} </td>--}}
{{--                    <td> {{ $user->strongerLimbRel->value ?? ''}} </td>--}}
{{--                    <td> {{ $user->genderRel->value ?? ''}} </td>--}}
{{--                    <td> {{ $user->under_contract ?? ''}} </td>--}}
{{--                    <td>--}}
{{--                        <ul class="m-0">--}}
{{--                            @foreach($user->natTeamDataRel as $natTeam)--}}
{{--                                <li> {{ $natTeam->countryRel->title ?? '' }} </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <ul class="m-0">--}}
{{--                            @foreach($user->clubDataRel as $clubData)--}}
{{--                                <a href="{{ route('home.clubs.preview', ['id' => $clubData->clubRel->id ?? '']) }}" class="text-info text-decoration-none">--}}
{{--                                    <li> {{ $clubData->clubRel->title ?? '' }} </li>--}}
{{--                                </a>--}}

{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </td>--}}

{{--                    <td class="text-center">--}}
{{--                        <a href="{{route('home.players.preview', ['id' => $user->id, 'what' => 'info'] )}}" title="Pregled korisnika">--}}
{{--                            <button class="btn-dark btn-xs">Pregled</button>--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}


{{--        @include('system.layout.snippets.filters.pagination', ['var' => $users])--}}
    </div>
@endsection
