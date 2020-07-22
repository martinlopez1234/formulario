jQuery(document).ready(function () {
  // Esc key close menu
  document.addEventListener('keydown', function (event) {
    if (event.keyCode === 27) {
      event.preventDefault();
      document.querySelectorAll('.mobile-menu-active').forEach(function (element) {
        jQuery('body').removeClass('mobile-menu-active');

        jQuery('.navigation.collapse').removeClass('in');
        jQuery('.navbar-collapse').removeClass('in');
        jQuery('.navigation.collapse').addClass('hide-menu');

      }.bind(this));
      document.querySelectorAll('.mobile-above-menu-active').forEach(function (element) {
        jQuery('body').removeClass('mobile-above-menu-active');
        jQuery('.navigation.collapse').removeClass('in');
        jQuery('.navbar-collapse').removeClass('in');
        jQuery('.navigation.collapse').addClass('hide-menu');
      }.bind(this));
    }
  }.bind(this));

  jQuery('.navbar-toggle').focus(function (e) {
    e.preventDefault();
    jQuery('body').addClass('mobile-above-menu-active');
    jQuery('.navigation.collapse').addClass('in');
    jQuery('.navbar-collapse').addClass('in');
    jQuery('.navigation.collapse').removeClass('hide-menu');
    // jQuery('.sider.above').removeClass('almaira-shop-menu-hide');
  });

  // main-menu-script

  jQuery(".main-header .navigation").themeResponsiveMenu({
    resizeWidth: '1024', // Set the same in Media query       
    animationSpeed: 'medium', //slow, medium, fast
    accoridonExpAll: true //Expands all the accordion menu on click
  });


});