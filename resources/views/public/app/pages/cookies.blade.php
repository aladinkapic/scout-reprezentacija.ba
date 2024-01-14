@extends('public.layout.layout')

@section('content')
    <div class="privacy-wrapper">
        <div class="pw-header">
            <h5>{{ __('Pažljivo pročitati') }}</h5>
            <h1> {{ __('Pravila o postupanju s kolačićima') }} </h1>
        </div>

        <div class="pw-body">
            <h4>{{ __('Što je kolačić?') }}</h4>
            <p>{{ __('Kolačić je informacija spremljena na računar od strane web stranice koju posjetite. Uobičajeno je da sprema vaše postavke i postavke za web-stranicu, kao što su na primjer preferirani jezik ili adresa. Kasnije, kada opet otvorite istu web-stranicu, internet preglednik šalje nazad kolačiće koji pripadaju toj stranici. Ovo omogućava stranici da prikaže personalizirane informacije.') }}</p>
            <p>{{ __('Kolačići mogu spremati širok raspon informacija, uključujući lične informacije (kao što je lično ime ili adresa e-pošte). Ipak, ova informacija može biti spremljena jedino ako se to izričito omogući jer web-stranice ne mogu dobiti pristup informacijama koje im niste dali/la i ne mogu pristupiti drugim datotekama na vašem računaru. Zadane aktivnosti spremanja i slanja kolačića nisu vidljive korisnicima. Ipak, možete promijeniti postavke internet preglednika tako da samostalno izaberete hoćete li zahtjeve za spremanje kolačića odobriti ili odbiti te zatim automatski obrisati pri zatvaranju internet preglednika spremljene kolačiće i ostale postavke.') }}</p>

            <h4>{{ __('Kako podesiti postavke kolačića?') }}</h4>
            <p>{{ __('Uređivanjem postavki kolačića odlučujete hoćete li dopustiti njihovo pohranjivanje na vašem računaru. Upravljanje i podešavanje postavkama kolačića, kao što smo spomenuli, može se napraviti u internet pregledniku. Za informacije o postavkama kolačića, kliknite na ime internet preglednika koji koristite. Neke postavke mogu ovisiti i o uređaju kojim pristupate internetu (desktop računar, tablet ili mobitel) i nisu sve dostupne na našem jeziku.') }}</p>
            <ul>
                <li>{{ __('Google Chrome') }}</li>
                <li>{{ __('Mozilla Firefox') }}</li>
                <li>{{ __('Samsung Internet') }}</li>
                <li>{{ __('Microsoft Internet Explorer') }}</li>
                <li>{{ __('Microsoft Edge') }}</li>
                <li>{{ __('Opera') }}</li>
                <li>{{ __('Safari – iOS / Mac') }}</li>
            </ul>
            <p>
                {{ __('Ako onemogućite kolačiće, nećete moći koristiti neke od funkcionalnosti na web-stranicama ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
            </p>

            <h4>{{ __('Što su privremeni kolačići?') }}</h4>
            <p>{{ __('Privremeni kolačići ili kolačići sesije uklanjaju se s računara po zatvaranju internet preglednika. Pomoću njih web-mjesta pohranjuju privremene podatke, poput stavki u košarici za kupnju.') }}</p>


            <h4>{{ __('Što su stalni kolačići?') }}</h4>
            <p>{{ __('Stalni ili spremljeni kolačići ostaju na računalu nakon zatvaranja internetskog preglednika. Pomoću njih web-mjesta pohranjuju podatke, kao što su korisničko ime za prijavu i zaporka, tako da se ne morate prijavljivati prilikom svakog posjeta određenom mjestu. Stalni kolačići ostat će na računalu danima, mjesecima, a neki čak i godinama.') }}</p>

            <h4>{{ __('Što su kolačići od prve strane?') }}</h4>
            <p>{{ __('Kolačići prve strane dolaze s web-mjesta koje gledate, a mogu biti privremeni ili stalni. Pomoću njih web-mjesta mogu pohraniti podatke koje će ponovo koristiti prilikom sljedećeg posjeta tom web-mjestu.') }}</p>

            <h4>{{ __('Što su kolačići treće strane?') }}</h4>
            <p>{{ __('Kolačići treće strane dolaze sa sadržaja drugih web-mjesta, na primjer reklame, koje se nalaze na web-mjestu koje trenutno gledate. Pomoću tih kolačića web-mjesta mogu pratiti korištenje interneta u marketinške svrhe.') }}</p>

            <h4>
                {{ __('Koristi li ') }} <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a> {{ __('kolačiće?') }}
            </h4>
            <p>
                {{ __('Internet stranica') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('koristi kolačiće s primarnim ciljem kako bi omogućila bolje korisničko iskustvo.') }}
            </p>

            <h4>
                {{ __('Kakve kolačiće koristi ') }} <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a> {{ __('i zašto?') }}
            </h4>
            <p>
                {{ __('Privremeni kolačići (engl. Session cookies) – to su privremeni kolačići koji ističu (i automatski se brišu) kada zatvorite internet preglednik. Koristimo ih da omogućimo pristup sadržaju i omogućimo stvari koje možete učiniti kada se prijavite sa svojim podacima na ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
            </p>
            <p>
                {{ __('Trajni kolačići (engl. Persistent cookies) – obično imaju datum isteka daleko u budućnosti te će ostati u vašem pregledniku, dok ne isteknu, ili dok ih ručno ne izbrišete.') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('koristi trajne kolačiće za funkcionalnosti poput „pamćenja“ da je korisnik prijavljen na stranici, što vama kao registriranom korisniku olakšava korištenje ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
                {{ __('Također koristimo trajne kolačiće kako bismo bolje razumjeli navike korisnika i u skladu sa tim poboljšali stranicu prema korisničkim načinima korištenja. Ova informacija je anonimna – ne vidimo individualne podatke korisnika.') }}
            </p>

            <h4>
                {{ __('Ima li') }} <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a> {{ __('kolačiće treće strane?') }}
            </h4>
            <p>
                {{ __('Koristimo nekoliko vanjskih servisa koji korisniku spremaju limitirane kolačiće. Ovi kolačići postavljeni su za normalno funkcioniranje određenih mogućnosti koje korisnicima olakšavaju pristup sadržaju kao i dijeljenje istoga s drugim internet servisima.') }}
            </p>

        </div>
    </div>
@endsection
