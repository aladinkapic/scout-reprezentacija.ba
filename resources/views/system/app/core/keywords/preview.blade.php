@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{ $keyword }} @endsection
@section('ph-short')
    {{__('Pregled svih vrijednosti šifarnika:')}} {{ $keyword }}.
    | <a href="{{ route('system.settings.core.keywords.create', ['keyword' => $key]) }}">{{ __('Unesite novi') }}</a>
@endsection

@section('ph-navigation')
    / <a href="#"> {{ __('Šifarnici') }} </a>
    / <a href="{{route('system.settings.core.keywords.index')}}"> {{ __('Ostalo') }} </a>
    / <a href="{{route('system.settings.core.keywords.preview', ['keyword' => $key])}}"> {{ $keyword }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">#</th>
                <th>{{__('Vrijednost')}}</th>
                <th>{{__('Kratki opis')}}</th>
                <th width="120px" class="text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($keywords as $keyword)
                <tr>
                    <td class="text-center"><b>{{ $i++}}</b></td>
                    <td> <b>{{ $keyword->value ?? '' }}</b> </td>
                    <td> <b>{{ $keyword->description ?? '' }}</b> </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.core.keywords.edit', ['id' => $keyword->id ?? 0]) }}" title="{{ __('Pregled vrijednosti šifarnika') }}">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
