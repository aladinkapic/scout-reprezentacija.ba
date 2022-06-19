$(document).ready(function () {
    let uri = '/api/players/rate-player';

    $("body").on('click', '.star-trigger', function () {
        let index = $(this).attr('star-index');
        let id    = $(this).attr('player-id');
        let $this = $(this);
        let rateW   = $(".player-reviewed");


        $.ajax({
            url: uri,
            method: "POST",
            dataType: "json",
            data: {id : id, index : index},
            success: function success(response) {
                let counter = 0;

                if(response['code'] === '0000'){
                    let mainReview = parseInt(response['message']['average']);
                    rateW.empty();

                    for(let i=1; i<= parseInt( mainReview / 2); i++){
                        rateW.append('<i class="fas fa-star yellow-star star-trigger ys-r" star-index="' + (counter + 1) + '" player-id="' + id + '"> </i>');
                        counter ++;
                    }

                    if((mainReview / 2) !== parseInt(mainReview / 2)){
                        rateW.append('<i class="fas fa-star-half-alt yellow-star star-trigger ys-r" star-index="' + (counter + 1) + '" player-id="' + id + '"> </i>');
                        counter++;
                    }

                    for(let i=counter; i<5; i++){
                        rateW.append('<i class="far fa-star star-trigger ys-r" star-index="' + (counter + 1) + '" player-id="' + id + '"> </i>');
                    }

                    rateW.append('<span class="fs-6 fw-normal"> ' + (mainReview / 2) + ' / 5 </span>');

                    $(".player-reviewed-wrapper").attr('title', 'Bazirano na ' + response['message']['total'] + ' ocjene/a !');
                }
            }
        });
    });
});
