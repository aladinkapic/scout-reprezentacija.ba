@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-futbol"></i> @endsection
@section('ph-main') {{ __('Pregled klubova') }} @endsection
@section('ph-short') {{__('Pregled svih nogometnih / futsal klubova u sistemu !')}} @endsection

@section('ph-navigation') / <a href="{{route('system.additional.clubs.index')}}"> {{ __('Klubovi') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('system.layout.snippets.filters.filters', ['var' => $clubs])
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
            @foreach($clubs as $club)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $club->title ?? ''}} </td>
                    <td> {{ $club->year ?? ''}} </td>
                    <td> {{ $club->city ?? ''}} </td>
                    <td> {{ $club->countryRel->title ?? ''}} </td>
                    <td> {{ $club->categoryRel->value ?? ''}} </td>
                    <td> {{ $club->ownerRel->name ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{route('system.additional.clubs.preview', ['id' => $club->id] )}}" title="{{ __('Pregled kluba') }}">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
