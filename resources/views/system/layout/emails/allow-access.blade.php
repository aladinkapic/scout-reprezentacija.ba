@component('mail::message')
    # Obavijest sa scout.reprezentacija.ba

    Poštovani, John Doe, Vaš profil je verifikovan te isti možete koristiti. Vaši pristupni podaci su dati kao:

    {!! $_message !!}

    {{ __('Ugodan ostatak dana') }},<br>
    <a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
