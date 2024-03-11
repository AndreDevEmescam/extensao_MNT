(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/
    try {
       //Sidenav
$('#menu-button').click(function(e){
    e.stopPropagation();
     $('#hide-menu').toggleClass('show-menu');
     $('#overlay').removeClass('d-none');
});
$('#hide-menu').click(function(e){
    e.stopPropagation();
});
$('body,html,#link-close').click(function(e){
       $('#hide-menu').removeClass('show-menu');
       $('#overlay').addClass('d-none');
});
    
    } catch(er) {console.log(er);}
    /*[ Select 2 Config ]
        ===========================================================*/
    
    try {
        var selectSimple = $('.js-select-simple');
    
        selectSimple.each(function () {
            var that = $(this);
            var selectBox = that.find('select');
            var selectDropdown = that.find('.select-dropdown');
            selectBox.select2({
                dropdownParent: selectDropdown
            });
        });
    
    } catch (err) {
        console.log(err);
    }
    

})(jQuery);