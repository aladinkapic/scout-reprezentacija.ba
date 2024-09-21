<div id="search-console" class="@if(!Auth()->check()) mt-60 @endif">
    <div class="search-wrapper">
        <div class="search-row">
            <div class="top-first">
                <div class="search-icon">
                    <i class="fas fa-search"></i>
                </div>
                <input type="text" name="name_of" id="title_of_product" placeholder="{{ __('Pretraga po imenu') }} .." autocomplete="off">
            </div>
            <div class="other-first">
                <div class="my-select-wrapper product-main-category" id="sportRel.value" custom-id="product_category" value="{{ PlayersHelper::searchData('sportRel.value', 0) }}">
                    <div class="my-select-value">
                        <p id="gradRel.name.paragraph">{{ PlayersHelper::searchData('sportRel.value', __('Odaberite'), true) }}</p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="select-values">
{{--                        <div class="my-option main-option" value="0"> {{ __('Svi sportovi') }} </div>--}}
                        @foreach($sports as $key => $val)
                            <div class="my-option category-option" value="{{$key}}">{{$val}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="other-first other-custon">
                <div class="search-button" title="{{ __('Pretražite igrače') }}">
                    <p>{{ __('PRETRAŽITE') }}</p>
                </div>
                <div class="other-searches-button">
                    <i class="fas fa-th-large"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="just-line"></div>
</div>

<div class="rest-of-search-options">
    <div class="search-wrapper">
        <div class="search-row">
            <div class="other-first">
                <div class="my-select-wrapper" title="" id="birth_year" custom-id="birth_year" value="{{ PlayersHelper::searchData('birth_year', 0) }}">
                    <div class="my-select-value">
                        <p id="svrha-paragraph"> {{ PlayersHelper::searchData('birth_year', __('Godište igrača'), true) }} </p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="select-values">
{{--                        <div class="my-option second-option" value="0"> {{ __('Odaberite') }} </div>--}}

                        @foreach($range as $r)
                            <div class="my-option second-option" value="{{ $r }}"> {{ $r }} </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="other-first">
                <div class="my-select-wrapper" title="" id="strongerLimbRel.value" custom-id="strongerLimb" value="{{ PlayersHelper::searchData('strongerLimbRel.value', 0) }}">
                    <div class="my-select-value">
                        <p id="svrha-paragraph"> {{ PlayersHelper::searchData('strongerLimbRel.value', __('Snažnija noga'), true) }} </p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="select-values">
{{--                        <div class="my-option second-option" value="0"> {{ __('Odaberite') }} </div>--}}
                        @foreach($strongerLimb as $key => $limb)
                            <div class="my-option second-option" value="{{ $key }}"> {{ $limb }} </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="other-first">
                <div class="my-select-wrapper" title="" id="under_contract" custom-id="under_contract" value="{{ PlayersHelper::searchData('under_contract', 0) }}">
                    <div class="my-select-value">
                        <p id="svrha-paragraph"> {{ PlayersHelper::searchData('under_contract', __('Pod ugovorom'), true) }} </p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="select-values">
{{--                        <div class="my-option second-option" value="0"> {{ __('Odaberite') }} </div>--}}
                        <div class="my-option second-option" value="Da"> {{ __('Da') }} </div>
                        <div class="my-option second-option" value="Ne"> {{ __('Ne') }} </div>
                    </div>
                </div>
            </div>
            <div class="other-first">
                <div class="my-select-wrapper" title="" id="genderRel.value" custom-id="genderRel" value="{{ PlayersHelper::searchData('genderRel.value', 0) }}">
                    <div class="my-select-value">
                        <p id="svrha-paragraph"> {{ PlayersHelper::searchData('genderRel.value', __('Spol igrača'), true) }} </p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="select-values">
                        <div class="my-option second-option" value="0"> {{ __('Odaberite') }} </div>
                        @foreach($gender as $key => $gen)
                            <div class="my-option second-option" value="{{ $key }}"> {{ $gen }} </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="search-row">
            <div class="other-first other-first-50">
                <div class="my-select-wrapper" title="" id="lastClub.clubRel.countryRel.name_ba" custom-id="citizenshipRel" value="{{ PlayersHelper::searchData('lastClub.clubRel.countryRel.name_ba', "0") }}">
                    <div class="my-select-value">
                        <p id="svrha-paragraph"> {{ PlayersHelper::searchData('lastClub.clubRel.countryRel.name_ba', __('Država kluba')) }} </p>
                        <div class="select-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <div class="select-values">
{{--                        <div class="my-option second-option" value="0"> {{ __('Odaberite') }} </div>--}}
                        @foreach($countries as $key => $val)
                            <div class="my-option second-option" value="{{ $key }}"> {{ $val }} </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="other-first other-first-50">
                <div class="select-input">
                    <input type="text" name="searchClubTitle" id="searchClubTitle" placeholder="{{ __('Naziv kluba') }}" autocomplete="off">
                </div>
            </div>
        </div>

        <!-- checkable console -->
        @if(isset($positions))
            <div class="check-boxes">
                <div class="check-boxed-header">
                    <h4>{{ __('POZICIJA IGRAČA') }}</h4>
                </div>

                <div class="check-boxed-body">
                    @php $counter = 1 @endphp
                    @foreach($positions as $key => $val)
                        <div class="check-wrapper" id="checkbox-{{ $counter++ }}" value="0" custom_value="{{ $val }}">
                            <div class="check-place"></div>
                            <p>{{ __($val) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
