<div class="pw-left pw-left-body">
    <div class="tb-row">
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Sport') }}</span></p>
            <p class="value"> {{ $player->sportRel->value ?? '' }} </p>
        </div>
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Jača noga') }}</span></p>
            <p class="value"> {{ $player->strongerLimbRel->value ?? '' }} </p>
        </div>
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Pozicija') }}</span></p>
            <p class="value"> {{ $player->positionRel->value ?? '' }} </p>
        </div>
    </div>

    @if($what == 'timeline')
        <div class="tb-row img-thumb-wrapper">
            @foreach($player->blogPosts as $post)
                @if(isset($post->image) and $post->image != '')
                    <div class="img-thumb" post-id="{{ $post->id }}">
                        <img src="{{ asset('images/blog/' . $post->image ?? '') }}" alt="">
                    </div>
                @endif
            @endforeach
        </div>

        <div class="tb-row">
            <h6>{{ __('Društvene mreže') }}</h6>
            <p>
                @if(($player->facebook ?? '') != '')
                    <a href="{{ $player->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook"></i></a>
                @endif
                @if(($player->twitter ?? '') != '')
                    <a href="{{ $player->twitter ?? '' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                @endif
                @if(($player->youtube ?? '') != '')
                    <a href="{{ $player->youtube ?? '' }}" target="_blank"><i class="fab fa-youtube"></i></a>
                @endif
                @if(($player->instagram ?? '') != '')
                    <a href="{{ $player->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
            </p>
        </div>
    @endif

    @if($player->allow_rating == 1 and $what == 'info')
        <div class="tb-row pb-2 player-reviewed-wrapper" title="{{ __('Bazirano na ') }} {{ $player->rateRelCount() }} {{ __('ocjene/a!') }}">
            <h6>{{ __('Ocijenite igrača') }}</h6>
            <p class="text-muted player-reviewed">
                @php $counter = 0; $mainCounter = 0;  @endphp
                @for($i=1; $i<=(int)($mainReview) / 2; $i++)
                    <i class="fas fa-star yellow-star star-trigger" star-index="{{ $mainCounter += 2 }}" player-id="{{ $player->id }}"></i>
                    @php $counter++; @endphp
                @endfor
            <!-- Check if odd or even -->
                @if(($mainReview / 2) != (int)($mainReview / 2))
                    <i class="fas fa-star-half-alt yellow-star star-trigger" star-index="{{ $mainCounter += 2 }}" player-id="{{ $player->id }}"></i>
                    @php $counter++; @endphp
                @endif
                @for($i=$counter; $i<5; $i++)
                    <i class="far fa-star star-trigger" star-index="{{ $mainCounter += 2 }}" player-id="{{ $player->id }}"></i>
                @endfor

                <span class="fs-6 fw-normal">{{ $mainReview / 2 }} / 5</span>
            </p>
        </div>
    @endif
</div>
