@extends('public.layout.layout')

@section('content')
    <div class="privacy-wrapper">
        <div class="pw-header">
            <h5>{{ __('Pažljivo pročitati') }}</h5>
            <h1> {{ __('Pravila privatnosti') }} </h1>
        </div>

        <div class="pw-body">
            <p>{{ __('Reprezentacija.ba  u najvećoj mogućoj mjeri štiti privatnost svojih korisnika. Reprezentacija.ba  se obavezuje da će u dobroj namjeri koristiti podatke dobivene od korisnika tokom korištenja domene Reprezentacija.ba. Reprezentacija.ba  se obvezuje da će čuvati privatnost korisnika u svim slučajevima, izuzev u slučaju kršenja ovih pravila ili nezakonitih aktivnosti korisnika po zahtjevu pravosudnih organa Bosne i Hercegovine. Reprezentacija.ba  nije odgovoran ukoliko usljed hakerskog napada ili neke druge vanredne okolnosti dođe do otkrivanja korisničkih podataka.') }}</p>

            <b class="d-inline-flex">
                <p>
                    {{ __('Ova Politika privatnosti odnosi se na povjerljivost ličnih podataka koji su prikupljeni u procesu registracije na internet stranici www.reprezentacija.ba. Ova Politika privatnosti je sastavni dio Opštih uslova korištenja stranice ') }}
                    <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
                </p>
            </b>

            <p>{{ __('Reprezentacija.ba pridržava se važećih propisa sa ciljem zaštite privatnosti svojih Korisnika, a posebno Opće uredbe o zaštiti osobnih podataka EU.') }}</p>
            <p>
                {{ __('Svaki korisnik koji ima bilo kakva pitanja u vezi ličnih podataka može poslati e-mail poruku na adresu ') }}
                <a href="#">press@reprezentacija.ba</a> .
            </p>
            <p>
                {{ __('Prihvaćanjem ove Politike privatnosti klikom, prilikom registracije korisnika odnosno prijavom na internet stranici') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __(' korisnik potvrđuje da je pročitao, razumio i da se slaže sa obradom ličnih podataka kako ih ovaj dokument utvrđuje.') }}
            </p>

            <h4>{{ __('U koju svrhu Reprezentacija.ba prikuplja i obrađuje lične podatke?  ') }}</h4>
            <p>{{ __('Reprezentacija.ba prikuplja i obrađuje lične podatke korisnika u svrhu izrade personaliziranog sadržaja. Korisnici registracijom stiču pravo na korištenje određenih sadržaja na portalu kao što su kreiranje vlastitog profila, pisanja komentara, korištenja foruma, ocjenjivanja sadržaja.') }}</p>
            <p>{{ __('Reprezentacija.ba nema namjeru da prikuplja lične podatke od maloljetnika, odnosno osoba mlađih od 18 godina. Budući da nema mogućnosti identifikacije korisnika sajta dok sam korisnik ne unese ručno i dobrovoljno svoje podatke putem neke od formi, napominjemo da ćemo za sve podatke za koje utvrdimo da su lični podaci maloljetnika zatražiti od istih da nam pošalju potvrdu odnosno validaciju od strane njihovih roditelja ili staratelja, za dalje korištenje datih sadržaja sajta. Ukoliko u predviđenom roku ne dobijemo potvrdu odnosno validaciju od strane roditelja i staratelja, podaci će biti obrisani, a pristup datim sadržajima će biti onemogućen.') }}</p>

            <h4>{{ __('Koja je pravna osnova obrade osobnih podataka?  ') }}</h4>
            <p>
                {{ __('Korisnik unosom svojih ličnih podataka te potvrdom (klikom) o prihvaćanju Općih uslova korištenja i ove Politike privatnosti i sklapa ugovorni odnos za korištenje sadržaja na internet stranici ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
            </p>

            <h4>{{ __('Koju vrstu ličnih podataka Reprezentacija.ba sakuplja i obrađuje?') }}</h4>
            <p>
                {{ __('Prilikom registracije na internet stranici ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __(', od budućeg korisnika ćemo zatražiti pružanje određenih informacija o sebi (ličnih podataka) kao što su:') }}
            </p>

            <ul>
                <li>{{ __('Email adresa') }}</li>
                <li>{{ __('Ime i prezime') }}</li>
                <li>{{ __('Broj telefona') }}</li>
                <li>{{ __('Spol') }}</li>
                <li>{{ __('Lozinka') }}</li>
            </ul>

            <p>{{ __('Korisnik potvrđuje da se slaže da obradom ličnih podataka klikom na dugme za prijavu.') }}</p>
            <p>
                {{ __('Osim ovih podataka automatski prikupljamo podatke s vašeg računara, što može uključivati IP adresu, a postoje i situacije u kojima automatski prikupljamo druge vrste podataka kao što su datum i vrijeme pristupa na internet stranicu ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>,
                {{ __('informacije o hardveru, softveru ili internet pretraživaču koji koristite kao i o operativnom sistemu vašeg računara te verziji aplikacije i vašim jezičnim postavkama.') }}
            </p>
            <p>{{ __('Korisnici u sklopu svojih korisničkih profila mogu upisati i druge podatke u cilju personalizacije svojih korisničkih profila.') }}</p>
            <p>{{ __('Također možemo prikupljati informacije o klikovima i stranicama koje su vam prikazane. ') }}</p>
            <p>
                {{ __('Preporučujemo da brinete o svojoj ulaznoj lozinci za korisnički račun internet stranice ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
                {{ __('Preporučujemo prilikom odabira kombinacije znakova za lozinku svakako kombinirati velika i mala slova te brojeve, te da svakako upotrijebite lozinku od barem šest znakova. Preporučujemo da lozinku mijenjate periodično sa ciljem zaštite vašeg korisničkog računa.') }}
            </p>

            <h4>Zaštita privatnosti i tajnost podataka</h4>
            <p>
                {{ __('Prikupljeni podaci su u elektronskom obliku i zaštićeni SSL certifikatom koji enkriptira podatke i tako osigurava da se komunikacija između korisnika i stranice ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('odvija sigurnim protokolom.') }}
            </p>
            <p>
                {{ __('Zaštitu podataka Reprezentacija.ba uzima ozbiljno i poduzima razne mjere opreza kako bi osobni podaci bili zaštićeni. Nažalost, niti jedan prijenos podataka preko interneta, ili bilo koje bežične mreže ne može biti 100% siguran. Kao posljedica toga, iako Reprezentacija.ba provodi razumne zaštitne mjere za zaštitu podataka ne može garantovati zaštitu bilo koje informacije prenesene na ili s internet stranice ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('te nije odgovoran za radnje bilo koje treće strane koja takve informacije primi.') }}
            </p>
            <p>
                {{ __('Reprezentacija.ba u najvećoj mogućoj mjeri štiti privatnost svojih korisnika. Reprezentacija.ba se obavezuju da će u dobroj namjeri koristiti podatke dobivene od korisnika tokom korištenja domene Reprezentacija.ba te da privatne podatke neće distribuirati niti prodavati trećoj strani, osim uz dozvolu korisnika. Reprezentacija.ba može, u skladu sa zakonom, prikupljati određene podatke o korisnicima dobivene tokom njihovog korištenja domene Reprezentacija.ba, ili podatke unesene u postupku registracije. Reprezentacija.ba obavezuje se da prikupljene privatne podatke poput e-mail adresa, imena i prezimena neće bez dozvole svakog pojedinačnog korisnika na bilo koji način distribuirati. Reprezentacija.ba se obvezuje da će čuvati privatnost korisnika u svim slučajevima, izuzev u slučaju kršenja ovih pravila ili nezakonitih aktivnosti korisnika. Na pismeni zahtjev nadležnih tijela ili direktno zainteresiranih osoba, a u svrhu istrage, pokretanja ili vođenja sudskih ili drugih postupka, Reprezentacija.ba može tim tijelima ili osobama dostaviti podatke koje prikupi o pojedinim osobama. Reprezentacija.ba nije odgovoran ukoliko usljed hakerskog napada dođe do otkrivanja korisničkih podataka.') }}
            </p>

            <h4>{{ __('Društvene mreže') }}</h4>
            <p>
                {{ __('Korisnici se mogu prijaviti i registrirati preko vlastitih računa s društvenih mreža Facebook, LinkedIn, Twitter i Google (Gmail i YouTube). Također, dijeljenje oglasa na tim društvenim mrežama postavlja kolačiće. Internet stranica ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('koristi osim toga i ostale servise kao što su Mailchimp, Mailjet i Elasticmail koje koritimo za slanje obavještenja i newslettera.') }}
            </p>

            <h4>{{ __('Mjerenje posjećenosti') }}</h4>
            <p>
                {{ __('Naša web stranica koristi Google Analytics, uslugu web analize koju pruža Google, Inc. (“Google”). Informacije koje generira kolačić o vašem korištenju naše web stranice (uključujući vašu IP adresu) bit će prenesene na Google i pohranjene na poslužiteljima u Republici Irskoj gdje će se čuvati najduže 26 mjeseci nakon čega će biti izbrisani. Google će koristiti te informacije u svrhu vrednovanja vašeg korištenja naše web stranice, sastavljanjem izvješća o aktivnostima na web stranici za operatore web mjesta i pružanjem drugih usluga vezanih uz aktivnost web stranica i korištenje interneta. Google također može prenijeti te podatke trećim stranama, ako to zahtijeva zakon, ili ako takve treće strane obrađuju podatke u ime tvrtke Google. Google neće povezati vašu IP adresu s drugim podacima koje Google posjeduje. Daljnje informacije o Googleovim pravilima o privatnosti možete dobiti na adresi ') }}
                <a href="http://www.google.com/privacy.html">www.google.com/privacy.html</a> .
            </p>
            <p>
                {{ __('Ukoliko želite onemogućiti da vam navedeni servis sprema “kolačiće”, to možete učiniti ') }}
                <a href="https://tools.google.com/dlpage/gaoptout">{{ __('ovdje') }}</a>.
            </p>
            <p>
                {{ __('Trenutno postoji nekoliko internetskih stranica za isključivanje pohranjivanja “kolačića” za različite servise. Više se možete informirati na sljedećim linkovima:') }}
            </p>
            <ul>
                <li><a href="http://www.allaboutcookies.org/">www.allaboutcookies.org</a> </li>
                <li><a href="https://www.youronlinechoices.eu/">www.youronlinechoices.eu</a></li>
            </ul>

            <h4>
                {{ __('S kim ') }} <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a> {{ __('dijeli lične podatke?') }}
            </h4>
            <p>{{ __('Reprezentacija.ba neće dijeliti lične podatke korisnika s drugim stranama osim u slučajevima navedenim u nastavku i u situaciji kada to pozitivni propisi zahtijevaju.') }}</p>
            <p>{{ __('Reprezentacija.ba obavezuje se da prikupljene privatne podatke poput e-mail adresa, imena i prezimena neće bez dozvole svakog pojedinačnog korisnika na bilo koji način distribuirati. Reprezentacija.ba se obvezuje da će čuvati privatnost korisnika u svim slučajevima, izuzev u slučaju kršenja ovih pravila ili nezakonitih aktivnosti korisnika. Na pismeni zahtjev nadležnih tijela ili direktno zainteresiranih osoba, a u svrhu istrage, pokretanja ili vođenja sudskih ili drugih postupka, Reprezentacija.ba može tim tijelima ili osobama dostaviti podatke koje prikupi o pojedinim osobama.') }}</p>

            <h4>{{ __('Period u kojem će osobni podaci biti pohranjeni  ') }}</h4>
            <p>
                {{ __('Reprezentacija.ba pohranjuje osobne podatke registriranih korisnika na internet stranici ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>
                {{ __('dok se ostvaruje svrha obrade, a to je period do trenutka do kada je aktivna registracija korisničkog profila.') }}
            </p>

            <h4>{{ __('Pristup i ispravak ličnih podataka  ') }}</h4>
            <p>
                {{ __('Korisnik u svakom trenutku ima mogućnost pristupa svojim ličnih podacima po registraciji na stranici, te pristupom na „profil“ gdje korisnik može revidirati svoje lične podatke koje je podijelio na stranici ') }}
                <a href="https://reprezentacija.ba" target="_blank">www.reprezentacija.ba</a>.
            </p>

            <h4>{{ __('Brisanje ličnih podataka (pravo na zaborav)  ') }}</h4>
            <p>
                {{ __('Korisnik ima pravo u bilo kojem trenutku zatražiti brisanje ličnih podataka (pravo na zaborav). Korisnik to može učiniti zahtjevom na e-mail ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a>
                {{ __('i podaci će biti izbrisani unutar trideset dana. Zahtjev mora biti upućen sa e-mail adrese na koju je registrovan korisnički račun u cilju sprečavanja zloupotrebe od strane trećih lica.') }}
            </p>

            <h4>{{ __('Pravo na prigovor  ') }}</h4>
            <p>
                {{ __('Ako unatoč svim poduzetim mjerama za zaštitu ličnih podataka smatrate da imate osnove za prigovor, javite se na e-mail adresu ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a> .
            </p>

            <h4>{{ __('Izmjena Politike privatnosti') }}</h4>
            <p>
                {{ __('Ovu Politiku privatnosti Reprezentacija.ba može izmijeniti u bilo kojem trenutku objavljivanjem izmijenjenog teksta Politike privatnosti na internet stranici ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a>.
                {{ __('Reprezentacija.ba preporučuje korisnike da povremeno pregledaju ovu Politiku privatnosti. Ukoliko korisnik ne slaže s ovom Politikom privatnosti, upućujemo korisnika da napusti te ne pristupa i ne koristi internet stranicu ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a>.
            </p>
            <p>
                {{ __('Izmjena Politike privatnosti stupa na snagu odmah nakon objave na internet stranici ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a>.
            </p>
            <p>
                {{ __('Nastavak upotrebe internet stranice  ') }}
                <a href="mailto::press@reprezentacija.ba">press@reprezentacija.ba</a>
                {{ __('od strane korisnika nakon stupanja na snagu izmjena, podrazumijeva da korisnik potvrđuje i prihvata izmijenjenu Politiku privatnosti.') }}
            </p>
        </div>
    </div>
@endsection
