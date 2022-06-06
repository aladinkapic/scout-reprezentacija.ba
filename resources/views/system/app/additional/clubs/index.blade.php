@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-futbol"></i> @endsection
@section('ph-main') {{ __('Pregled klubova') }} @endsection
@section('ph-short') {{__('Pregled svih nogometnih / futsal klubova u sistemu !')}} @endsection

@section('ph-navigation') / <a href="{{route('system.additional.clubs.index')}}"> {{ __('Klubovi') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
{{--    <div class="content-wrapper content-wrapper-bs">--}}
{{--        @include('system.layout.snippets.filters.filters', ['var' => $users])--}}
{{--        <table class="table table-bordered" id="filtering">--}}
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
{{--                    <td> {{ $user->name ?? ''}} </td>--}}
{{--                    <td> {{ $user->email ?? ''}} </td>--}}
{{--                    <td> {{ $user->address ?? ''}} </td>--}}
{{--                    <td> {{ $user->cityRel->title ?? ''}} </td>--}}
{{--                    <td> {{ $user->countryRel->title ?? ''}} </td>--}}

{{--                    <td class="text-center">--}}
{{--                        <a href="{{route('system.users.edit', ['id' => $user->id] )}}" title="Pregled korisnika">--}}
{{--                            <button class="btn-dark btn-xs">Pregled</button>--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
@endsection
