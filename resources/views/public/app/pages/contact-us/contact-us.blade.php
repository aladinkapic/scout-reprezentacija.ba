@extends('public.layout.layout')

@section('content')
    <div class="contact_us_wrapper">
        <div class="contact_us_inner_wrapper">
            <div class="cu_i_w_form">
                <div class="cu_i_w_left">
                    <div class="cu_i_w_left_subheader">
                        <h3>{{ __('Imate pitanje? Ispunite formu i pošaljite nam poruku!') }}</h3>
                    </div>

                    <div class="cu_i_w_left_contact__form">
                        <div class="left_input__w">
                            <label for="cf_fname">{{ __('Ime i prezime') }}</label>
                            <input type="text" id="cf_name" name="cf_name" value="{{ $user->name ?? '' }}">
                        </div>
                        <div class="left_input__w">
                            <label for="cf_phone">{{ __('Broj telefona') }}</label>
                            <input type="text" id="cf_phone" name="cf_phone" value="@isset($user){{ $user->phone }}@else+387 @endif">
                        </div>
                        <div class="left_input__w input__w_full">
                            <label for="cf_email">{{ __('Email') }}</label>
                            <input type="text" id="cf_email" name="cf_email" value="{{ $user->email ?? '' }}">
                        </div>

                        <div class="left_input__w input__w_full">
                            <label for="cf_message">{{ __('Vaša poruka') }}</label>
                            <textarea type="text" id="cf_message" name="cf_message" maxlength="500"></textarea>
                        </div>

                        <div class="left_input__btn_w">
                            <p>
                                <input type="checkbox" id="cf_agree" name="cf_agree">
                                <label for="cf_agree">{{ __('Slažem se sa ') }} <a href="{{ route('home.pages.terms-and-conditions') }}" target="_blank">{{ __('uslovima korištenja.') }}</a></label>
                            </p>
                            <button class="send_us_message" attr="contact-form">{{ __('Pošaljte nam poruku') }}</button>
                        </div>
                    </div>
                </div>
                <div class="cu_i_w_right">
                    <div class="cu_i_w_right_one">
                        <div class="cu_i_w_right_one_1">
                            <h6>{{ __('Za upite kontaktirajte: ') }}</h6>
                        </div>
                        <div class="cu_i_w_right_one_2">
                            <div class="cu_i_w_right_one_2_1">
                                <h6> www.reprezentacija.ba </h6>
                                <p> press@reprezentacija.ba </p>
                            </div>
                        </div>
                    </div>
                    <div class="cu_i_w_right_two">
                        <div class="cu_i_w_right_two_1">
                            <h6>{{ __('OD “BOSEL GROUP”') }}</h6>
                            <p>{{ __('ul. La Benevolencija 12') }}</p>
                            <p>{{ __('71000 Sarajevo') }}</p>
                            <p>{{ __('Bosna i Hercegovina') }}</p>
                        </div>
                    </div>
                    <div class="cu_i_w_right_three">
                        <div class="cu_i_w_right_three_inner">
                            <div class="cu_i_w_right_three_fb">
                                <a href="https://www.facebook.com/reprezentacija.ba" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M11,10h2.6l0.4-3H11V5.3c0-0.9,0.2-1.5,1.5-1.5H14V1.1c-0.3,0-1-0.1-2.1-0.1C9.6,1,8,2.4,8,5v2H5.5v3H8v8h3V10z"></path></svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_twitter">
                                <a href="https://twitter.com/zmajevi" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M19,4.74 C18.339,5.029 17.626,5.229 16.881,5.32 C17.644,4.86 18.227,4.139 18.503,3.28 C17.79,3.7 17.001,4.009 16.159,4.17 C15.485,3.45 14.526,3 13.464,3 C11.423,3 9.771,4.66 9.771,6.7 C9.771,6.99 9.804,7.269 9.868,7.539 C6.795,7.38 4.076,5.919 2.254,3.679 C1.936,4.219 1.754,4.86 1.754,5.539 C1.754,6.82 2.405,7.95 3.397,8.61 C2.79,8.589 2.22,8.429 1.723,8.149 L1.723,8.189 C1.723,9.978 2.997,11.478 4.686,11.82 C4.376,11.899 4.049,11.939 3.713,11.939 C3.475,11.939 3.245,11.919 3.018,11.88 C3.49,13.349 4.852,14.419 6.469,14.449 C5.205,15.429 3.612,16.019 1.882,16.019 C1.583,16.019 1.29,16.009 1,15.969 C2.635,17.019 4.576,17.629 6.662,17.629 C13.454,17.629 17.17,12 17.17,7.129 C17.17,6.969 17.166,6.809 17.157,6.649 C17.879,6.129 18.504,5.478 19,4.74"></path></svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_in">
                                <a href="https://www.instagram.com/reprezentacija.ba/" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M13.55,1H6.46C3.45,1,1,3.44,1,6.44v7.12c0,3,2.45,5.44,5.46,5.44h7.08c3.02,0,5.46-2.44,5.46-5.44V6.44 C19.01,3.44,16.56,1,13.55,1z M17.5,14c0,1.93-1.57,3.5-3.5,3.5H6c-1.93,0-3.5-1.57-3.5-3.5V6c0-1.93,1.57-3.5,3.5-3.5h8 c1.93,0,3.5,1.57,3.5,3.5V14z"></path><circle cx="14.87" cy="5.26" r="1.09"></circle><path d="M10.03,5.45c-2.55,0-4.63,2.06-4.63,4.6c0,2.55,2.07,4.61,4.63,4.61c2.56,0,4.63-2.061,4.63-4.61 C14.65,7.51,12.58,5.45,10.03,5.45L10.03,5.45L10.03,5.45z M10.08,13c-1.66,0-3-1.34-3-2.99c0-1.65,1.34-2.99,3-2.99s3,1.34,3,2.99 C13.08,11.66,11.74,13,10.08,13L10.08,13L10.08,13z"></path></svg>
                                </a>
                            </div>
                            <div class="cu_i_w_right_three_linkedin">
                                <a href="https://www.tiktok.com/@reprezentacijaba" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.24,6V8.82a6.79,6.79,0,0,1-4-1.28v5.81A5.26,5.26,0,1,1,8,8.1a4.36,4.36,0,0,1,.72.05v2.9A2.57,2.57,0,0,0,7.64,11a2.4,2.4,0,1,0,2.77,2.38V2h2.86a4,4,0,0,0,1.84,3.38A4,4,0,0,0,17.24,6Z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection