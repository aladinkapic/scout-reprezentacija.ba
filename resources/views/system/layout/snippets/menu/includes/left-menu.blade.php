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

        <div class="subtitle">
            <h4> {{__('Osnovne funkcionalnosti')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-home"></i>
            </div>
        </div>

        <!-- Users -->
        @if($loggedUser->role == 0)
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
            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="far fa-user"></i>
                        </div>
                        <p>{{__('Moje informacije')}}</p>
                        <div class="extra-elements">
                            <div class="rotate-element"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="inside-links active-links">
                        <a href="{{route('system.users.profile')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p>{{__('Moj profil')}}</p>
                            </div>
                        </a>
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

            <a href="#" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <p>{{__('Statistika')}}</p>
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
                        <a href="{{route('system.additional.nat-team-data.create')}}">
                            <div class="inside-lm-link">
                                <div class="ilm-l"></div><div class="ilm-c"></div>
                                <p> {{__('Reprezentacija')}} </p>
                                <div class="additional-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </a>

            <div class="subtitle">
                <h4> {{__('Ostalo')}} </h4>
                <div class="subtitle-icon">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>

            <a href="{{ route('system.users.edit-my-profile') }}" class="menu-a-link">
                <div class="s-lm-wrapper">
                    <div class="s-lm-s-elements">
                        <div class="s-lms-e-img">
                            <i class="fas fa-edit"></i>
                        </div>
                        <p>{{__('Uredite profil')}}</p>
                    </div>
                </div>
            </a>
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
