$(document).ready(function () {
    let uri = '/api/players/like-post';

    $(".love-it-trigger").click(function () {
        let id = $(this).attr('post-id');
        let $this = $(this);

        $.ajax({
            url: uri,
            method: "POST",
            dataType: "json",
            data: {id : id},
            success: function success(response) {
                if(response['code'] === '0000'){
                    $this.toggleClass(' loved-it');
                    $this.attr('title', 'Ukupno ' + response['message'] + ' sviđanja');
                }
            }
        });
    });
});
