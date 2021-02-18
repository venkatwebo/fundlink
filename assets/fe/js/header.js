(function ($) {
    "use strict";
    /*------------------------------------------------------------------
    [Table of contents]
    -------------------------------------------------------------------*/


    /*==========================================================
     navigation
     ======================================================================*/
    if ($("#navigation1").length > 0) {
        $("#navigation1").navigation({
            effect: "fade",
            mobileBreakpoint: 992,
        });

 
        // menu scrolling

        if($('.scrolls').length > 0){
            $('.scrolls').on ('click',function () {
                $('html, body').animate({scrollTop: $(this.hash).offset().top -100}, 1000);
                return false;
            });
        }
    
    }




 	/*=============================================================
			fixed header
	=========================================================================*/
    $(window).on('scroll', function () {
        /**Fixed header**/
        
            if ($(window).scrollTop() > 100) {
                $('.header').addClass('fixed-header animated fadeInDown');
            } else {
                $('.header').removeClass('fixed-header animated fadeInDown');
            }

            if ($(window).width() < 991) {
                $('.header').removeClass('fixed-header animated fadeInDown');
            }
        
    });


    /*=============================================================
            wow animation init
    =========================================================================*/
/*    $(function(){
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true,
            scrollContainer: null,
        });
        wow.init();
    });*/
    

})(jQuery);