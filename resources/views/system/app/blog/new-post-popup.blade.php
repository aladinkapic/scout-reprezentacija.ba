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
                    <img src="@if($loggedUser->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
                <div class="b-np-bph-name-field">
                    <p> {{ $loggedUser->name ?? '' }} </p>
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

{{--                    <iframe src="https://www.youtube.com/embed/JwfjVT27ELM" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>--}}
                </div>
            </div>

            <div class="b-np-pb-add-to-post">
                <p> {{ __('Dodajte na objavu ..') }} </p>
                <div class="b-np-pb-add-to-post-icon-wrapper">
{{--                    <i class="fab fa-youtube" title="{{ __('Nova fotografija') }}"></i>--}}
                    <i class="fas fa-camera-retro new-photo-trigger" title="{{ __('Nova fotografija') }}"></i>
                </div>
            </div>
            <div class="b-np-pb-post b-np-pb-post-greyed">
                <p> {{ __('Objavite') }} </p>
            </div>
        </div>
    </div>
</div>
