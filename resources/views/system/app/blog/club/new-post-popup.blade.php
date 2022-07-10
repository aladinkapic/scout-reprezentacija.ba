<div class="b-new-post-popup-wrapper">
    <div class="b-np-popup">
        <div class="b-np-p-header">
            <h4>{{ __('Nova objava') }}</h4>
            <div class="b-np-ph-exit">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="b-np-p-body">
            <div class="b-np-pb-header">
                <div class="b-np-bph-img-wrapper">
                    <img class="mp-club-image" src="@if($club->image != '') {{ asset('images/club-images/'.$club->image) }} @else {{ asset('images/club-images/blank.jpg') }} @endif " alt="">
                </div>
                <div class="b-np-bph-name-field">
                    <p> {{ $club->title ?? '' }} </p>
                    <span> {{ __('Podijelite informacije sa Vašim prijateljima ..') }} </span>
                </div>
            </div>
            <div class="b-np-pb-text">
                {!! Form::textarea('post', '', ['class' => 'post-text', 'id' => 'post-text', 'placeholder' => __('Šta Vam je na mislima?')]) !!}
                <!-- Image preview -->
                <div class="b-np-bp-image-preview t-3 d-none">
                    <div class="close-image"> <i class="fas fa-times"></i> </div>
                    <label class="ip-add-image" for="post-image">
                        <div class="ip-ai-img-icon">
                            <i class="fas fa-camera-retro" title="{{ __('Nova fotografija') }}"></i>
                        </div>
                        <p>Nova fotografija</p>
                        <span>Odaberite ovdje ..</span>
                    </label>
                    <img src="#" alt="" class="post-image-preview d-none">
                    {!! Form::file('image', ['class' => 'post-image', 'id' => 'post-image']) !!}
                </div>
                <div class="youtube-preview d-none">
                    <iframe src="" id="youtube-link-preview" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <div class="close-iframe"> <i class="fas fa-times"></i> </div>
                    {!! Form::hidden('youtubeLink', '', ['class' => 'youtubeLink', 'id' => 'youtubeLink']) !!}
                </div>
            </div>

            <div class="b-np-pb-add-to-post">
                <p> {{ __('Dodajte na objavu ..') }} </p>
                <div class="b-np-pb-add-to-post-icon-wrapper">
                    <i class="fas fa-camera-retro new-photo-trigger" title="{{ __('Nova fotografija') }}"></i>
                </div>
            </div>
            <button class="b-np-pb-post b-np-pb-post-greyed"> {{ __('Objavite') }} </button>
        </div>
    </div>
</div>
