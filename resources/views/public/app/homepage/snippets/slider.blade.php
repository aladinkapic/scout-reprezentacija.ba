{{--<div class="hero">--}}
{{--  <div class="hero-overlay">--}}
{{--    <div class="hero-content">--}}
{{--      <div class="hero-header">Neka te svi vide na Reprezentacija.ba!</div>--}}
{{--      <div class="hero-description">Napravi svoj profil - poveži se sa selektorima, klubovima, agentima, medijima...</div>--}}
{{--      <div class="hero-buttons">--}}
{{--          <button class="hero-btn">Napravi novi profil!</button>--}}
{{--          <a href="{{ route('auth.login') }}" class="hero-btn">Prijava na postojeći profil!</a>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</div>--}}

{{--<section class="hero container-fluid border-1">--}}
{{--    <div class="container">--}}
{{--        <div class="row d-grid g-4 align-items-end">--}}
{{--            <div class="col-sm-12 headline">--}}
{{--                <p class="hero-headline">{{ __('Neka te svi vide !') }}</p>--}}
{{--                <p class="hero-subtext"> {{ __('Poveži se sa') }} <span id='text' class="transition-text"></span></p>--}}
{{--            </div>--}}
{{--            <div class="d-flex gap-3 col-sm-12 slider-buttons">--}}
{{--                <a href="{{ route('register') }}">--}}
{{--                    <button class="btn btn-primary" type="button">{{ __('Napravi novi profil') }}</button>--}}
{{--                </a>--}}
{{--                <a href="{{ route('auth.login') }}">--}}
{{--                    <button class="btn btn-outline-light" type="button">{{ __('Prijava na postojeći profil') }}</button>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}



<div class="main-slider">
    <div class="main-slider-wrapper">
        <div class="main-text">
            <div class="center-div">
                <div class="text-wrapper">
                    <div class="let-everybody">
                        <h1>NEKA TE</h1>
                        <h1>SVI VIDE</h1>
                    </div>
                    <div class="connect-with">
                        <h2>
                            <p>Poveži se sa</p>
                            <span id="text"> selektorima, klubovima, agentima, medijima... </span>
                        </h2>
                    </div>
                </div>
                <div class="buttons-wrapper">
                    <a href="{{ route('auth.login') }}">
                        <button> PRIJAVITE SE </button>
                    </a>
                    <p>
                        Nemate svoj profil? <a href="{{ route('register') }}">Registrujte se!</a>
                    </p>

                    <div class="arrow-down">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    typing_effect(['selektorima', 'klubovima', 'agentima', 'medijima'], ['#2AA7B8']);

    function typing_effect(words, colors) {
        if(window.innerWidth >= 800) return;

        var cursor = document.getElementById('cursor'); //cursor
        var text = document.getElementById('text'); //text

        var blink = true;
        var wait = false;
        var letters_count = 1;
        var temp = 1;

        text.style.color = colors[0]
        window.setInterval(function () { //wait between words when it starts writting
            if (letters_count === 0 && wait === false) {
                wait = true;

                text.innerHTML = ' ... ' // leave a blank
                window.setTimeout(function () {
                    var usedColor = colors.splice(0, 1)[0] //remove first element and get it as str
                    colors.push(usedColor);
                    var usedWord = words.splice(0, 1)[0]
                    words.push(usedWord);
                    temp = 1;
                    text.style.color = colors[0]
                    letters_count += temp;
                    wait = false;
                }, 1000)
            } else if (letters_count === words[0].length + 1 && wait === false) {
                wait = true;
                window.setTimeout(function () { //wait a bit until words finished and start deleting
                    temp = -1;
                    letters_count += temp;
                    wait = false;
                }, 1000)
            } else if (wait === false) { //write words
                text.innerHTML = words[0].substr(0, letters_count)
                letters_count += temp;
            }
        }, 80)


    }
</script>
