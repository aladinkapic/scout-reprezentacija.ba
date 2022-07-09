<div class="info-header">
    <div class="ih-element">
        <p><span> {{ __('Nacionalnost') }} </span></p>
        <p> {{ ucwords(strtolower($player->citizenshipRel->title ?? '')) ?? '' }} </p>
    </div>
    <div class="ih-element">
        <p><span> {{ __('Datum rođenja') }} </span></p>
        <p> {{ $player->birtDate() }} </p>
    </div>
    <div class="ih-element">
        <p><span> {{ __('Visina') }} </span></p>
        <p> {{ $player->height ?? '' }} cm </p>
    </div>
</div>

<!-- Clubs info -->
<h4 class="mt-3"> {{ __('Informacije o klubovima') }} </h4>
<div class="info-table-header mt-1">
    <div class="td season"> {{ __('Sezona') }} </div>
    <div class="td club"> {{ __('Klub') }} </div>
    <div class="td asist"> {{ __('Asistencija') }} </div>
    <div class="td goals"> {{ __('Golova') }} </div>
    <div class="td more"> {{ __('Više') }} </div>
</div>

@foreach($player->clubDataRel as $clubData)
    <div class="info-t-r-wrapper">
        <div class="info-table-header info-table-row info-table-first-row">
            <div class="td season"> {{ $clubData->season ?? '' }} </div>
            <div class="td club">
                <a href="{{ route('home.clubs.preview', ['id' => $clubData->clubRel->id ?? '']) }}" class="text-info text-decoration-none">
                    {{ $clubData->clubRel->title ?? '' }}
                </a>
            </div>
            <div class="td asist"> {{ $clubData->assistance ?? '' }} </div>
            <div class="td goals"> {{ $clubData->goals ?? '' }} </div>
            <div class="td more preview-more-info"> <i class="fas fa-chevron-down"></i> </div>
        </div>
        <div class="more-info">
            <div class="mi-row d-hidden">
                <div class="text"><p>{{ __('Asistencija') }}</p></div>
                <div class="value"><p>{{ $clubData->assistance ?? '' }}</p></div>
            </div>
            <div class="mi-row d-hidden">
                <div class="text"><p>{{ __('Golova') }}</p></div>
                <div class="value"><p>{{ $clubData->goals ?? '' }}</p></div>
            </div>

            <div class="mi-row">
                <div class="text"><p>{{ __('Broj minuta') }}</p></div>
                <div class="value"><p>{{ $clubData->minutes ?? '' }}</p></div>
            </div>
            <div class="mi-row">
                <div class="text"><p>{{ __('Broj crvenih kartona') }}</p></div>
                <div class="value"><p>{{ $clubData->red_cards ?? '' }}</p></div>
            </div>
            <div class="mi-row">
                <div class="text"><p>{{ __('Broj žutih kartona') }}</p></div>
                <div class="value"><p>{{ $clubData->yellow_cards ?? '' }}</p></div>
            </div>
        </div>
    </div>
@endforeach



<!-- National team -->
<h4 class="mt-3"> {{ __('Nastupi za reprezentaciju') }} </h4>

<div class="info-table-header mt-1">
    <div class="td season"> {{ __('Sezona') }} </div>
    <div class="td club"> {{ __('Država') }} </div>
    <div class="td asist"> {{ __('Asistencija') }} </div>
    <div class="td goals"> {{ __('Golova') }} </div>
    <div class="td more"> {{ __('Više') }} </div>
</div>
@foreach($player->natTeamDataRel as $natTeamData)
    <div class="info-t-r-wrapper">
        <div class="info-table-header info-table-row info-table-first-row">
            <div class="td season"> {{ $natTeamData->season ?? '' }} </div>
            <div class="td club"> {{ ucwords(strtolower($natTeamData->countryRel->title ?? '')) ?? '' }}  </div>
            <div class="td asist"> {{ $natTeamData->assistance ?? '' }} </div>
            <div class="td goals"> {{ $natTeamData->goals ?? '' }} </div>
            <div class="td more preview-more-info"> <i class="fas fa-chevron-down"></i> </div>
        </div>
        <div class="more-info">
            <div class="mi-row d-hidden">
                <div class="text"><p>{{ __('Asistencija') }}</p></div>
                <div class="value"><p>{{ $natTeamData->assistance ?? '' }}</p></div>
            </div>
            <div class="mi-row d-hidden">
                <div class="text"><p>{{ __('Golova') }}</p></div>
                <div class="value"><p>{{ $natTeamData->goals ?? '' }}</p></div>
            </div>

            <div class="mi-row">
                <div class="text"><p>{{ __('Broj minuta') }}</p></div>
                <div class="value"><p>{{ $natTeamData->minutes ?? '' }}</p></div>
            </div>
            <div class="mi-row">
                <div class="text"><p>{{ __('Broj crvenih kartona') }}</p></div>
                <div class="value"><p>{{ $natTeamData->red_cards ?? '' }}</p></div>
            </div>
            <div class="mi-row">
                <div class="text"><p>{{ __('Broj žutih kartona') }}</p></div>
                <div class="value"><p>{{ $natTeamData->yellow_cards ?? '' }}</p></div>
            </div>
        </div>
    </div>
@endforeach
