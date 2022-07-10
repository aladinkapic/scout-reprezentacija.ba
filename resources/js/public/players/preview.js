$(document).ready(function(){
    $(".preview-more-info").click(function () {
        $(this).find('i').toggleClass('fa-chevron-down');
        $(this).find('i').toggleClass('fa-chevron-up');

        $(this).parent().parent().toggleClass('col-active');
    });


    /* Preview post images */

    let uri = '/api/players/get-image';

    let updatePost = function(id){
        $.ajax({
            url: uri,
            method: "POST",
            dataType: "json",
            data: {id : id},
            success: function success(response) {
                if(response['code'] === '0000'){
                    let data = response['message'];

                    $(".image-preview").removeClass('d-none');
                    $(".post-image-src").attr('src', '/images/blog/' + data['post']['image']);

                    $(".post-title").text(data['owner']);
                    $(".post-date").text(data['date']);
                    $(".post-description").text(data['post']['post']);


                    if(data['next'] !== ''){
                        $(".right-arrow-icon-wrapper").removeClass('d-none').attr('post-id', data['next']);
                    }else{
                        $(".right-arrow-icon-wrapper").addClass('d-none');
                    }
                    if(data['previous'] !== ''){
                        $(".left-arrow-icon-wrapper").removeClass('d-none').attr('post-id', data['previous']);
                    }else{
                        $(".left-arrow-icon-wrapper").addClass('d-none');
                    }

                    console.log(data['next']);
                }
            }
        });
    };

    $(".img-thumb, .arrow-icon-wrapper").click(function () {
        let id = $(this).attr('post-id');

        updatePost(id);
    });

    $(".ui-icon-wrapper").click(function () {
        $(".image-preview").addClass('d-none');
    });
});
