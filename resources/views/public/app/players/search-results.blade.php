@extends('public.layout.layout')

@section('content')
    <div class="container bootstrap snippets mt-3 min-height-100">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{ asset('js/app.js') }}"></script>

        @include('system.layout.snippets.filters.filter-header', ['var' => $users])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('system.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td class="user-with-image">
                        <div class="img-wrapper">
                            <img src="@if($user->image != '') {{ asset('images/profile-images/'.$user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                        </div>
                        <p>{{ $user->name ?? ''}}</p>
                    </td>
                    <td> {{ $user->sportRel->value ?? ''}} </td>
                    <td> {{ $user->positionRel->value ?? ''}} </td>
                    <td> {{ $user->height ?? ''}} </td>
                    <td> {{ $user->years_old ?? ''}} </td>
                    <td> {{ $user->strongerLimbRel->value ?? ''}} </td>
                    <td> {{ $user->genderRel->value ?? ''}} </td>
                    <td> {{ $user->under_contract ?? ''}} </td>
                    <td>
                        <ul class="m-0">
                            @foreach($user->natTeamDataRel as $natTeam)
                                <li> {{ $natTeam->countryRel->title ?? '' }} </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="m-0">
                            @foreach($user->clubDataRel as $clubData)
                                <li> {{ $clubData->clubRel->title ?? '' }} </li>
                            @endforeach
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{route('home.players.preview', ['id' => $user->id, 'what' => 'info'] )}}" title="Pregled korisnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('system.layout.snippets.filters.pagination', ['var' => $users])
    </div>
@endsection
