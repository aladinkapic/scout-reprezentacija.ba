$('.slide-nav').on('click', function(e) {
  e.preventDefault();
  // get current slide
  var current = $('.slide-active').data('slide'),
    // get button data-slide
    next = $(this).data('slide');

  $('.slide-nav').removeClass('active');
  $(this).addClass('active');

  if (current === next) {
    return false;
  } else {
    $('.slider').find('.slider-item[data-slide=' + next + ']').addClass('slide-prestart');
    $('.slide-active').addClass('animate-end');
    setTimeout(function() {
      $('.slide-prestart').removeClass('animate-start slide-prestart').addClass('slide-active');
      $('.animate-end').addClass('animate-start').removeClass('animate-end slide-active');
    }, 800);
  }
});


$(document).ready(function () {
    $(".mobile-burger").click(function () {
        $(".mobile-menu").fadeIn();
    });
    $(".mm-header").click(function(){
        $(".mobile-menu").fadeOut();
    });
});
