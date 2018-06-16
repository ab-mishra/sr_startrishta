/*******************************
PAGE PRELOADER
*******************************/
$(window).load(function() { // makes sure the whole site is loaded
    $('#status').fadeOut( "slow" ); // will first fade out the loading animation
    $('#preloader').fadeOut( "slow" ); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow':'visible'});
})

$(function(){
/*******************************
CONTENT MIN-HEIGHT
*******************************/
    function setHeight() {
        windowHeight = $(window).innerHeight();
        $('.main').css('min-height', windowHeight);
    };
    setHeight();
    
    $(window).resize(function() {
        setHeight();
    });

/*******************************
SIDEBAR
*******************************/
    //SIDEBAR TOGGLE
    $('.sidebar-switch').on('click', function () {
        if (parseInt($(window).width()) < 1169) {
            $('.wrapper').removeClass('sidebar-toggle');
            $('.wrapper').toggleClass('sidebar-toggle-sm');
        }
        else if (parseInt($(window).width()) > 1170) {
            $('.wrapper').toggleClass('sidebar-toggle');
        }
    });
    
    $(window).resize(function() {
        if ($(window).width() > 1169) {
            $('.wrapper').removeClass('sidebar-toggle-sm');
        }
        else if ($(window).width() < 1170) {
            $('.wrapper').removeClass('sidebar-toggle');
        }
    });

    //SIDEBAR CONTAINER & MESSENGER AUTO WINDOW HEIGHT
    $('.sidebar-container, .messenger-wrap, .messenger-content, .full-width-map') .css({'height': (($(window).height()))+'px'});
    $(window).resize(function(){
        $('.sidebar-container, .messenger-wrap, .messenger-content, .full-width-map') .css({'height': (($(window).height()))+'px'});
    });

    //SIDEBAR SCROLLPANE
    $('.sidebar-scrollpane').each(function() {
        $(this).jScrollPane({
            autoReinitialise: true
        })
        
        .bind('mousewheel',function(e){
            e.preventDefault();
        });
        
        var api = $(this).data('jsp');
        var throttleTimeout;
        $(window).bind('resize',function() {
            if (!throttleTimeout) {
                throttleTimeout = setTimeout(function(){
                    api.reinitialise();
                    throttleTimeout = null;
                },
                50
                );
            }
        });
    });
    
    //SIDEBAR NAVIGATION
    $('#sidebar-nav').metisMenu();
    
/*******************************
CONTENT ELEMENTS
*******************************/
    //MATCH HEIGHT - Match divs height on the same row
    $('.equal').matchHeight();
    
    //ACCORDION TOGGLE ICONS
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-plus fa-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    
    // TOOLTIP
    $('[data-toggle="tooltip"]').tooltip({
        animated : 'fade',
        container: 'body'
    });
    
    // POPOVER
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        html: true
    })
    
});//END



/*******************************
*******************************
LIMIT FORM CHARACTERS
*******************************
*******************************/
(function($){ 
    $.fn.extend({  
        limit: function(limit,element) {
            
            var interval, f;
            var self = $(this);
            
            $(this).focus(function(){
                interval = window.setInterval(substring,100);
            });
            
            $(this).blur(function(){
                clearInterval(interval);
                substring();
            });
            
            substringFunction = "function substring(){ var val = $(self).val();var length = val.length;if(length > limit){$(self).val($(self).val().substring(0,limit));}";
            if(typeof element != 'undefined')
                substringFunction += "if($(element).html() != limit-length){$(element).html((limit-length<=0)?'0':limit-length);}"
                    
            substringFunction += "}";
            
            eval(substringFunction);
            
            substring();
        } 
    }); 
})(jQuery);