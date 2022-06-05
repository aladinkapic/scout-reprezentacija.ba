@component('mail::message')
# Obavijest sa scout.reprezentacija.ba

Poštovani, {!! $_name ?? '' !!}, Vaš profil je verifikovan te isti možete koristiti. Vaši pristupni podaci su dati kao:

Email: {!! $_mail ?? '' !!}
Šifra: {!! $_password ?? '' !!}

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
