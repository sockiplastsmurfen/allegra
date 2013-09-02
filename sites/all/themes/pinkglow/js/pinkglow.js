(function($) {
  Drupal.behaviors.nyrens = {
    attach: function(context) {
      
      $('.node-type-referens .field-name-field-bild img, .view-referenser img, .view-puffar img').hover(function() {
        $(this).animate({opacity: 0.7}, 50);
      }, function() {
        $(this).animate({opacity: 1.0}, 50);
      });

    }
  }
  
  
})(jQuery);