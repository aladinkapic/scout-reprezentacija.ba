@component('mail::message')
# Obavijest sa scout.reprezentacija.ba

@if($_gender == 7) Poštovani, @else Poštovana, @endif {!! $_name ?? '' !!}, kreiran je zahtjev za izmjenu Vaše korisničke šifre,

Molimo unesite Vašu novu šifru koristeći <a href="{{ route('auth.restart-password', ['username' => $_username, 'token' => $_api_token]) }}">ovaj</a> link.

Napomena: Ukoliko Vi niste tražili izmjenu Vaše šifre, molimo da u što kraćem roku kontaktirate naše Administratore!

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ config('app.name') }} </a>
@endcomponent
