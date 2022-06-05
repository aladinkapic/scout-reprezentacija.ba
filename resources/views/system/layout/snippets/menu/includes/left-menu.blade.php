<div class="s-left-menu t-3">
    <!-- user Info -->
    <div class="user-info">
        <div class="user-image">
            <img class="mp-profile-image" title="{{__('Promijenite sliku profila')}}" src="{{ asset('images/user.png') }} " alt="">
        </div>
        <div class="user-desc">
            <h4> Root Admin </h4>
            <p> Living address, Town - Country</p>
            <p>
                <i class="fas fa-circle"></i>
                Online
            </p>
        </div>
    </div>
    <hr>

    <!-- Menu subsection -->
    <div class="s-lm-subsection">

        <div class="subtitle">
            <h4>{{__('Grafičko sučelje')}}</h4>
            <div class="subtitle-icon">
                <i class="fas fa-chart-area"></i>
            </div>
        </div>
        <a href="#" class="menu-a-link">
            <div class="s-lm-wrapper">
                <div class="s-lm-s-elements">
                    <div class="s-lms-e-img">
                        <i class="fas fa-home"></i>
                    </div>
                    <p>{{__('Dashboard')}}</p>
                    <div class="extra-elements">
                        <div class="ee-t ee-t-b"><p>{{__('Graph')}}</p></div>
                    </div>
                </div>
            </div>
        </a>

        <div class="subtitle">
            <h4> {{__('Sistemske funkcionalnosti')}} </h4>
            <div class="subtitle-icon">
                <i class="fas fa-history"></i>
            </div>
        </div>

        <!-- Users -->
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

        @if($loggedUser->role == 0)
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
                        </div>
                    </div>
                </a>
        @endif
    </div>
</div>
