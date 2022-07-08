<div class="posts-wrapper">
    @foreach($user->blogPosts as $post)
        <div class="single-post">
            <div class="sp-header">
                <div class="sp-h-img-wrapper">
                    <img src="@if($loggedUser->image != '') {{ asset('images/profile-images/'.$loggedUser->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
                <div class="sp-h-name-field">
                    <p> {{ $loggedUser->name ?? '' }} </p>
                    <span> {{ __('Objavljeno') }} prije 45 min </span>
                </div>
                <div class="sp-icons">
                    <div class="sp-i-wrapper edit-blog-post" title="{{ __('Uredite post') }}" post-id="{{ $post->id }}">
                        <i class="fas fa-edit"></i>
                    </div>
                    <a href="{{ route('system.blog-posts.delete', ['id' => $post->id]) }}">
                        <div class="sp-i-wrapper" title="{{ __('Obrišite post') }}">
                            <i class="fas fa-trash"></i>
                        </div>
                    </a>
                    <div class="sp-i-wrapper love-it" title="{{ __('Ukupno ') . 15 . __(' sviđanja')}}">
                        <i class="fas fa-heart"></i>
                    </div>
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
            @if(isset($post->image) and $post->image != '')
                <div class="image-wrapper">
                    <img src="{{ asset('images/blog/' . $post->image ?? '') }}" alt="">
                </div>
            @endif
        </div>
    @endforeach
</div>
