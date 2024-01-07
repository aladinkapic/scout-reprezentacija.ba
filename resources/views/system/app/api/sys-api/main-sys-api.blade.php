@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Sistemski API') }} @endsection
@section('ph-short') {{__('Pregled svih sistemskih API servica na scout.reprezentacija.ba')}} @endsection

@section('ph-navigation') / <a href="#"> {{ __('Korisnici') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="80px" style="text-align:center;">#</th>
                <th scope="col" >{{ __('API Poziv') }}</th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">1. </td>
                <td> {{ __('Fetch players statistics') }} </td>

                <td class="text-center">
                    <a href="{{route('system.sys-api.fetch-statistics')}}">
                        <button class="btn-dark btn-xs">{{ __('Ažuriraj') }}</button>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
