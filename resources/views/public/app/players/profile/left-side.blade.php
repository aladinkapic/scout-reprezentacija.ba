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
    <div class="tb-row">
        <h6>{{ __('Društvene mreže') }}</h6>
        <p>
            @if(($player->facebook ?? '') != '')
                <a href="{{ $player->facebook ?? '' }}" target="_blank"><i class="fab fa-facebook"></i></a>
            @endif
            @if(($player->twitter ?? '') != '')
                <a href="{{ $player->twitter ?? '' }}" target="_blank"><i class="fab fa-twitter"></i></a>
            @endif
            @if(($player->instagram ?? '') != '')
                <a href="{{ $player->instagram ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a>
            @endif
        </p>
    </div>

    <div class="tb-row pb-2" title="{{ __('Bazirano na ') }} 189 {{ __('ocjene/a!') }}">
        <h6>{{ __('Ocjena publike') }}</h6>
        <p class="text-muted">
            @php $counter = 0; $mainReview = 9; @endphp
            @for($i=1; $i<=(int)($mainReview) / 2; $i++)
                <i class="fas fa-star yellow-star"></i>
                @php $counter++; @endphp
            @endfor
            <!-- Check if odd or even -->
            @if(($mainReview / 2) != (int)($mainReview / 2))
                <i class="fas fa-star-half-alt yellow-star"></i>
                @php $counter++; @endphp
            @endif
            @for($i=$counter; $i<5; $i++)
                <i class="far fa-star"></i>
            @endfor

            <span class="fs-6 fw-normal">4.6 / 5</span>
        </p>
    </div>
</div>
