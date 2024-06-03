<div class="s-left-menu t-3">
    <!-- user Info -->
    <div class="user-info">
        <div class="user-image">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="@if($loggedUser->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">

            <label for="profile-image" title="{{ __('Promijenite sliku profila') }}"> <div class="hover-effect"></div> </label>
            <input type="file" name="image" class="image d-none" id="profile-image">
        </div>
        <div class="user-desc">
            <h4> {{ $loggedUser->name ?? '' }} </h4>
            <p> {{ $loggedUser->living_place ?? '' }} </p>
            <p>
                <i class="fas fa-circle"></i>
                {{ __('Starost') }}: {{ $loggedUser->yearsOld() }} {{ __('godina') }}
            </p>
        </div>
    </div>
    <hr>

    <!-- Menu subsection -->
    <div class="s-lm-subsection">

        <!-- Users -->
        @if($loggedUser->role == 0)
            <div class="subtitle">
                <h4> {{__('Osnovne funkcionalnosti')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-home"></i>
                </div>
            </div>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="far fa-user"></i>
                        </div>
                        <p>{{__('Korisnici')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.users.index')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled svih korisnika')}}</p>
                            </div>
                        </a>
                        <a href="{{route('system.users.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Unos novog')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-users"></i>
                        </div>
                        <p>{{__('Citati korisnika')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.additional.quote.index')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled svih citata')}}</p>
                            </div>
                        </a>
                        <a href="{{route('system.additional.quote.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Unos novog')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        @else
            <div class="subtitle">
                <h4> {{__('Uredi svoj profil')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-home"></i>
                </div>
            </div>

            <a href="{{route('system.users.profile')}}" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="far fa-user"></i>
                        </div>
                        <p>{{__('Uredi svoj profil')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-edit"></i></div>
                        </div>
                    </div>
                </div>
            </a>

            @if($loggedUser->clubRel->count())
                <a href="#" class="menu-a-link">
                    <div class="s-lm-wrapper">
                        <div class="s-lm-s-elements">
                            <div class="s-lms-e-img">
                                <i class="fas fa-futbol"></i>
                            </div>
                            <p>{{__('Moji klubovi')}}</p>
                            <div class="extra-elements">
                                <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="inside-links active-links">
                            @if($loggedUser->clubRel->count())
                                @foreach($loggedUser->clubRel as $club)
                                    <a href="{{route('system.additional.clubs.timeline', ['id' => $club->id ])}}">
                                        <div class="inside-lm-link">
                                            <div class="ilm-l"></div><div class="ilm-c"></div>
                                            <p> {{ $club->title ?? '' }} </p>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </a>
            @endif

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <p>{{__('Uredi statistiku')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.additional.club-data.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Klubovi')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                        @php $i = 0 @endphp
                        @foreach($loggedUser->clubDataRel as $clubData)
                            <a href="{{ route('system.additional.club-data.preview', ['id' => $clubData->id ?? '']) }}">
                                <div class="inside-lm-link">
                                    <div class="ilm-l"></div><div class="ilm-c"></div>
                                    <p> <small> {{ $clubData->seasonRel->value ?? '' }} - <b> {{ $clubData->clubRel->title ?? '' }} </b> </small> </p>
                                </div>
                            </a>
                            @php if($i++ > 5) break @endphp
                        @endforeach

                        <a href="{{route('system.additional.nat-team-data.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Reprezentacija')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>

                        @foreach($loggedUser->natTeamDataRel as $natTeamData)
                            <a href="{{ route('system.additional.nat-team-data.preview', ['id' => $natTeamData->id ?? '']) }}">
                                <div class="inside-lm-link">
                                    <div class="ilm-l"></div><div class="ilm-c"></div>
                                    <p> <small> {{ $natTeamData->seasonRel->value ?? '' }} - <b> {{ ucwords(strtolower($natTeamData->countryRel->name_ba)) ?? '' }} </b> </small> </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </a>

            <div class="subtitle">
                <h4> {{__('Postavke')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-edit"></i>
                        </div>
                        <p>{{__('Uredite informacije')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{ route('system.users.edit-my-profile') }}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Uredi lične podatke')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('system.users.edit-career')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Uredi poziciju / ugovor')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                        <a href="{{route('system.users.edit-social-networks')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Uredi social media')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>

            <hr>
        @endif

        @if($loggedUser->role == 0)
            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-futbol"></i>
                        </div>
                        <p>{{__('Klubovi')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.additional.clubs.index')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Pregled klubova')}}</p>
                            </div>
                        </a>
                        <a href="{{route('system.additional.clubs.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Unos kluba')}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </a>

            <a href="{{ route('system.additional.partners.index') }}" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-users"></i>
                        </div>
                        <p>{{__('Partneri')}}</p>
                        <div class="extra-elements">
                            <div class="ee-t ee-t-b"><p>{{__('Image')}}</p></div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('system.other.public-notifications.index') }}" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-book"></i>
                        </div>
                        <p>{{__('Obavijesti')}}</p>
                    </div>
                </div>
            </a>

            <!-- Settings -->
            <div class="subtitle">
                <h4> {{__('Admin panel')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <p>{{__('Postavke')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.settings.core.keywords.index')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Šifarnici')}}</p>
                            </div>
                        </a>

                        <!-- Sys API -->
                        <a href="{{route('system.sys-api.main-sys-api')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Sistem API')}}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        @endif
    </div>
</div>
