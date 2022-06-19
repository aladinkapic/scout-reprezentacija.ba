@foreach($player->posts as $post)
    <div class="single-post">
        <div class="sp-header">
            <div class="sp-h-iw">
                <img src="@if($player->image != '') {{ asset('images/profile-images/'.$player->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
            </div>
            <div class="sp-h-data">
                <p> {{ $post->userRel->name ?? '' }} </p>
                <span> {{ $post->getDate() }} </span>
                <div class="love-it love-it-trigger @if($post->checkIfLiked()) loved-it @endif" post-id="{{ $post->id }}" title="{{ __('Ukupno ') }} {{ $post->likesRel->count() }} {{ __('sviđanja') }}">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="sp-body">
            <p> {!! $post->content ?? '' !!} </p>
        </div>
    </div>
@endforeach
