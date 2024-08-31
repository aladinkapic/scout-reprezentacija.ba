@include('system.app.users.snippets.crop-image')

<div class="profile__wrapper_left @if(isset($myProfile)) my_profile @endif">
    <div class="p__w_l_img_w">
        <form action="#" method="POST" id="update-profile-image" enctype="multipart/form-data">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="@if(Auth()->check() and Auth()->user()->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">

            <label for="profile-image" class="edit-your-photo">
                <i class="fas fa-edit"></i>
                <p>{{ __('Uredite') }}</p>
            </label>
            <input name="name" class="d-none image" id="profile-image" type="file">
        </form>
    </div>

    <div class="p__w_l_links_w">
        <h5>{{ __('Pregled profila') }}</h5>

        <div class="social_network_wrapper instagram mt-3">
            <a href="#">
                <p>{{ __('Lični podaci') }}</p>
                @if(Auth()->check()) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
            </a>
        </div>
        <div class="social_network_wrapper facebook">
            <a href="#">
                <p>{{ __('Proflna slika') }}</p>
                @if(Auth()->check() and Auth()->user()->image) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="#">
                <p>{{ __('Karijera') }}</p>
                @if(Auth()->check() and Auth()->user()->stronger_limb) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Klub') }}</p>
                @if(Auth()->check() and Auth()->user()->clubDataRel->count()) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('Reprezentacija') }}</p>
                @if(Auth()->check() and Auth()->user()->natTeamDataRel->count()) <i class="fas fa-check"></i> @else <i class="fas fa-ban"></i> @endif
            </a>
        </div>

        <p class="share-your-links">{{ __('Status Vaše prijave na www.scout.reprezentacija.ba!') }}</p>

        <hr>

        <div class="social_network_wrapper bg-dark text-center" title="{{ __('Pošaljite zahtjev za kreiranje profila') }}">
            <a href="mailto:press@reprezentacija.ba" class="center">
                <p class="text-white">{{ __('press@reprezentacija.ba') }}</p>
            </a>
        </div>
    </div>
</div>
