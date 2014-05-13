(function($){})(window.jQuery);
$(document).ready(function (){
    submitted = false;

    /*home splash animations
    $('#robot-left').animate({left : 0,opacity: 1},2000);
    robotArms();
    $('#jumbotron').delay(1000).animate({opacity : 1},2000);
    $('#challenges').delay(2000).animate({'margin-top' : 0},1000);
    var scrollorama = $.scrollorama({
        blocks:'#splash,#sections-wrap,.page-content',
        enablePin: false
    });
    if($('#robot-wrap').length > 0) {
        scrollorama.animate('#robot-left',{ duration: 500, property:'margin-left', start: 0, end: '-800px' });
        scrollorama.animate('#robot-right',{ duration: 500, property:'margin-right', start: 0, end: '-800px' });
        scrollorama.animate('#jumbotron',{ duration: 500, property:'margin-top', end: 0 });
        if($(window).width() > 768) {
            scrollorama.animate('#jumbotron',{ duration: 500, property:'opacity', start: 1,  end: 0 });
            scrollorama.animate('#jumbotron',{ duration: 200, property:'padding-bottom',start:22, end: 120 });
            scrollorama.animate('#challenges > *',{ duration: 90, property:'opacity',start:0, end: 1 });
        }
        scrollorama.animate('.categories img',{ duration: 300, property:'zoom',start:.3, end: 1 });
        scrollorama.animate('#events-bar',{ duration: 1600, property:'margin-top',start: 200, end: 30 });
       // scrollorama.animate('.featured-event',{ duration: 1000, property:'zoom',start:.5, end: 1 });
    } else {
        scrollorama.animate('.page-content header',{ duration: 400, property:'margin-bottom', end: 100 });
    }*/



    // functions
    if($(window).width() >= 768) {
        fixedNav();
    }
    slideShow();
    mobileMenu();
    flyOut();
    email_Helper();


});
$(window).resize(function() {
    robotArms();
})


function fixedNav() {
    var element = $('#main-nav');
    var height = $('.navbar').height();
    height = height + 10;
    var distance = element.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ( $window.scrollTop() >= distance ) {
            element.addClass('fixed').css('background', '#f4f5f6');
            $('#robot-wrap, .page-content').css('margin-top',height);
        } else {
            element.removeClass('fixed').css('background', 'none');
            $('#robot-wrap, .page-content').css('margin-top',0);
        }
    });
}

function slideShow() {
    $('#teams-slider').slidesjs({
        width: $(this).attr('data-width'),
        height: $(this).attr('data-height'),
        navigation: {
            active: false
        },
        //auto : 10000,
        callback: {
            loaded: function(number) {
                $( '.slidesjs-pagination-item' ).each( function( index, element ) {
                    var target = $( element ).find( 'a' ),
                        title    = $('.slidesjs-slide').eq(index).find('h3 a').text();
                    $( target ).attr('title',title );
                });
            }
        },
        play: {
            effect: "slide",
            // [string] Can be either "slide" or "fade".
            interval: 7000,
            auto: true
        }
    });
}

function robotArms() {
        if($(window).width() >= 1200) {
            $('#robot-right').animate({right : '15px',opacity: 1},2000);
        } else if($(window).width() > 992 && $(window).width() < 1200) {
            $('#robot-right').animate({right : '-210px',opacity: 1},2000);
        } else if($(window).width() > 768 && $(window).width() < 992) {
            $('#robot-right').animate({right : '-349px',opacity: 1},2000);
            $('#robot-right').animate({top : '-105px',opacity: 1},2000);
        } else {
        }
}

function mobileMenu() {
    $('.mobile-menu').click(function() {
        $('#main-nav ul').slideToggle(600);
        if($('.mobile-menu').hasClass('glyphicon-chevron-down')) {
            $('#main-nav i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        } else {
            $('#main-nav i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        }
    })
}

function flyOut() {
    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $(document).height() - 150) {
            if($('.slide-out').length != 0) {
                $('.slide-out').fadeIn(300);
                $('.close').click(function() {
                    $('.slide-out').animate({right: '-500px'},500,function() {
                        $(this).remove();
                    });
                });
            }
        } else {
            $('.slide-out').fadeOut(300);
        }
    });
}


// email form
function email_Helper() {
    $('#hidden_iframe').load(function(){
        if(submitted == true){
            $('#contact-form').slideUp(300,function() {
                $('.alert').fadeIn(300,function() {
                    $(this).removeClass('alert-warning').addClass('alert-success').html('<h5>A TEST submission was made to this <a href="https://docs.google.com/spreadsheet/ccc?key=0AkPkNgTYyNARdHM2VWd4Q1pfaVAxV0s2QnUzVzZmZmc&usp=drive_web#gid=0" target="_blank">Google Spreadsheet</a></h5>').fadeIn(500);
                })
            });
        }
    });

    $('#contact-message').modal({
        show: false
    })
}