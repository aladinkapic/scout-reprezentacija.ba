{{--@foreach($player->posts as $post)--}}
{{--    <div class="single-post">--}}
{{--        <div class="sp-header">--}}
{{--            <div class="sp-h-iw">--}}
{{--                <img src="@if($player->image != '') {{ asset('images/profile-images/'.$player->image) }} @else {{ asset('images/user.png') }} @endif " alt="">--}}
{{--            </div>--}}
{{--            <div class="sp-h-data">--}}
{{--                <p> {{ $post->userRel->name ?? '' }} </p>--}}
{{--                <span> {{ $post->getDate() }} </span>--}}
{{--                <div class="love-it love-it-trigger @if($post->checkIfLiked()) loved-it @endif" post-id="{{ $post->id }}" title="{{ __('Ukupno ') }} {{ $post->likesRel->count() }} {{ __('sviđanja') }}">--}}
{{--                    <i class="fas fa-heart"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="sp-body">--}}
{{--            <p> {!! $post->content ?? '' !!} </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}


<div class="posts-wrapper">
    @foreach($player->blogPosts as $post)
        <div class="single-post">
            <div class="sp-header">
                <div class="sp-h-img-wrapper">
                    <img src="@if($player->image != '') {{ asset('images/profile-images/'.$player->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
                <div class="sp-h-name-field">
                    <p> {{ $player->name ?? '' }} </p>
                    <span> {{ __('Objavljeno') }} {{ $post->createdAt() }} </span>
                </div>
                <div class="sp-icons">
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
