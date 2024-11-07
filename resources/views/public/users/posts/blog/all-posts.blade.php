<div class="posts-wrapper">
    @foreach($data as $post)
        <div class="single-post">
            <div class="sp-header">
                <div class="sp-h-img-wrapper">
                    <img src="@if($user->image != '') {{ asset('images/profile-images/'.$user->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
                <div class="sp-h-name-field">
                    <p> {{ $user->name ?? '' }} </p>
                    <span> {{ __('Objavljeno') }} {{ $post->createdAt() }} </span>
                </div>
                <div class="sp-icons mac_w_clk">
                    <div class="dots__w mac_w_clk more-actions-t">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mac_w_clk">
                            <path class="mac_w_clk" d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/>
                        </svg>
                    </div>
                    <div class="more__actions_w mac_w_clk d-none">
                        <svg aria-hidden="true" height="12" viewBox="0 0 21 12" width="21" class="xem7dle x10l6tqk xng853d xdlq8gc mac_w_clk" fill="#FFFFFF" style="transform: scale(-1, -1) translate(0px, 0px);"><path d="M21 0c-2.229.424-4.593 2.034-6.496 3.523L5.4 10.94c-2.026 2.291-5.434.62-5.4-2.648V0h21Z"></path></svg>
                        <div class="top__right__line mac_w_clk"></div>

                        <div class="ma__row mac_w_clk">
                            <a href="#" class="mac_w_clk">
                                <i class="fas fa-heart mac_w_clk"></i>
                                {{ ( $post->likes ?? '0') . __(' sviđanja')}}
                            </a>
                        </div>

                        <div class="line"></div>

                        <div class="ma__row mac_w_clk edit-blog-post" post-id="{{ $post->id }}">
                            <a class="mac_w_clk">
                                <i class="fas fa-edit mac_w_clk"></i>
                                {{ __('Uredi post') }}
                            </a>
                        </div>
                        <div class="ma__row mac_w_clk">
                            <a href="{{ route('system.blog-posts.delete', ['id' => $post->id]) }}" class="mac_w_clk">
                                <i class="fas fa-trash mac_w_clk"></i>
                                {{ __('Premjesti u smeće') }}
                            </a>
                        </div>
                    </div>

{{--                    <div class="sp-i-wrapper edit-blog-post" title="{{ __('Uredite post') }}" post-id="{{ $post->id }}">--}}
{{--                        <i class="fas fa-edit"></i>--}}
{{--                    </div>--}}
{{--                    <a href="{{ route('system.blog-posts.delete', ['id' => $post->id]) }}">--}}
{{--                        <div class="sp-i-wrapper" title="{{ __('Obrišite post') }}">--}}
{{--                            <i class="fas fa-trash"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="sp-i-wrapper love-it" title="{{ __('Ukupno ') . ( $post->likes ?? '0') . __(' sviđanja')}}">--}}
{{--                        <i class="fas fa-heart"></i>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="sp-post">
                {!! nl2br($post->post ?? '') !!}
            </div>

            <!-- Iframe - youtube video -->
            @if(isset($post->youtube) and $post->youtube != '')
                <div class="iframe-wrapper">
                    <iframe src="{{ $post->youtube ?? '' }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
            @endif

            <!-- Image -->
            @if(isset($post->file) and $post->file != '')
                <div class="image-wrapper">
                    @if($post->ext == 'mov' or $post->ext == 'mp4')
                        <video controls>
                            <source src="{{ asset('images/blog/' . $post->file ?? '') }}">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ asset('images/blog/' . $post->file ?? '') }}" alt="">
                    @endif
                </div>
            @endif
        </div>
    @endforeach
</div>
