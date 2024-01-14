@extends('public.layout.layout')

@section('content')
    <div class="privacy-wrapper">
        <div class="pw-header">
            <h5>{{ __('Pažljivo pročitati') }}</h5>
            <h1> {{ __('Opšte uslove korištenja') }} </h1>
        </div>

        <div class="pw-body">
            <h4>{{ __('Što je kolačić?') }}</h4>

            <p>
                {{ __('Korištenjem bilo kojeg dijela domene ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('prihvatate sve uslove korištenja navedene u Opštim uslovima korištenja, kao i sva specifična pravila koja jesu ili mogu biti donesena za pojedine sastavne dijelove domene Reprezentacija.ba. Pretpostavlja se da ste korištenjem bilo kojeg dijela domene Reprezentacija.ba, u svakom trenutku upoznati sa aktuelnim sadržajem Opštih uslova korištenja kao i svim specifičnim pravilima koja su donesena za pojedine sastavne dijelove domene Reprezentacija.ba, te da ste ih u potpunosti razumjeli i prihvatili.') }}
            </p>

            <h4>{{ __('Prava i obaveze korisnika') }}</h4>
            <p>{{ __('Reprezentacija.ba  posjetiocima u dobroj namjeri osigurava korištenje sadržaja na domeni Reprezentacija.ba. Svi korisnici i posjetioci imaju pravo besplatno služiti se sadržajem, osim ako je drugačije navedeno, te pod uslovom da ne krše odredbe Opštih uslova korištenja, te svih drugih javno dostupnih dokumenata kojima se reguliše korištenje domene Reprezentacija.ba.') }}</p>

            <h4>{{ __('Rizici') }}</h4>
            <p>{{ __('Korištenjem sadržaja internet stranice Reprezentacija.ba korisnik prihvata sve rizike koji nastaju iz njihovog korištenja te prihvata koristiti njihov sadržaj isključivo za ličnu upotrebu i na vlastitu odgovornost.') }}</p>

            <h4>{{ __('Odricanje od odgovornosti') }}</h4>
            <p>{{ __('Reprezentacija.ba se u potpunosti odriče svake odgovornosti koja je na bilo koji način bila povezana s korištenjem domene Reprezentacija.ba, za bilo koje radnje korisnika povezanih sa upotrebom ili zloupotrebom korištenja domene Reprezentacija.ba,  kao i za svaku štetu koja može nastati korisniku, ili bilo kojoj trećoj strani, a u vezi sa upotrebom ili zloupotrebom korištenja domene Reprezentacija.ba. Reprezentacija.ba nije odgovoran za sadržaje objavljene od strane njihovih korisnika i posjetilaca.') }}</p>

            <h4>{{ __('Autorska prava') }}</h4>
            <p>{{ __('Dokumenti, podaci i informacije objavljeni na domeni Reprezentacija.ba se mogu koristiti samo za individualne potrebe korisnika, uz poštivanje svih autorskih i vlasničkih prava te prava trećih osoba. Reprezentacija.ba  polaže autorska prava na sve vlastite i potpisane sadržaje (tekstualne, vizualne i audio materijale, baze podataka i programski kod). Neovlašteno korištenje bilo kojeg dijela domene Reprezentacija.ba smatra se kršenjem autorskih prava, i može rezultirati zakonskim i drugim postupcima protiv prekršitelja. Sadržaji objavljeni na domeni Reprezentacija.ba se mogu prenositi uz obavezno navođenje izvora i linka na originalni tekst u sklopu prve rečenice prenesenog sadržaja. Reprezentacija.ba nije odgovoran za prenesene multimedijalne sadržaje od strane njihovih korisnika i posjetilaca koji su već objavljeni na internet sistemima za javno dijeljenje i gledanje tih video sadržaja.') }}</p>

            <h4>{{ __('Plaćanje') }}</h4>
            <p>{{ __('Plaćanje na Reprezentacija.ba se odvija vanjskim sistemom internetskog plaćanja Monri Payments doo, dio grupacije PayTen, adresa Ulica Grada Vukovara 269F toranj V1 - 1 kat, 10000, Zagreb, Hrvatska. Reprezentacija.ba nije odgovorna za ishod plaćanja. Reprezentacija.ba ne prima i samim time ne zadržava bilo kakav podataka unešen u svrhe plaćanja na Reprezentacija.ba. ') }}</p>
        </div>
    </div>
@endsection
