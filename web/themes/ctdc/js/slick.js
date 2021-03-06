(function ($) {

  Drupal.behaviors.initSlider = {
    attach: function (context, settings) {

      $(document).ready(function(){
        $('.slick-slider').slick({
          dots: true,
          speed: 800,
          autoplay: true,
        });
      });

    }
  };

  $(document).ready(function(){
    $('.carousel').slick({
      dots: true,
      arrows: true,
      autoplay: false,
      centerMode: false,
    });
  });

})(jQuery);
