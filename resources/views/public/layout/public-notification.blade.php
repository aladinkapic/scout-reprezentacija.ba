@if(isset($publicNot))
    <div class="public__notifications d-none">
        <div class="pn__text">
            {!! nl2br($publicNot->content) !!}
        </div>
        <div class="pn__btns">
            <a href="{{ $publicNot->link }}" target="_blank" class="pn__visited">
                {{ __('Više informacija') }}
                <i class="fas fa-chevron-right"></i>
            </a>

            <a class="pn__closed">
                {{ __('Zatvorite') }}
            </a>
        </div>
    </div>
@endif
