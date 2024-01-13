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
                            @foreach($user->clubDataRel as $clubData)
                                <a href="{{ route('system.additional.club-data.preview', ['id' => $clubData->id ?? '']) }}" title="{{ __('Uredite informacije za ') . ($clubData->clubRel->title ?? '') }}">
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
                            @foreach($user->natTeamDataRel as $natTeamData)
                                <a href="{{ route('system.additional.nat-team-data.preview', ['id' => $natTeamData->id ?? '']) }}" title="{{ __('Uredite informacije za ') . ($natTeamData->countryRel->title ?? '') }}">
                                    <p class="m-0"> <small> {{ $natTeamData->season }} - <b> {{ ucwords(strtolower($natTeamData->countryRel->name_ba)) ?? '' }} </b> </small> </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('system.users.edit-my-profile') }}">
                                <div class="btn btn-sm btn-info w-100 text-white">
                                    <b> {{ __('Uredite Vaše informacije') }} </b>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
