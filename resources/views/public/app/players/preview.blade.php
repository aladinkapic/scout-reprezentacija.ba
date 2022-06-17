@extends('public.layout.layout')

@section('content')
    <div class="pp-header">
        <div class="public-container">
            <div class="preview-wrapper">
                <div class="pw-left">
                    <div class="image-wrapper">
                        <img src="{{ asset('images/profile-images/affc0509f010175876310b386bfbaf18.png') }}" alt="">
                    </div>
                </div>
                <div class="pw-right pw-right-header">
                    <h1>Aladin Kapić</h1>
                    <div class="social-networks">
                        <p>Muhameda ef. Pandže 55, Bosna i Hercegovina</p>
{{--                        <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                        <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                        <a href="#"><i class="fab fa-instagram"></i></a>--}}
                    </div>
                    <div class="bottom-white">
                        <div class="bw-title">
                            <div class="icon-wrapper">
                                <i class="fa fa-info"></i>
                            </div>
                            <h2>Detaljne informacije </h2>
                        </div>
                        <div class="bw-buttons">
                            <a href="" title="{{ __('Detaljne informacije o igraču') }}">
                                <div class="bw-b-button active"> <p>Informacije</p> </div>
                            </a>
                            <a href="" title="{{ __('Statistički podaci o igraču') }}">
                                <div class="bw-b-button"> <p>Statistika</p> </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="public-container">
        <div class="preview-wrapper">
            <div class="pw-left pw-left-body">
                <div class="tb-row">
                    <div class="tb-row-col-flex">
                        <p class="key"><span>{{ __('Sport') }}</span></p>
                        <p class="value"> Nogomet </p>
                    </div>
                    <div class="tb-row-col-flex">
                        <p class="key"><span>{{ __('Jača noga') }}</span></p>
                        <p class="value"> Desna </p>
                    </div>
                    <div class="tb-row-col-flex">
                        <p class="key"><span>{{ __('Pozicija') }}</span></p>
                        <p class="value"> Napadač </p>
                    </div>
                </div>
            </div>
            <div class="pw-right pw-right-body">

            </div>
        </div>
    </div>
@endsection
