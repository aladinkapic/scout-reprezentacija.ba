$(document).ready(function(){
    $(".preview-more-info").click(function () {
        $(this).find('i').toggleClass('fa-chevron-down');
        $(this).find('i').toggleClass('fa-chevron-up');

        $(this).parent().parent().toggleClass('col-active');
    });

    $(".sw-data-club, .sw-data-nat-team").click(function (){
        let currentId = $(this).attr('id');
        let $this = $(this);

        if($this.hasClass('sw-data-club')){
            $(".sw-data-club").each(function (){
                if($(this).attr('id') !== currentId){
                    $(this).addClass('sw-data-hidden');
                    $(this).find(".plus-minus-img").attr('src', '/images/icons/plus-solid.svg');
                    // $(this).find(".fas").removeClass('fa-minus').addClass('fa-plus');
                }
            });
        }else{
            $(".sw-data-nat-team").each(function (){
                if($(this).attr('id') !== currentId){
                    $(this).addClass('sw-data-hidden');
                    $(this).find(".plus-minus-img").attr('src', '/images/icons/minus-solid.svg');
                    // $(this).find(".fas").removeClass('fa-minus').addClass('fa-plus');
                }
            });
        }

        if($this.hasClass('sw-data-hidden')){
            $(this).removeClass('sw-data-hidden');
            $(this).find(".plus-minus-img").attr('src', '/images/icons/minus-solid.svg');
            // $(this).find(".fas").removeClass('fa-plus').addClass('fa-minus');
        }else{
            $(this).addClass('sw-data-hidden');
            $(this).find(".plus-minus-img").attr('src', '/images/icons/plus-solid.svg');
            // $(this).find(".fas").removeClass('fa-minus').addClass('fa-plus');
        }
    });

    // $(".sw-data").click(function () {
    //     $(this).parent().find(".sw-data").addClass('sw-data-hidden');
    //     $(this).parent().find(".fas").removeClass('fa-minus').addClass('fa-plus');
    //
    //     $(this).removeClass('sw-data-hidden');
    //     $(this).find(".fas").removeClass('fa-plus').addClass('fa-minus');
    // });

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
                    $(".post-image-src").attr('src', '/images/blog/' + data['post']['file']);

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

    $(".user-image-preview").click(function (event){
        if($(event.target).hasClass('user-image-preview')){
            $(".user-image-preview").addClass('d-none');
        }
    });
});
