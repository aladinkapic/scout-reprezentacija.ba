<div class="b-new-post">
    <div class="b-np-text-field">
        <div class="b-np-tf-image-wrapper">
            <img src="@if(Auth()->user()->image != '') {{ asset('images/profile-images/'.Auth()->user()->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
        </div>
        <div class="b-np-tf-text">
            <p> {{ __('Objavi status, fotografiju ili video link na svom zidu') }} </p>
        </div>
    </div>
    <div class="b-np-media">
        <div class="b-np-m-element t-3">
            <i class="fas fa-camera-retro"></i>
            <p>{{ __('Nova fotografija') }}</p>
        </div>
    </div>
</div>

@include('system.app.blog.new-post-popup')
