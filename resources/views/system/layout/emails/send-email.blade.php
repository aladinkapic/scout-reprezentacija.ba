@component('mail::message')
# Obavijest sa scout.reprezentacija.ba

Poštovani,

{!! $_message !!}

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
