<div class="inner__menu">
    <a href="{{ route('system.users.preview-as-user', ['id' => $user->id ]) }}">
        <div class="im__element @if(Route::is('system.users.preview-as-user', ['id' => $user->id ])) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/user-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/user-solid-white.svg') }}" alt="Fa icon">
            <p>{{ __('Lični podaci') }}</p>
        </div>
    </a>
    <a href="{{ route('system.users.preview-as-user.career', ['id' => $user->id ]) }}">
        <div class="im__element @if(Route::is('system.users.preview-as-user.career', ['id' => $user->id ])) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/book-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/book-solid-white.svg') }}" alt="Fa icon">
            <p>{{ __('Karijera') }}</p>
        </div>
    </a>
    <a href="{{ route('system.users.preview-as-user.club', ['id' => $user->id ]) }}">
        <div class="im__element @if(Route::is('system.users.preview-as-user.club', ['id' => $user->id ])) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/futbol-regular.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/futbol-regular-white.svg') }}" alt="Fa icon">
            <p>{{ __('Klub') }}</p>
        </div>
    </a>
    <a href="{{ route('system.users.preview-as-user.nat-team', ['id' => $user->id ]) }}">
        <div class="im__element @if(Route::is('system.users.preview-as-user.nat-team', ['id' => $user->id ])) active @endif">
            <img class="fa-dark" src="{{ asset('images/icons/flag-solid.svg') }}" alt="Fa icon">
            <img class="fa-white" src="{{ asset('images/icons/flag-solid-white.svg') }}" alt="Fa icon">
            <p>{{ __('Reprezentacija') }}</p>
        </div>
    </a>
</div>
