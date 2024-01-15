@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-users"></i> @endsection
@section('ph-main') {{ __('Citati kroisnika') }} @endsection
@section('ph-short')
    {{__('Pregled svih citata na scout.reprezentacija.ba sistemu !')}}
    | <a href="{{ route('system.additional.quote.create') }}">{{ __('Unos') }}</a>
@endsection

@section('ph-navigation') / <a href="{{route('system.additional.quote.index')}}"> {{ __('Citati') }} </a> @endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="80px" style="text-align:center;">#</th>
                <th width="200px"> {{ __('Ime i prezime') }} </th>
                <th> {{ __('Titula') }} </th>
                <th> {{ __('Citat') }} </th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($quotes as $quote)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td class="d-flex">
                        <div class="img-wrapper d-flex img-40">
                            <img src="{{ asset('images/quotes/'.($quote->image ?? '')) }}" alt="">
                        </div>
                        <p class="pt-2 ml-2">
                            {{ $quote->name ?? ''}}
                        </p>
                    </td>
                    <td>{{ $quote->title }}</td>
                    <td>{{ $quote->quote }}</td>

                    <td class="text-center">
                        <a href="{{route('system.additional.quote.delete', ['id' => $quote->id] )}}" title="{{ __('Obrišite') }}">
                            <button class="btn-dark btn-xs">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
