<div class="inner__menu_w">

    <div class="mobile_small_menu">
        <a href="#}">
            <div class="single_elem @if(Route::is('dashboard.my-notes')) active @endif">
                <i class="fas fa-users"></i>
                <div class="total_no"><p><b>{{ Auth()->user()->blogPosts->count() }}</b></p></div>
            </div>
        </a>
        <a href="#}">
            <div class="single_elem @if(Route::is('dashboard.inbox')) active @endif">
                <i class="fas fa-heart"></i>
                <div class="total_no"><p><b>16</b></p></div>
            </div>
        </a>

        <a href="#">
            <div class="single_elem @if(Route::is('dashboard.my-schedule')) active @endif">
                <i class="fas fa-futbol"></i>
                <div class="total_no" id="number-of-unread-messages-m"><p><b>{{ Auth()->user()->clubDataRel->count() }}</b></p></div>
            </div>
        </a>

        <a href="#">
            <div class="single_elem @if(Route::is('dashboard.chat')) active @endif">
                <i class="fas fa-flag"></i>
                <div class="total_no" id="number-of-unread-messages-m"><p><b>{{ Auth()->user()->natTeamDataRel->count() }}</b></p></div>
            </div>
        </a>
        <a href="#">
            <div class="single_elem profile__submenu">
                <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                    <path class="change-color" d="M14.36 8.62C16.07 8 17.29 6.37 17.29 4.45C17.29 2 15.29 0 12.84 0C10.89 0 9.24 1.27 8.64 3.03C8.04 1.28 6.4 0 4.44 0C2 0 0 2 0 4.45C0 6.39 1.26 8.03 2.99 8.64C1.25 9.25 0 10.88 0 12.83C0 15.28 2 17.28 4.45 17.28C6.47 17.28 8.17 15.91 8.71 14.06C9.25 15.91 10.94 17.28 12.97 17.28C15.42 17.28 17.42 15.28 17.42 12.83C17.42 10.87 16.14 9.22 14.37 8.63L14.36 8.62ZM12.84 2C14.19 2 15.29 3.1 15.29 4.45C15.29 5.8 14.19 6.9 12.84 6.9C11.49 6.9 10.39 5.8 10.39 4.45C10.39 3.1 11.49 2 12.84 2ZM2 4.45C2 3.1 3.1 2 4.45 2C5.8 2 6.9 3.1 6.9 4.45C6.9 5.8 5.8 6.9 4.45 6.9C3.1 6.9 2 5.8 2 4.45ZM4.45 15.27C3.1 15.27 2 14.17 2 12.82C2 11.47 3.1 10.37 4.45 10.37C5.8 10.37 6.9 11.47 6.9 12.82C6.9 14.17 5.8 15.27 4.45 15.27ZM8.71 11.59C8.31 10.21 7.26 9.11 5.91 8.64C7.2 8.19 8.21 7.17 8.65 5.88C9.1 7.19 10.13 8.22 11.45 8.66C10.13 9.14 9.11 10.23 8.71 11.59ZM12.96 15.27C11.61 15.27 10.51 14.17 10.51 12.82C10.51 11.47 11.61 10.37 12.96 10.37C14.31 10.37 15.41 11.47 15.41 12.82C15.41 14.17 14.31 15.27 12.96 15.27Z" fill="#EEF0F2"/>
                </svg>
            </div>
        </a>
    </div>

    <div class="inner__menu profile__inner_menu">
        <div class="inner__menu_profile @if(Route::is('profile.posts')) active @endif">
            <a href="{{ route('profile.posts') }}">
                @if(isset(Auth()->user()->image))
                    <div class="inner__menu_profile_img_w">
                        <img src="{{ asset('images/profile-images/' . (Auth()->user()->image)) }}" alt="">
                    </div>
                @else
                    <i class="fas fa-users"></i>
                @endif
                <p>{{ __('Uredi moj zid') }}</p>
            </a>
        </div>
        <div class="inner__menu_links">
            <a href="{{ route('profile.info') }}">
                <div class="inner__menu_links_link @if(Route::is('profile.info')) active @endif">
                    <i class="fas fa-user"></i>
                    <p>{{ __('Lični podaci') }}</p>
                </div>
            </a>
            <a href="{{ route('profile.info.career') }}">
                <div class="inner__menu_links_link @if(Route::is('profile.info.career')) active @endif">
                    <i class="fas fa-book"></i>
                    <p>{{ __('Karijera') }}</p>
                </div>
            </a>

            <a href="{{ route('profile.career-data.clubs') }}">
                <div class="inner__menu_links_link @if(Route::is('profile.career-data.clubs')) active @endif">
                    <i class="fas fa-futbol"></i>
                    <p>{{ __('Klubovi') }}</p>

                    <div class="number" id="number-of-minutes-for-club-w">
                        <p id="number-of-minutes-for-club"> {{ Auth()->user()->clubDataRel->count() }} </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('profile.career-data.national-teams') }}">
                <div class="inner__menu_links_link @if(Route::is('profile.career-data.national-teams')) active @endif">
                    <i class="fas fa-flag"></i>
                    <p>{{ __('Reprezentacija') }}</p>
                    <div class="number" id="number-of-minutes-for-nt-w">
                        <p id="number-of-minutes-for-nt"> {{ Auth()->user()->natTeamDataRel->count() }} </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
