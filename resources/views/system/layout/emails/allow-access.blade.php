@component('mail::message')
# Obavijest sa scout.reprezentacija.ba

@if($_gender == 7) Poštovani, @else Poštovana, @endif {!! $_name ?? '' !!}, Vaš profil je je odobren i javan!

Imate 48 sati da unesete fotografiju, podatke i statistiku. Na svoj zid možete dodavati fotografije i video snimke.

Vaši pristupni podaci su dati kao:

Email: {!! $_mail ?? '' !!}
Šifra: {!! $_password ?? '' !!}

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
