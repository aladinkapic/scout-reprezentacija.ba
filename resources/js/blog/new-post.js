$(document).ready(function () {
    /* Auto resize textarea depending on input */
    $(document).on('input', '.post-text', function () {
        $(this).outerHeight(60).outerHeight(this.scrollHeight);

        let postBtn = $(".b-np-pb-post");

        if($(this).val() !== '') postBtn.removeClass('b-np-pb-post-greyed');
        else postBtn.addClass('b-np-pb-post-greyed');

        let target = jQuery(this).val();

        let regExp = /(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})(?:\?t=|)(\d+|)([\S\s]*)/i;
        let match = target.match(regExp);

        console.log(match);
        if( typeof match !== 'undefined' && match !== null ){

            let ytWrapper = $(".youtube-preview"), ytVideo = $("#youtube-link-preview");

            if($(".b-np-bp-image-preview").hasClass('d-none')){
                ytVideo.attr('src', 'https://www.youtube.com/embed/' + match[6]);
                ytWrapper.removeClass('d-none');

                $(".b-np-pb-text").css('height', '280px');

                setPopupPosition();
                $(".post-text").css('font-size', '14px');
            }else{
                ytWrapper.addClass('d-none');
            }
        }

        // console.log("Video ID:"); console.log(match[6]);
        // console.log("Video start time:"); console.log(match[7]);
        // console.log("After:"); console.log(match[8]);
    });

    /*
     *  Close popup and set text from textarea into the main wrapper .. Only first 50 letters
     */
    $(".b-np-ph-exit").click(function () {
        $(".b-new-post-popup-wrapper").fadeOut();

        // I'm thinking about you, my soul mate ..
        let postText = $(".post-text"), mainPost = '';
        if(postText.val() !== ''){
            let length = (postText.val().length > 50) ? 50 : postText.val().length;
            for(let i=0; i<length; i++){ mainPost += postText.val()[i]; }
            if(length === 50) mainPost += ' ..';
        }else mainPost = 'Šta Vam je na mislima?';

        $(".b-np-tf-text").find("p").text(mainPost);
    });
    $(".b-np-tf-text").click(function () {
        $(".b-new-post-popup-wrapper").fadeIn();
    });

    /*
     *  New photo; Trigger different actions
     */
    let setPopupPosition = function(){
        let popupWrapper = $(".b-np-popup");

        popupWrapper.css('top', (parseInt(window.innerHeight / 2) - parseInt(popupWrapper.height() / 2)) + 'px');
    };
    $(".new-photo-trigger").click(function () {
        $(".b-np-bp-image-preview").removeClass('d-none');
        $(".b-np-pb-text").css('height', '280px');

        setPopupPosition();
        $(".post-text").css('font-size', '14px');
        $(".youtube-preview").addClass('d-none');
    });
    $(".close-image").click(function () {
        let postText = $(".post-text");

        $(".b-np-bp-image-preview").addClass('d-none');
        $(".b-np-pb-text").css('height', '140px');

        $(".post-image-preview").addClass('d-none').attr('src', '');
        $(".post-image").prop("value", "");
        setPopupPosition();
        postText.css('font-size', '20px');
        if(postText.val() === '') $(".b-np-pb-post").addClass('b-np-pb-post-greyed');
    });
    /* On change, preview image */
    $(".post-image").change(function (e) {
        $(".post-image-preview").removeClass('d-none').attr('src', URL.createObjectURL(e.target.files[0]));

        $(".b-np-pb-post").removeClass('b-np-pb-post-greyed');
    });
});
