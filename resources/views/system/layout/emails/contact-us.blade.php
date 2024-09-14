@component('mail::message')
# Poruka sa www.scout.reprezentacija.ba

Ime i prezime: {{ $_name }} <br>
Telefon: {{ $_phone }} <br>
Email: {{ $_email }} <br>

Poruka: {{ $_message }}

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
