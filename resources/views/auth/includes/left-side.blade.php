<div class="profile__wrapper_left @if(isset($myProfile)) my_profile @endif">
    <div class="p__w_l_img_w">
        <form action="#" method="POST" id="update-profile-image" enctype="multipart/form-data">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="@if(isset($loggedUser) and $loggedUser->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">

            <label for="photo_uri" class="edit-your-photo">
                <i class="fas fa-edit"></i>
                <p>{{ __('Uredite') }}</p>
            </label>
            <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
        </form>
    </div>

    <div class="p__w_l_links_w">
        <h5>{{ __('Društvene mreže') }}</h5>

        <div class="social_network_wrapper instagram mt-3">
            <a href="#">
                <p>{{ __('Facebook') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper facebook">
            <a href="#">
                <p>{{ __('Instagram') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper twitter">
            <a href="#">
                <p>{{ __('Twitter') }}</p>
            </a>
        </div>
        <div class="social_network_wrapper linkedin">
            <a href="#">
                <p>{{ __('YouTube') }}</p>
            </a>
        </div>

        <p class="share-your-links">{{ __('Podijelite Vaše društvene mreže sa ostalim članovima!') }}</p>

        <hr>

        <div class="social_network_wrapper bg-dark text-center" title="{{ __('Pošaljite zahtjev za kreiranje profila') }}">
            <a href="#">
                <p class="text-white">{{ __('Pošaljite zahtjev') }}</p>
            </a>
        </div>
    </div>
</div>
