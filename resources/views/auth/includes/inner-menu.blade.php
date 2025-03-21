<div class="inner__menu">
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile')) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/user-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/user-solid-white.svg') }}" alt="Fa icon">

            <p>{{ __('Lični podaci') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.career') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.career')) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/book-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/book-solid-white.svg') }}" alt="Fa icon">

            <p>{{ __('Karijera') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.club-data') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.club-data')) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/futbol-regular.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/futbol-regular-white.svg') }}" alt="Fa icon">

            <p>{{ __('Klub') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.national-team-data') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.national-team-data')) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/flag-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/flag-solid-white.svg') }}" alt="Fa icon">

            <p>{{ __('Reprezentacija') }}</p>
        </div>
    </a>
{{--    <a href="#">--}}
{{--        <div class="im__element @if(Route::is('dashboard.my-evaluations')) active @endif">--}}
{{--            <i class="fas fa-check"></i>--}}
{{--            <p>{{ __('Status zahtjeva') }}</p>--}}
{{--        </div>--}}
{{--    </a>--}}
</div>
