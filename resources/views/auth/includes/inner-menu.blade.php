<div class="inner__menu">
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile')) active @endif">
            <i class="fas fa-user"></i>
            <p>{{ __('Lični podaci') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.career') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.career')) active @endif">
            <i class="fas fa-book"></i>
            <p>{{ __('Karijera') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.club-data') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.club-data')) active @endif">
            <i class="fas fa-futbol"></i>
            <p>{{ __('Klub') }}</p>
        </div>
    </a>
    <a href="@if(Auth()->check()) {{ route('auth.create-new-profile.national-team-data') }} @endif">
        <div class="im__element @if(Route::is('auth.create-new-profile.national-team-data')) active @endif">
            <i class="fas fa-flag"></i>
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
