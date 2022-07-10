<div class="b-new-post">
    <div class="b-np-text-field">
        <div class="b-np-tf-image-wrapper">
            <img class="mp-club-image" src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
        </div>
        <div class="b-np-tf-text">
            <p> {{ __('Šta Vam je na mislima?') }} </p>
        </div>
    </div>
    <div class="b-np-media">
        <div class="b-np-m-element t-3">
            <i class="fas fa-camera-retro"></i>
            <p>{{ __('Nova fotografija') }}</p>
        </div>
    </div>
</div>

@include('system.app.blog.club.new-post-popup')
