(function ($) {
  'use strict';

  $(window).on('load', function () {
    $('#preloader').fadeOut('slow', function () {
      $(this).remove();
    });
    var $whatever = $('.container');
    var rt = ($(window).width() - ($whatever.offset().left + $whatever.outerWidth()));
    $('.what-hot-wrap').css('right',rt)
  });

  $(window).on('resize', function () {
    var $whatever = $('.container');
    var rt = ($(window).width() - ($whatever.offset().left + $whatever.outerWidth()));
    $('.what-hot-wrap').css('right',rt)
  });

  $( document ).ready(function() {
    $('.ocBanner-js').slick({
      autoplay: true,
      infinite: true,
      arrows: false,
      dots: true,
      autoplaySpeed: 7000,
      pauseOnFocus: false,
      pauseOnHover: false
    });
    $('.ocBanner-js').slickAnimation();

    /* Search Menu */
    $(".search-icon").click(function() {
      $(".wpbsearchform").slideToggle();
    });

    $(document).keyup(function(e) {
      if (e.key == "Escape") {
        $(".wpbsearchform").hide();
      }
    });
  });

})(jQuery);