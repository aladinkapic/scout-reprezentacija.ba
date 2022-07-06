$(document).ready(function () {

    /*
     *  New photo; Trigger different actions
     */
    let setPopupPosition = function(){
        let popupWrapper = $(".b-np-popup");

        popupWrapper.css('top', (parseInt(window.innerHeight / 2) - parseInt(popupWrapper.height() / 2)) + 'px');
    };

    /*
     *  Textarea (main input form) properties
     */

    let setText = function(font = 14){
        let popUp = $(".b-np-pb-text");

        console.log("Font: " + font);

        popUp.css('height', (font === 14) ? '280px' : '140px');
        $(".post-text").css('font-size', font + 'px');

        setPopupPosition();
    };

    /*
     *  Video properties:
     *      - set iframe if youtube link is detected
     *      - show iframe
     *      - if image selected, do not show iframe
     *
     *  Remove youtube video from input
     */
    let youtubeVideo = function(ID){
        let ytWrapper = $(".youtube-preview"), ytVideo = $("#youtube-link-preview");

        if($(".b-np-bp-image-preview").hasClass('d-none')){
            let newLink = 'https://www.youtube.com/embed/' + ID;
            if(newLink !== ytVideo.attr('src')) {
                ytVideo.attr('src', newLink);
                $("#youtubeLink").val(newLink);
            }

            ytWrapper.removeClass('d-none');

            setText(14);
        }else{
            ytWrapper.addClass('d-none');
        }
    };
    $(".close-iframe").click(function () {
        $(".youtube-preview").addClass('d-none');
        $("#youtubeLink").val('');
        $("#youtube-link-preview").attr('src', '');
        setText(20);
    });

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
            youtubeVideo(match[6]);
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


    $(".new-photo-trigger").click(function () {
        /* Show image wrapper and preview options */
        $(".b-np-bp-image-preview").removeClass('d-none');
        /* Hide iframe */
        $(".youtube-preview").addClass('d-none');

        setText(14);
    });
    $(".close-image").click(function () {
        let postText = $(".post-text");

        $(".b-np-bp-image-preview").addClass('d-none');

        $(".post-image-preview").addClass('d-none').attr('src', '');
        $(".post-image").prop("value", "");
        if(postText.val() === '') $(".b-np-pb-post").addClass('b-np-pb-post-greyed');

        setText(20);
    });
    /* On change, preview image */
    $(".post-image").change(function (e) {
        $(".post-image-preview").removeClass('d-none').attr('src', URL.createObjectURL(e.target.files[0]));

        $(".b-np-pb-post").removeClass('b-np-pb-post-greyed');
    });
});
