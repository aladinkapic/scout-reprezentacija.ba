<div class="pp-header">
    <div class="public-container">
        <div class="preview-wrapper">
            <div class="pw-left">
                <div class="image-wrapper">
                    <img src="@if($player->image != '') {{ asset('images/profile-images/'.$player->image) }} @else {{ asset('images/user.png') }} @endif " alt="">
                </div>
            </div>
            <div class="pw-right pw-right-header">
                <h1> <b> {{ $player->name ?? '' }} </b> </h1>
                <div class="social-networks">
                    @if($player->under_contract == 'Da')
                        <h5 class="mt-2 text-info fw-bold"> {{ $player->lastClub->clubRel->title ?? '' }} </h5>
                    @else
                        <p class="mt-2 text-danger fw-bold"> {{ __('Igrač trenutno nije pod ugovorom') }} </p>
                    @endif
                    <p class="m-0 fw-bold"> {{ $player->living_place ?? '' }}, {{ ucwords(strtolower($player->citizenshipRel->title ?? '')) ?? '' }} </p>
                </div>
                <div class="bottom-white">
                    <div class="bw-title">
                        <div class="icon-wrapper">
                            <i class="fa fa-info"></i>
                        </div>
                        <h2> {{ __('Detaljne informacije') }} </h2>
                    </div>
                    <div class="bw-buttons">
                        <a href="{{ route('home.players.preview', ['id' => $player->id, 'what' => 'timeline']) }}" title="{{ __('Timeline') }}">
                            <div class="bw-b-button @if($what == 'timeline') active @endif"> <p> {{ __('Timeline') }} </p> </div>
                        </a>
                        <a href="{{ route('home.players.preview', ['id' => $player->id, 'what' => 'info']) }}" title="{{ __('Detaljne informacije o igraču') }}">
                            <div class="bw-b-button @if($what == 'info') active @endif"> <p> {{ __('Statistika') }} </p> </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
