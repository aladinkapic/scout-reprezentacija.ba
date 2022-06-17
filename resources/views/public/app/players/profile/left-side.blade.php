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
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </p>
    </div>
</div>
