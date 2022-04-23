@extends('system.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-plus"></i> @endsection
@section('ph-main') {{__('Naslov posta')}} @endsection
@section('ph-short')
    {{__('Kratki opis za ovu stranicu u aplikaciji')}}
@endsection

@section('ph-navigation')
    / <a href="#">{{__('Home')}}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper p-3">

    </div>
@endsection
