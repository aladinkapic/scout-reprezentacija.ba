$(document).ready(function () {
    let positionsUri = '/api/keywords/get-positions';

    $(".pick-a-sport").change(function () {
        let value = $(this).val();

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
                }else{
                    notify.Me([response['message'], "warn"]);
                }
                console.log(response);
            }
        });
    });
});
