(function ($) {

   $(document).ready(function () {
      var activeItem = $('.sub-nav .active');
      if (activeItem.length) {
         $('.sub-nav.menu-open').scrollTop(activeItem.position().top - 60);
      }
   });

})(jQuery);

