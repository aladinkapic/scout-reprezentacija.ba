$(document).ready(function () {
    /* Auto resize textarea depending on input */
    $(document).on('input', '.post-text', function () {
        $(this).outerHeight(60).outerHeight(this.scrollHeight);

        let postBtn = $(".b-np-pb-post");

        if($(this).val() !== '') postBtn.removeClass('b-np-pb-post-greyed');
        else postBtn.addClass('b-np-pb-post-greyed');
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
});
