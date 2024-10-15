@component('mail::message')

@if($_gender == 7) Poštovani, @else Poštovana, @endif {!! $_name ?? '' !!},

Odabrani ste kao igrač koji ima pravo biti dio scout.reprezentacija.ba.

Ujedno vam je odobren gratis profil za prvu godinu u iznosu cijene 100.00 EUR = mjesečno, a vaša obaveza je da link profila istaknete na vašim društvenim mrežama u opisu profila.

Vaš profil je javan na linku <a href="{{ route('home.players.player-timeline', ['username' => $_username]) }}">{!! $_name !!}</a>

Na istom linku možete objaviti vaše fotografije, video snimke i statistiku

{{ __('Tu smo za sva pitanja') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
