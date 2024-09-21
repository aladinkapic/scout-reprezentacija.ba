@include('system.app.users.snippets.crop-image')

<div class="left__menu @if(isset($myProfile)) my_profile @endif @if(Route::is('auth.create-new-profile.career') or Route::is('auth.create-new-profile.club-data') or Route::is('auth.create-new-profile.national-team-data')) m-off @endif">
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
        <h5><b>{{ __('Društvene mreže') }}</b></h5>

        <div class="social_network_wrapper instagram mt-3">
            <a href="{{ route('profile.info') }}">
                <p>{{ __('Facebook') }}</p>
                <i class="fab fa-facebook"></i>
            </a>
        </div>
        <div class="social_network_wrapper facebook">
            <a href="{{ route('profile.info') }}">
                <p>{{ __('Instagram') }}</p>
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="{{ route('profile.info') }}">
                <p>{{ __('Twitter') }}</p>
                <i class="fab fa-twitter"></i>
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="{{ route('profile.info') }}">
                <p>{{ __('YouTube kanal') }}</p>
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        <p class="share-your-links">{{ __('Podijelite Vaše društvene mreže sa ostalim članovima!') }}</p>

        <hr>

        <div class="social_network_wrapper text-center social_network_wrapper__psw" title="{{ __('Pošaljite zahtjev za kreiranje profila') }}">
            <a href="{{ route('profile.change-password') }}" class="center">
                <p class="text-white">{{ __('Izmijenite šifru') }}</p>
            </a>
        </div>
    </div>
</div>
