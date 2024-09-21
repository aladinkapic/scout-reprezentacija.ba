$(document).ready(function (){
    /**
     *  Show post edit and delete buttons
     */
    $(".more-actions-t").click(function (){
        console.log("xD ??");
        $(".more__actions_w").addClass('d-none');

        $(this).parent().find('.more__actions_w').removeClass('d-none');
    });

    $(document).not('.single-post').on('click', function(e) {
        // Handle event gracefully
        e.preventDefault();

        alert('Hello');
    });


    /**
     *  User profile
     */
    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Profile submenu
     */
    let innerMenuOpen = false;
    if(window.innerWidth <= 1200){
        $(".profile__submenu").addClass('active');
        // $(".profile__inner_menu").toggleClass('d-none');
    }
    $(".profile__submenu").click(function (){
        if(!innerMenuOpen){
            innerMenuOpen = true;

            $(".profile__inner_menu").css('display', 'inline-flex');
        }else{
            innerMenuOpen = false;
            $(".profile__inner_menu").css('display', 'none');
        }
    });
});
