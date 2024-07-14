$( document ).ready(function() {
    let loginUrl = '/auth/log-me-in';
    let mainUrl  = '/users/my-profile';
    let newPswEmailUrl = '/auth/send-email-for-password';
    let setNewPswUrl  = '/auth/set-new-password';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let signMeIn = function(){
        let email    = $("#email").val();
        let password = $("#password").val();

        if(!validator.email(email)){
            notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        $.ajax({
            url: loginUrl,
            method: 'POST',
            dataType: "json",
            data: {
                email: email,
                password: password
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    window.location = response['url'];
                }else{
                    notify.Me([response['message'], "warn"]);
                }
                console.log(response);
            }
        });
    };

    $(".auth-btn").click(function () {
        signMeIn();
    });

    $(document).on('keypress',function(e) {
        if(e.which === 13) {
            if($(".auth-btn").length) signMeIn();
        }
    });



    /* Create new profile */

    let step = 1;
    let progressElements = function(){
        $(".rf-body-element").addClass('d-none');
        $(".rf-body-element-" + step).removeClass('d-none');

        (step === 1) ? $(".create-profile-back-btn").addClass('d-none') : $(".create-profile-back-btn").removeClass('d-none');

        if(step === 2){
            $(".pl-e-bar-fill").css('width', '37.5%');
        }else if(step === 3){
            $(".pl-e-bar-fill").css('width', '62.5%');
        }else if(step === 4){
            $(".pl-e-bar-fill").css('width', '87.5%');
            $(".button-wrapper").addClass('d-none');
        }else if(step === 1){
            $(".pl-e-bar-fill").css('width', '12.5%');
        }
    };

    $(".create-profile-next-btn").click(function () {
        if(step === 1){
            if($("#name").val() === ''){
                notify.Me(["Ime i prezime ne mogu biti prazni", "warn"]);
                return;
            }
            if(!validator.email($("#email").val())) {
                notify.Me(["Molimo da unesete validnu email adresu !", "warn"]);
                return;
            }
            if($("#phone").val() === ''){
                notify.Me(["Unesite Vaš broj telefona", "warn"]);
                return;
            }
            if(!validator.date($("#birth_date").val())) {
                notify.Me(["Molimo da odaberete datum Vašeg rođenja. Ispravan format je dd.mm.YYYY ", "warn"]);
                return;
            }
            if($("#gender").val() === ''){
                notify.Me(["Molimo da odaberete Vaš spol", "warn"]);
                return;
            }
        }else if(step === 2){
            if($("#address").val() === ''){
                // notify.Me(["Molimo da unesete Vašu adresu stanovanja", "warn"]);
                // return;
            }
            if($("#living_place").val() === ''){
                notify.Me(["Molimo unesite grad u kojem živite", "warn"]);
                return;
            }
            if($("#country").val() === ''){
                notify.Me(["Molimo da odaberete državu u kojoj trenutno živite", "warn"]);
                return;
            }
            if($("#citizenship").val() === ''){
                notify.Me(["Molimo da odaberete Vaše državljanstvo", "warn"]);
                return;
            }
        }else if(step === 3){
            if($("#sport").val() === ''){
                notify.Me(["Molimo da odaberete sport kojim se bavite", "warn"]);
                return;
            }
            if($("#club").val() === ''){
                notify.Me(["Molimo da unesete klub za koji igrate", "warn"]);
                return;
            }

            /* Process request */
            $(".pl-e-bar-fill").css('width', '87.5%');
            $(".loading-gif").removeClass('d-none');

            $.ajax({
                url: '/api/users/create-profile',
                method: 'POST',
                dataType: "json",
                data: {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    phone: $("#prefix").val() + $("#phone").val(),
                    birth_date: $("#birth_date").val(),
                    gender: $("#gender").val(),
                    // address: $("#address").val(),
                    living_place: $("#living_place").val(),
                    country: $("#country").val(),
                    citizenship: $("#citizenship").val(),
                    citizenship_2: $("#citizenship_2").val(),
                    sport: $("#sport").val(),
                    club: $("#club").val(),
                    note: $("#note").val(),
                },
                success: function success(response) {
                    $(".loading-gif").addClass('d-none');

                    let code = response['code'];

                    if(code === '0000'){
                        step ++;
                        progressElements();
                    }else{
                        notify.Me([response['message'], "warn"]);
                    }
                    console.log(response);
                }
            });
        }

        if(step < 3) step++;
        progressElements();
    });

    $(".create-profile-back-btn").click(function () {
        if(step > 1) step--;
        progressElements();
    });


    $(".reset-password").click(function (){
        let email    = $("#email").val();

        if(!validator.email(email)){
            notify.Me(["Uneseni email nije validan!", "warn"]);
            return;
        }

        $.ajax({
            url: newPswEmailUrl,
            method: 'POST',
            dataType: "json",
            data: {
                email: email
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    notify.Me([response['message'], "success"]);

                    $("#email").val("")
                }else{
                    notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
    $(".restart-psw-btn").click(function (){
        let password = $("#password").val();
        let passwordAgain = $("#pswAgain").val();

        if(password !== passwordAgain){
            notify.Me(["Lozinke se ne podudaraju!", "warn"]);
            return;
        }

        $.ajax({
            url: setNewPswUrl,
            method: 'POST',
            dataType: "json",
            data: {
                password: password,
                api_token: $("#api_token").val()
            },
            success: function success(response) {
                let code = response['code'];

                if(code === '0000'){
                    notify.Me([response['message'], "success"]);

                    window.location = response['url'];
                }else{
                    notify.Me([response['message'], "warn"]);
                }
                console.log(response);
            }
        });
    });


    let positionsUri = '/api/keywords/get-positions';

    $(".new-profile-sport").change(function () {
        let value = $(this).val();

        $.ajax({
            url: positionsUri,
            method: "post",
            dataType: "json",
            data: {value : value},
            success: function success(response) {
                if(response['code'] === '0000'){
                    $(".new-profile-position").empty();
                    $('.new-profile-position').append($('<option>', {
                        value: '',
                        text : 'Odaberite poziciju'
                    }));

                    $.each(response['data'], function (i, item) {
                        $('.new-profile-position').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });
                }else{
                    notify.Me([response['message'], "warn"]);
                }
                console.log(response);
            }
        });
    });
});
