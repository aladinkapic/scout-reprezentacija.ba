<div class="pw-left pw-left-body">
    <div class="tb-row">
        @if($player->sport != 3)
            <div class="tb-row-col-flex">
                <p class="key"><span>{{ __('Sport') }}</span></p>
                <p class="value"> {{ $player->sportRel->value ?? '' }} </p>
            </div>
        @endif

        @if(isset($player->lastClub->clubRel) and ($player->under_contract == 'Da' or ($player->from_api == 1 and $player->player_id != null)))

            <div class="tb-row-col-flex tb-row-col-flex-mobile-none">
                <p class="key"><span>{{ __('Broj dresa') }}</span></p>
                <p class="value"> {{ $player->lastClub->shirt_number ?? '' }} </p>
            </div>

        @endif

        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Snažnija noga') }}</span></p>
            <p class="value"> {{ $player->strongerLimbRel->value ?? '' }} </p>
        </div>
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Pozicija') }}</span></p>
            <p class="value"> {{ $player->positionRel->value ?? '' }} </p>
        </div>
        @if($player->position_2)
            <div class="tb-row-col-flex">
                <p class="key"><span>{{ __('Druga pozicija') }}</span></p>
                <p class="value"> {{ $player->secondPositionRel->value ?? '' }} </p>
            </div>
        @endif
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Državljanstvo') }}</span></p>
            <p class="value value-img">
                <span>{{ $player->citizenshipRel->short_ba ?? '' }}</span>
                <img src="{{ asset('images/country-flags/' . ($player->citizenshipRel->flag ?? '')) }}" alt="">
            </p>
        </div>
        @if($player->citizenship_2)
            <div class="tb-row-col-flex">
                <p class="key"><span>{{ __('Drugo državljanstvo') }}</span></p>
                <p class="value value-img">
                    <span>{{ $player->secondCitizenshipRel->short_ba ?? '' }}</span>
                    <img src="{{ asset('images/country-flags/' . ($player->secondCitizenshipRel->flag ?? '')) }}" alt="">
                </p>
            </div>
        @endif
        <div class="tb-row-col-flex">
            <p class="key"><span>{{ __('Visina') }}</span></p>
            <p class="value"> {{ $player->height ?? '' }} {{ __('cm') }} </p>
        </div>
        <div class="tb-row-col-flex" title="{{ __('Starost') }} {{ PlayersHelper::age($player->birth_date) }} {{ __('godina') }}">
            <p class="key"><span>{{ __('Datum rođenja') }}</span></p>
            <p class="value"> {{ $player->birtDate() ?? '' }} </p>
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
    @endif

    @if(($player->facebook ?? '') != '' or ($player->twitter ?? '') != '' or ($player->youtube ?? '') != '' or ($player->instagram ?? '') != '')
        <div class="tb-row">
            <h6><b>{{ __('Društvene mreže') }}</b></h6>
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

    <div class="custom-buttons">
        <div class="button">
            <a href="{{ route('auth.create-profile') }}" title="{{ __('Kreirajte Vaš profil na scout.reprezentacija.ba!') }}">
                <small> {{ __('Kreirajte svoj profil') }} </small>
            </a>
        </div>
    </div>

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

    @if($player->note)
        <div class="tb-row about-me" title="{{ __('Kratka biografija') }}">
            <h5>{{ __('O meni') }}</h5>
            {!! nl2br($player->note ?? '') !!}
        </div>
    @endif
</div>
