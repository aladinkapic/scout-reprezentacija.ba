$(document).ready(function(){
    $(".preview-more-info").click(function () {
        $(this).find('i').toggleClass('fa-chevron-down');
        $(this).find('i').toggleClass('fa-chevron-up');

        $(this).parent().parent().toggleClass('col-active');
    });
});
