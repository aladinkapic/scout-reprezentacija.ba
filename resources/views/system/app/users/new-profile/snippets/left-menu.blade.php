@include('system.app.users.snippets.crop-image')

<div class="profile__wrapper_left @if(isset($myProfile)) my_profile @endif @if(Route::is('auth.create-new-profile.career') or Route::is('auth.create-new-profile.club-data') or Route::is('auth.create-new-profile.national-team-data')) m-off @endif">
    <div class="p__w_l_img_w">
        <form action="#" method="POST" id="update-profile-image" enctype="multipart/form-data">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="@if(Auth()->check() and $user->image != '') {{ asset('images/profile-images/'. $user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
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
                @if(Auth()->check() and $user->image) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="#">
                <p>{{ __('Karijera') }}</p>
                @if(Auth()->check() and $user->stronger_limb) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Klub') }}</p>
                @if(Auth()->check() and $user->clubDataRel->count()) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Reprezentacija') }}</p>
                @if(Auth()->check() and $user->natTeamDataRel->count()) <img class="fa-check" src="{{ asset('images/icons/check-solid.svg') }}" alt="Fa check"> @else <img class="fa-ban" src="{{ asset('images/icons/ban-solid.svg') }}" alt="Fa check"> @endif
            </a>
        </div>
    </div>
</div>
