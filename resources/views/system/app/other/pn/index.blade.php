@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-book"></i> @endsection
@section('ph-main') {{ __('Javne obavijesti') }} @endsection
@section('ph-short')
    {{__('Pregled svih javnih obavijesti na stranici')}}
    | <a href="{{ route('system.other.public-notifications.create') }}">{{ __('Unos obavijesti') }}</a>
@endsection

@section('ph-navigation')
    / <a href="{{route('system.other.public-notifications.index')}}"> {{ __('Obavijesti') }} </a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">#</th>
                <th>{{__('Sadržaj')}}</th>
                <th width="120px" class="text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($pns as $pn)
                <tr>
                    <td class="text-center"><b>{{ $i++}}</b></td>
                    <td> <b>{{ $pn->content }}</b> </td>

                    <td class="text-center">
                        <a href="{{ route('system.other.public-notifications.preview', ['id' => $pn]) }}" title="Pregled korisnika">
                            <button class="btn-dark btn-xs">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
