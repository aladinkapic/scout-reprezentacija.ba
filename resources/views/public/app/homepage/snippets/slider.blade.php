<div class="main-slider @if(!Auth()->check()) mt-60 @endif">
    <div class="main-slider-wrapper">
        <div class="main-text">
            <div class="center-div">
                <div class="text-wrapper">
                    <div class="let-everybody">
                        <h1>{{ __('NEKA TE') }}</h1>
                        <h1>{{ __('SVI VIDE') }}</h1>
                    </div>
                    <div class="connect-with">
                        <h2>
                            <p>{{ __('Napravi svoj profil na platformi') }} <br> {{ __('Scout Reprezentacija.ba!') }}</p>
                            <span id="text"> {{ __('Poveži se sa selektorima, klubovima, agentima, medijima') }}... </span>
                        </h2>
                    </div>
                </div>
                <div class="buttons-wrapper">
                    <a href="{{ route('auth.login') }}">
                        <button> {{ __('PRIJAVITE SE') }} </button>
                    </a>
                    <p>
                        {{ __('Niste registrovani?') }} <a href="{{ route('auth.create-new-profile') }}">{{ __('Kreirajte svoj profil!') }}</a>
                    </p>

                    <div class="arrow-down" id="arrow-down-trigger">
                        <a href="#arrow-down-trigger">
                            <img src="{{ asset('images/icons/arrow-down-solid.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // typing_effect(['selektorima', 'klubovima', 'agentima', 'medijima'], ['#2AA7B8']);

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
