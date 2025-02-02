@include('system.app.users.snippets.crop-image')

<div class="profile__wrapper_left @if(isset($myProfile)) my_profile @endif @if(Route::is('auth.create-new-profile.career') or Route::is('auth.create-new-profile.club-data') or Route::is('auth.create-new-profile.national-team-data')) m-off @endif">
    <div class="p__w_l_img_w">
        <form action="#" method="POST" id="update-profile-image" enctype="multipart/form-data">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="@if(Auth()->check() and Auth()->user()->image != '') {{ asset('images/profile-images/'. Auth()->user()->image) }} @else {{ asset('images/user.png') }} @endif " alt="">

            @if(Auth()->check())
                <label for="profile-image" class="edit-your-photo">
                    <i class="fas fa-edit"></i>
                    <p>{{ __('Uredite') }}</p>
                </label>
                <input name="profile-image" class="d-none image" id="profile-image" type="file">
            @endif
        </form>
    </div>

    <div class="p__w_l_links_w">
        <h5>{{ __('Pregled profila') }}</h5>

        <div class="social_network_wrapper instagram mt-3">
            <a href="#">
                <p>{{ __('Lični podaci') }}</p>
                @if(Auth()->check()) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper facebook">
            <a href="#">
                <p>{{ __('Proflna slika') }}</p>
                @if(Auth()->check() and Auth()->user()->image) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="#">
                <p>{{ __('Karijera') }}</p>
                @if(Auth()->check() and Auth()->user()->stronger_limb) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Klub') }}</p>
                @if(Auth()->check() and Auth()->user()->clubDataRel->count()) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Reprezentacija') }}</p>
                @if(Auth()->check() and Auth()->user()->natTeamDataRel->count()) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>

{{--        <p class="share-your-links">{{ __('Status Vaše prijave na www.scout.reprezentacija.ba!') }}</p>--}}

        <hr>

        @if(Auth()->check())
            <div class="social_network_wrapper bg-dark text-center" title="{{ __('Pošaljite zahtjev za kreiranje profila') }}">
                <a href="{{ route('auth.logout') }}" class="center">
                    <p class="text-white">{{ __('Odjavite se') }}</p>
                </a>
            </div>
        @else
            <div class="social_network_wrapper bg-dark text-center" title="{{ __('Pošaljite zahtjev za kreiranje profila') }}">
                <a href="mailto:press@reprezentacija.ba" class="center">
                    <p class="text-white">{{ __('press@reprezentacija.ba') }}</p>
                </a>
            </div>
        @endif
    </div>
</div>
