( function() {

  var app = {

    initMobileMenu: function () {
      jQuery('.openbtn').click(function () {
        jQuery(this).toggleClass('active');
      });
      
    }
  }

  // Document Ready
  jQuery(document).ready( function() {
    console.log('aaaa');
    app.initMobileMenu();
    
  });

})();