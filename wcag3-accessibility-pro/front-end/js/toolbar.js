(function($){
    $(function(){
        $('#wcag3ap-toolbar .font-inc').on('click', function(){
            $('body').css('font-size', '+=2');
        });
        $('#wcag3ap-toolbar .font-dec').on('click', function(){
            $('body').css('font-size', '-=2');
        });
        $('#wcag3ap-toolbar .contrast').on('click', function(){
            $('body').toggleClass('wcag3ap-high-contrast');
        });
    });
})(jQuery);
