@if(count($apiData))
    <div class="public-container public-container-margin-zero">
        <div class="container-r-header">
            <div class="crh-line"></div>
            <h2> {{__('POSLJEDNJE NOVOSTI')}} </h2>
        </div>

        <div class="m-container m-container-f h-latest-news">
            <!-- Img should be 450x300px -->
            @for($i=0; $i<3; $i++)
                <div class="h-ln-preview t-3">
                    <div class="h-lnp-img-part">
                        <img src="{{ $apiData[$i]->image_url ?? '' }}" alt="">
                        <div class="h-lnp-published t-3" title="">
                            <span class="s-digit t-3"> {{ NewsHelper::getDay($apiData[$i]->date) }} </span>
                            <div class="h-lnp-p-line t-3"></div>
                            <span class="s-text t-3"> {{ NewsHelper::getMonth($apiData[$i]->date) }} </span>
                        </div>
                    </div>
                    <div class="h-lnp-rest">
                        <h5> <b>{{ __('Novosti') }}</b> </h5>
                        <h3> {{ $apiData[$i]->title->rendered }} </h3>
                        <p> {!! nl2br(NewsHelper::getFirstNLetters($apiData[$i]->content->rendered ?? '')) !!} ..</p>
                        <a href="{{ $apiData[$i]->link }}">
                            <p>
                                {{ __('Više informacija') }}
                                <i class="fas fa-chevron-right"></i>
                            </p>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endif
