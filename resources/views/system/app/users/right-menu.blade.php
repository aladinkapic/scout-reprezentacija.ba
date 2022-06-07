<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">

            <div class="card" title=" {{ __('Osnovne informacije') }} ">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <h6 class="pt-1"> {{ __('Klubovi') }} </h6>
                            <a href="{{ route('system.additional.club-data.create') }}" title=" {{ __('Unesite informacije o klubovima') }} ">
                                <small><i class="fas fa-plus"></i></small>
                            </a>
                        </div>
                        <div class="col-md-12">
                            @foreach($loggedUser->clubDataRel as $clubData)
                                <a href="{{ route('system.additional.club-data.preview', ['id' => $clubData->id ?? '']) }}">
                                    <p class="m-0"> <small> {{ $clubData->season }} - <b> {{ $clubData->clubRel->title ?? '' }} </b> </small> </p>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <h6 class="pt-1"> {{ __('Reprezentacija') }} </h6>
                            <a href="{{ route('system.additional.nat-team-data.create') }}" title=" {{ __('Unesite informacije o nastupima za reprezentaciju') }} ">
                                <small><i class="fas fa-plus"></i></small>
                            </a>
                        </div>
                        <div class="col-md-12">
                            @foreach($loggedUser->natTeamDataRel as $natTeamData)
                                <a href="{{ route('system.additional.nat-team-data.preview', ['id' => $natTeamData->id ?? '']) }}">
                                    <p class="m-0"> <small> {{ $natTeamData->season }} - <b> {{ ucwords(strtolower($natTeamData->countryRel->title)) ?? '' }} </b> </small> </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <h6 class="pt-1"> {{ __('Ostale informacije') }} </h6>
                        </div>
                    </div>
                    <div class="row" title="{{ __('Ukupan radni staž') }}">
                        <div class="col-md 12 d-flex justify-content-start mt-2">
                            <i class="fab fa-buromobelexperte pt-1"></i>
                            <p class="m-0 ml-3"> <small> 12 </small> </p>
                        </div>
                    </div>
                    <div class="row" title="{{__('Starost zaposlenika')}}">
                        <div class="col-md 12 d-flex justify-content-start mt-2">
                            <i class="fas fa-user-clock pt-1"></i>
                            <p class="m-0 ml-3"> <small>44 </small> </p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
