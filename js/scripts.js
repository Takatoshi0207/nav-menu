( function() {

  var app = {

    initMobileMenu: function () {
      jQuery('.openbtn').click(function () {
        jQuery('.openbtn').toggleClass('active');
        // jQuery('.header__sp__list').css('right','0');
      });
      
    }
  }

  // Document Ready
  jQuery(document).ready( function() {
    // console.log('aaaa');
    app.initMobileMenu();
    
  });

})();