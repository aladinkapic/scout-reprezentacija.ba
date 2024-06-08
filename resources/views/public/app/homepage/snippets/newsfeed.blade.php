{{--<div class="container news">--}}
{{--    <div class="row gy-3">--}}
{{--        <div class="col-6">--}}
{{--            <div class="card mx-auto">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="card-image news-image" style="background-image: url('https://media.reprezentacija.ba/2022/06/finska-bih-10-1500x1000.jpg');"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="news-title">--}}
{{--                                BiH – Rumunija na 25 kanala: U BiH gledamo na BHT1 i MOJA TV--}}
{{--                            </h6>--}}
{{--        --}}
{{--                            <p class="news-desc">--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure, tempora officia architecto maiores assumenda labore expedita eveniet minus eum fugit accusamus rerum recusandae ex eligendi. Quaerat cum nam sapiente.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6">--}}
{{--            <div class="card mx-auto">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="card-image news-image" style="background-image: url('https://media.reprezentacija.ba/2022/06/finska-bih-10-1500x1000.jpg');"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="news-title">--}}
{{--                                BiH – Rumunija na 25 kanala: U BiH gledamo na BHT1 i MOJA TV--}}
{{--                            </h6>--}}
{{--        --}}
{{--                            <p class="news-desc">--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure, tempora officia architecto maiores assumenda labore expedita eveniet minus eum fugit accusamus rerum recusandae ex eligendi. Quaerat cum nam sapiente.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6">--}}
{{--            <div class="card mx-auto">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="card-image news-image" style="background-image: url('https://media.reprezentacija.ba/2022/06/finska-bih-10-1500x1000.jpg');"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="news-title">--}}
{{--                                BiH – Rumunija na 25 kanala: U BiH gledamo na BHT1 i MOJA TV--}}
{{--                            </h6>--}}
{{--        --}}
{{--                            <p class="news-desc">--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure, tempora officia architecto maiores assumenda labore expedita eveniet minus eum fugit accusamus rerum recusandae ex eligendi. Quaerat cum nam sapiente.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-6">--}}
{{--            <div class="card mx-auto">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col-md-5">--}}
{{--                        <div class="card-image news-image" style="background-image: url('https://media.reprezentacija.ba/2022/06/finska-bih-10-1500x1000.jpg');"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-7">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="news-title">--}}
{{--                                BiH – Rumunija na 25 kanala: U BiH gledamo na BHT1 i MOJA TV--}}
{{--                            </h6>--}}
{{--        --}}
{{--                            <p class="news-desc">--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iure, tempora officia architecto maiores assumenda labore expedita eveniet minus eum fugit accusamus rerum recusandae ex eligendi. Quaerat cum nam sapiente.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
                        <img src="{{ $apiData[$i]->image_url }}" alt="">
                        <div class="h-lnp-published t-3" title="Objavljeno 17. Marta 2021 godine">
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

        <!--
    <div class="h-ln-preview t-3">
        <div class="h-lnp-img-part">
            <img src="{{asset('images/latest-news/2.png')}}" alt="">
            <div class="h-lnp-published t-3" title="Objavljeno 29. Oktobra 2020 godine">
                <span class="s-digit t-3">29</span>
                <div class="h-lnp-p-line t-3"></div>
                <span class="s-text t-3">OCT</span>
            </div>
        </div>
        <div class="h-lnp-rest">
            <h5>KITCHEN DECORATION</h5>
            <h3>MAKE YOUR KITCHEN BRIGHT</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ..
            </p>
            <a href="">
                <p>Više informacija</p>
            </a>
        </div>
    </div>
    <div class="h-ln-preview t-3">
        <div class="h-lnp-img-part">
            <img src="{{asset('images/latest-news/3.png')}}" alt="">
            <div class="h-lnp-published t-3" title="Objavljeno 11. JANUARA 2020 godine">
                <span class="s-digit t-3">11</span>
                <div class="h-lnp-p-line t-3"></div>
                <span class="s-text t-3">JAN</span>
            </div>
        </div>
        <div class="h-lnp-rest">
            <h5>LIVING ROOM</h5>
            <h3>LOOK AT MODERN APARTMENTS</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled ..
            </p>
            <a href="">
                <p>Više informacija</p>
            </a>
        </div>
    </div> -->
    </div>
@endif
