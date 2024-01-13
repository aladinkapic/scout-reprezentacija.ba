<div class="info-header">
    <div class="ih-element" title="{{ $player->citizenshipRel->name_ba ?? '' }}">
        <p><span> {{ __('Državljanstvo') }} </span></p>
        <p class="nationality">
            <img src="{{ asset('images/country-flags/' . ($player->citizenshipRel->flag ?? '')) }}" alt="">
            {{ $player->citizenshipRel->short_ba ?? '' }}
        </p>
    </div>
    <div class="ih-element">
        <p><span> {{ __('Datum rođenja') }} </span></p>
        <p> {{ $player->birtDate() }} ({{ PlayersHelper::age($player->birth_date) }}) </p>
    </div>
    <div class="ih-element">
        <p><span> {{ __('Visina') }} </span></p>
        <p> {{ $player->height ?? '' }} cm </p>
    </div>
</div>

{{--@if($player->from_api == 1 and $player->player_id != null)--}}
{{--    <!-- Special players -->--}}

{{--    <div class="statistics-wrapper">--}}
{{--        @php $counter = 0; @endphp--}}
{{--        @foreach($player->statisticsRel as $data)--}}
{{--            <div class="sw-data @if($counter != 0) sw-data-hidden @endif">--}}
{{--                <div class="line"></div>--}}
{{--                <div class="sw-data-row">--}}
{{--                    <div class="sw-dr-icon-wrapper">--}}
{{--                        @if($counter ++ == 0)--}}
{{--                            <i class="fas fa-minus"></i>--}}
{{--                        @else--}}
{{--                            <i class="fas fa-plus"></i>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <p> {{ $data->season ?? '' }}--}}
{{--                        <span>--}}
{{--                        <a href="#" class="text-info text-decoration-none">--}}
{{--                            {{ $data->team_name ?? '' }}--}}
{{--                        </a>--}}
{{--                    </span>--}}
{{--                    </p>--}}
{{--                </div>--}}

{{--                <div class="sw-data-body">--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/arrow-up-1-9-solid.svg')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj utakmica') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->no_games ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/goal.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj golova') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->goals ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/network.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj asistencija') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->assistance ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/time-left.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj minuta') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->minutes ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/yellow-card.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj crvenih kartona') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->red_cards ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sw-db-row">--}}
{{--                        <div class="sw-dbr-img">--}}
{{--                            <img src="{{asset('images/icons/yellow-card.png')}}" alt="">--}}
{{--                        </div>--}}
{{--                        <h5> {{ __('Broj žutih kartona') }} </h5>--}}
{{--                        <div class="sw-dbr-total">--}}
{{--                            <p> {{ $data->yellow_cards ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@else--}}

{{--@endif--}}


<!-- Clubs info -->
<h4 class="mt-3"> {{ __('Klupska karijera') }} </h4>
<div class="statistics-wrapper">
    @php $counter = 0; @endphp
    @foreach($player->clubDataRel as $clubData)
        @if($clubData->club_id)
            <div class="sw-data @if($counter != 0) sw-data-hidden @endif">
                <div class="line"></div>
                <div class="sw-data-row" title="{{ $clubData->season_name ?? '' }}">
                    <div class="sw-dr-icon-wrapper">
                        @if($counter ++ == 0)
                            <i class="fas fa-minus"></i>
                        @else
                            <i class="fas fa-plus"></i>
                        @endif
                    </div>
                    <p>
                        {{ $clubData->season ?? '' }}
                        <span>
                            <a href="{{ route('home.clubs.preview', ['id' => $clubData->clubRel->id ?? '']) }}" class="text-info text-decoration-none">
                                {{ $clubData->clubRel->title ?? '' }}
                            </a>
                        </span>
                    </p>
                </div>

                <div class="sw-data-body">
                    <div class="sw-db-row">
                        <p> {{ $clubData->season_name ?? '' }} </p>
                    </div>

                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/goal.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj golova') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->goals ?? '' }} </p>
                        </div>
                    </div>
                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/network.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj asistencija') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->assistance ?? '' }} </p>
                        </div>
                    </div>
                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/time-left.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj minuta') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->minutes ?? '' }} </p>
                        </div>
                    </div>
                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/yellow-card.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj crvenih kartona') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->red_cards ?? '' }} </p>
                        </div>
                    </div>
                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/yellow-card.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj žutih kartona') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->yellow_cards ?? '' }} </p>
                        </div>
                    </div>
                    <div class="sw-db-row">
                        <div class="sw-dbr-img">
                            <img src="{{asset('images/icons/goal.png')}}" alt="">
                        </div>
                        <h5> {{ __('Broj odbrana') }} </h5>
                        <div class="sw-dbr-total">
                            <p> {{ $clubData->without_goal ?? '' }} </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

<!-- National team -->
<h4 class="mt-3"> {{ __('Nastupi za reprezentaciju') }} </h4>

<div class="statistics-wrapper">
    @php $counter = 0; @endphp
    @foreach($player->natTeamDataRel as $natTeamData)
        <div class="sw-data @if($counter != 0) sw-data-hidden @endif">
            <div class="line"></div>
            <div class="sw-data-row">
                <div class="sw-dr-icon-wrapper">
                    @if($counter ++ == 0)
                        <i class="fas fa-minus"></i>
                    @else
                        <i class="fas fa-plus"></i>
                    @endif
                </div>
                <p> {{ $natTeamData->season ?? '' }}
                    <span class="text-info">
                        {{ ucwords(strtolower($natTeamData->countryRel->name_ba ?? '')) ?? '' }}
                    </span>
                </p>
            </div>

            <div class="sw-data-body">
                <div class="sw-db-row">
                    <p> {{ $natTeamData->season_name ?? '' }} </p>
                </div>

                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/goal.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj golova') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->goals ?? '' }} </p>
                    </div>
                </div>
                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/network.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj asistencija') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->assistance ?? '' }} </p>
                    </div>
                </div>
                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/time-left.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj minuta') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->minutes ?? '' }} </p>
                    </div>
                </div>
                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/yellow-card.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj crvenih kartona') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->red_cards ?? '' }} </p>
                    </div>
                </div>
                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/yellow-card.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj žutih kartona') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->yellow_cards ?? '' }} </p>
                    </div>
                </div>
                <div class="sw-db-row">
                    <div class="sw-dbr-img">
                        <img src="{{asset('images/icons/goal.png')}}" alt="">
                    </div>
                    <h5> {{ __('Broj odbrana') }} </h5>
                    <div class="sw-dbr-total">
                        <p> {{ $natTeamData->without_goal ?? '' }} </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
