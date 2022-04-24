@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{ __('Pregled šifarnika') }} @endsection
@section('ph-short') {{__('Pregled svih instanci šifarnika koji se koriste u sistemu. Odaberite željeni šifarnik za više informacija')}} @endsection

@section('ph-navigation')
    / <a href="#"> {{ __('Šifarnici') }} </a>
    / <a href="{{route('system.settings.core.keywords.index')}}"> {{ __('Ostalo') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">#</th>
                <th>{{__('Instanca šifarnika')}}</th>
                <th width="120px" class="text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($keywords as $key => $value)
                <tr>
                    <td class="text-center"><b>{{ $i++}}</b></td>
                    <td> <b>{{ $value }}</b> </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.core.keywords.preview', ['keyword' => $key]) }}" title="Pregled korisnika">
                            <button class="btn-dark btn-xs">Pregled</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
