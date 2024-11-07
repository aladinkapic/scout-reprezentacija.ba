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
                    <div class="sp-i-wrapper love-it-trigger @if($post->checkIfLiked()) loved-it @endif" post-id="{{ $post->id }}" title="{{ __('Ukupno ') }} {{ $post->likesRel->count() }} {{ __('sviđanja') }}">
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

            <!-- Images and videos -->
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

<div class="image-preview d-none">
    <div class="ip-post-preview">
        <div class="upper-icons">
            <div class="ui-icon-wrapper">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="img-wrapper">
            <img class="post-image-src" src="/images/blog/81299a99dca41ec9d03a0c3e12128820.jpeg" alt="">
        </div>
        <div class="post-details">
            <h4 class="post-title">  </h4>
            <p> <span class="post-date"></span> <i class="fas fa-clock"></i> </p>

            <p class="description post-description">

            </p>
        </div>

        <div class="arrow-icon-wrapper left-arrow-icon-wrapper" post-id="">
            <i class="fas fa-angle-left"></i>
        </div>
        <div class="arrow-icon-wrapper right-arrow-icon-wrapper" post-id="">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>
</div>
