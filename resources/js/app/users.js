$(document).ready(function () {
    let positionsUri = '/api/keywords/get-positions';

    $(".pick-a-sport").change(function () {
        let value = $(this).val();

        console.log(value);

        $.ajax({
            url: positionsUri,
            method: "post",
            dataType: "json",
            data: {value : value},
            success: function success(response) {
                if(response['code'] === '0000'){
                    $(".picked-position").empty();
                    $.each(response['data'], function (i, item) {
                        $('.picked-position').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });

                    if(value === 'Futsal'){
                        $(".soccer-field").addClass('d-none');
                        $(".futsal-field").removeClass('d-none');
                    }else{
                        $(".futsal-field").addClass('d-none');
                        $(".soccer-field").removeClass('d-none');
                    }

                    $(".position").removeClass('active');
                }else{
                    notify.Me([response['message'], "warn"]);
                }
                console.log(response);
            }
        });
    });

    /* Mark picked positions - Interaction with field */

    $(".position").click(function () {
        $(".position").removeClass('active');
        $('[value="' + $(this).attr('value') + '"]').addClass('active');

        // $(this).addClass('active');

        $(".picked-position option").prop("selected", false);
        $('.picked-position option[value="' + $(this).attr('value') + '"]').prop("selected", "selected");
    });

    /* Reverse field interaction */
    $(".picked-position").change(function () {

        $(".position").removeClass('active');
        $('[value="' + $(this).val() + '"]').addClass('active');
    });
});
