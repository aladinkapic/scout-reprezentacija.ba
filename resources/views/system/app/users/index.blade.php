@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Pregled korisnika') }} @endsection
@section('ph-short') {{__('Pregled svih registrovanih korisnika u sistemu !')}} @endsection

@section('ph-navigation') / <a href="{{route('system.users.index')}}"> {{ __('Korisnici') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

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
                    <td> {{ $user->name ?? ''}} </td>
                    <td> {{ $user->email ?? ''}} </td>
                    <td> {{ $user->sportRel->value ?? ''}} </td>
                    <td> {{ $user->positionRel->value ?? ''}} </td>
                    <td> {{ $user->height ?? ''}} </td>
                    <td> {{ $user->strongerLimbRel->value ?? ''}} </td>
                    <td> {{ $user->genderRel->value ?? ''}} </td>
                    <td>
                        <ul>
                            @foreach($user->clubDataRel as $clubData)
                                <li>{{ $clubData->clubRel->title ?? '' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($user->clubDataRel as $clubData)
                                <li>{{ $clubData->clubRel->countryRel->name_ba ?? '' }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td> {{ $user->statusRel->value ?? ''}} </td>
                    <td> @if($user->from_api == 0) {{ $user->submittedRel->value ?? ''}} @endif </td>

                    <td class="text-center">
                        <a href="{{route('system.users.preview', ['id' => $user->id] )}}" title="Pregled korisnika">
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
