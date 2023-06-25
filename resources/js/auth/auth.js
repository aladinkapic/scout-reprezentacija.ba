$( document ).ready(function() {
    let loginUrl = '/log-me-in';
    let mainUrl  = '/users/my-profile';

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

    let step = 0;

    $(".create-profile-btn").click(function () {
        if(step === 0){
            step ++;


        }
    });
});
