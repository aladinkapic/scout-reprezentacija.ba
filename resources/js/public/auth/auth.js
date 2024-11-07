$(document).ready(function (){
    $(".skip-nt-data").change(function (){
        let val = parseInt($(this).val());

        console.log(val);
        if(val === 1){
            $(".nt-data-wrapper").removeClass('d-none');
        }else $(".nt-data-wrapper").addClass('d-none');
    })

    $(".close-sb-w").click(function (){
        window.location = '/auth/create-new-profile';
    });
});
