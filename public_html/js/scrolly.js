var $nav = $( '.navbar' ),
    $navb = $('.navb'),
    $darkbg = $('.dark-bg'),
    $featured = $('.featured'),
    $main = $('.main'),
    $sidebar = $('.sidemenu'),
    $page = $('.page'),
    $sidecol = $('.side-col'),
    $sideInner = $('.side-inner');
    $body = $('body');
var $topOffSet =  parseInt('170');
var $maincol = parseInt($('.main-outer').css('height'),10);
var $darkbgShrunk = parseInt($('.dark-bg.shrink').css('height'),10);
var $featuredShrunk = parseInt($('.featured.shrink').css('height'),10);
var $sidecolH = $('.side-col').css('height');
var sidecolW = parseInt($('.side-col').css('width'),10);
var padTop = 0;
//var $sideHeightExcludeClasses = ["pages", "blog"];
//var $bodyClass = $('body').attr('class');
var lastScrollTop = 0;
var sidecolright = "";
var $sidebarHeight = parseInt($('.sidemenu').css('height'),10);
//
var PageHeight = parseInt($('.page').css('height'),10);
var $footerContainer = $('.footer');
//var $scrollTop = $(window).scrollTop();

//$(window).scroll(function() {
//
//});

function resizeSidebar(){

    var top_of_element = $(".footwrap").offset().top;
    var bottom_of_element = $(".footwrap").offset().top + $(".footwrap").outerHeight();
    var bottom_of_screen = $(window).scrollTop() + $(window).height();

    if((bottom_of_screen > top_of_element) && (bottom_of_screen < bottom_of_element)){


        console.log($maincol);
        $sidecol.css({
            'height': $maincol + "px"
        });
        $sidebar.css({
            'position':'relative',
            'margin-left':'15px'
        });
        $sideInner.css({
            'position':'absolute',
            'left':'0',
            'bottom':'0'
        });
    } else {
        $sidebar.css({'position':'fixed','margin-left':'0px'});
        $sideInner.css({'position':'relative', 'left':'0'});
    }

}

function adjustSideHeight(){


    if($sidebarHeight > '300'){
        console.log("fixed side menu");
    }
    var top_of_element = $(".footwrap").offset().top;
    var bottom_of_element = $(".footwrap").offset().top + $(".footwrap").outerHeight();
    var bottom_of_screen = $(window).scrollTop() + $(window).height();



    if((bottom_of_screen > top_of_element) && (bottom_of_screen < bottom_of_element)){

        $sidecol.css({
            'height': ($maincol + "px")
        });
        $sidebar.css({
            'position':'relative',
            'margin-left':'17px'
        });
        $sideInner.css({
            'position':'absolute',
            'left':'0',
            'bottom':'-300px'
        });
    } else {
        //fixes overscroll ruber band issue and menu jump
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 50) {

            $sidebar.css({'position':'relative'});

        }else {

            $sidebar.css({'position': 'fixed', 'margin-left': '0px'});
            $sideInner.css({'position': 'relative', 'left': '0'});
        }
    }
}

$(window).scroll(function () {
    //check side height and adjust
    adjustSideHeight();

    if (!$nav.hasClass("shrink")) {
        if ($(document).scrollTop() > 50) {
            $nav.addClass('shrink');
            $navb.addClass('shrink');
            $darkbg.addClass('shrink');
            $featured.addClass('shrink');
            $main.addClass('shrink');
            $sidebar.addClass('shrink ');
            $('.nav li').removeClass('first');
        }
    } else if ($nav.hasClass("shrink")) {


        if ($(document).scrollTop() < 50) {
            $darkbg.removeClass('shrink');
            $featured.removeClass('shrink');
            $main.removeClass('shrink');
            $navb.removeClass('shrink').delay(900);
            $nav.removeClass('shrink').delay(900);
            $('.nav li:first-child').addClass('first');
            $sidebar.removeClass('shrink');
        }
    }
});

function addFeaturedHeight(){

    $featuredHeight = '0';
    if($('div.featured.shrink').length) {
        $featuredHeight = '60';
        console.log('featured is  showing SHRUNK');
    }else if($('div.featured').length) {
        $featuredHeight = '230';
        console.log('featured is showing large');
    }
    return parseInt($featuredHeight);
}

function refreshScrollSpy() {
    $('[data-spy="scroll"]').each(function () {
        $(this).scrollspy('refresh');
    });
};

//$('body').on('activate.bs.scrollspy', function () {
//    if($('body').hasClass("pages")) {
//        console.log('spy');
//        $('body').addClass("nudgeme") ;
//
//    }
//})

//catch incomg about page hash links
//if ( window.location.hash ){
//
//    function fixspy(){
//    var spydata = $body.data('bs.scrollspy');
//    offset = parseInt('350');
//        if (spydata) {
//            // adjust the body's padding top to match
//            $('main').css('padding-top', '360px');
//            // change the data's offset option to match
//            data.options.offset = offset;
//            // now stick it back in the element
//            $body.data('bs.scrollspy', data);
//            // and finally refresh scrollspy
//            $body.scrollspy('refresh');
//        }
//    }
//
//var resizeTimer;
//$(window).resize(function() {
//    clearTimeout(resizeTimer);
//    resizeTimer = setTimeout(fixSpy, 200);
//});

if ( window.location.hash ) {
    $('body').on('activate.bs.scrollspy', function () {

        $('.main-outer').css('padding-top', $topOffSet);
        console.log('scrollspy actived');
    })
}
function pushFooterDown(){
    if($('aside#nav').hasClass('sidemenu')){
        $('.footwrap').css({
            'margin-top': "390px"
        });
    }

}

$(document).ready(function () {


    adjustSideHeight();

    $( window ).resize(function() {
      //  resizeSidebar();
    });

//Deasl with scrollspy resize for incoming hash urls to about page
//    if($('body').hasClass("pages")) {
//        if ( window.location.hash ) scroll(0,0);
//        setTimeout( function() { scroll(0,0); }, 1);
//}
    //smooth scroll
    $('a[href^="#"]:not(a[data-toggle])').bind('click.smoothscroll', function (e) {
        e.preventDefault();
       // console.log("click");
        $featheight = addFeaturedHeight();
        headerHeight = ($featheight + $topOffSet);
        if($('body').hasClass("pages")){

        }

        if($nav.hasClass("shrink")){
           // console.log("we are shrunk");
            headerHeight = $topOffSet;
        }else{
            //console.log("we are NOT shrunk");
            headerHeight = $topOffSet;
        }



        //console.log(headerHeight);

        // $('.footwrap').css({
        //     'margin-top': "390px"
        // });

       // console.log('header offset height is ' + headerHeight);

        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {

                var targetOffset = target.offset().top + (- headerHeight);
                if($('body').hasClass("pages")){
                    var targetOffset = targetOffset - 50;
                }
              //  console.log("target Offset" + targetOffset);
                $('html,body').delay(0).animate({
                    scrollTop: targetOffset
                }, 1000);
            }
        }

    });
}); //end doc ready


//detect minus ruber band scroll?
(function(document, window) {
    var scrollTop   = 0;
    var resetTimer  = null;

    function resetScrollTop() {
        scrollTop = 0;
    }

    document.body.addEventListener('mousewheel', function(evt) {
        window.clearTimeout(resetTimer);

        var delta = evt.wheelDelta;
        var deltaX = evt.deltaX;
        scrollTop += deltaX;

       // console.log(scrollTop);

        if (delta < 0 && scrollTop <= 0) {

            //too jumpy to use
         //   console.log("minus");
         //   $sidecol.fadeIn();
         //   $sidecol.css({
         //       'height': ($maincol + 100) + "px"
         //   });
         //   $sidebar.css({
         //       'position':'relative',
         //       'margin-left':'15px'
         //   });
         //   $sideInner.css({
         //       'position':'absolute',
         //       'left':'0',
         //       'bottom':'0'
         //   });


            document.body.classList.add('scroll-up');
        } else if (delta > 0 && scrollTop > 0) {
           // console.log("plus");
            document.body.classList.remove('scroll-up');
        }

        window.setTimeout(resetScrollTop, 100);
    });
})(document, window);

////tooltips
//$(function () {
//    $('[data-toggle="tooltip"]').tooltip()
//})
//
//// stop dropdown closing
//$(document).on('click', ' .dropdown-menu', function (e) {
//    e.stopPropagation();
//});

// ake all extrnal links blank window
jQuery(document).ready(function($) {
    $('a')
        .filter('[href^="http"], [href^="//"]')
        .not('[href*="' + window.location.host + '"]')
        .attr('rel', 'noopener noreferrer')
        .attr('target', '_blank');
});

// fix footer sidebar colision
function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}
$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == getDocHeight()) {
        //$(window).unbind('scroll');
        console.log("near bottom!");
        pushFooterDown();
    }
});
