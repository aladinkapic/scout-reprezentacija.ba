@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Partneri') }} @endsection
@section('ph-short')
    {{__('Pregled svih partnera na scout.reprezentacija.ba sistemu !')}}
    | <a href="{{ route('system.additional.partners.create') }}">{{ __('Unos') }}</a>
@endsection

@section('ph-navigation') / <a href="{{route('system.additional.partners.index')}}"> {{ __('Partneri') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="80px" style="text-align:center;">#</th>
                <th> {{ __('Partner') }} </th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($partners as $partner)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td class="d-flex">
                        <div class="img-wrapper d-flex img-40">
                            <img src="{{ asset('images/partners/'.($partner->image ?? '')) }}" alt="">
                        </div>
                        <p class="pt-2">
                            {{ $partner->link ?? ''}}
                        </p>
                    </td>

                    <td class="text-center">
                        <a href="{{route('system.additional.partners.delete', ['id' => $partner->id] )}}" title="{{ __('Obrišite') }}">
                            <button class="btn-dark btn-xs">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
