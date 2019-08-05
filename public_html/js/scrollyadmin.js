//admin js
var $nav = $( '.navbar' ),
    $navb = $('.navb'),
    $darkbg = $('.dark-bg'),
    $featured = $('.featured'),
    $main = $('.main'),
    $sidebar = $('.sidemenu'),
    $page = $('.page'),
    $sidecol = $('.side-col'),
    $sideInner = $('.side-inner');
var $topOffSet =  parseInt('180');
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

function addFeaturedHeight(){

    if ($featured.hasClass("shrink")) {
        $featureheight = '60';

    } else {
        $featureheight = '0';
    }
    return parseInt($featureheight);
}


function adjustSideHeight(){
    var top_of_element = $(".footwrap").offset().top;
    var bottom_of_element = $(".footwrap").offset().top + $(".footwrap").outerHeight();
    var bottom_of_screen = $(window).scrollTop() + $(window).height();


    if((bottom_of_screen > top_of_element) && (bottom_of_screen < bottom_of_element)){

        $sidecol.css({
            'height': ($maincol + "px")
        });
        $sidebar.css({
            'position':'relative',
            'margin-left':'15px'
        });
        $sideInner.css({
            'position':'absolute',
            'left':'0',
            'bottom':'-200px'
        });
    } else {
        $sidebar.css({'position':'fixed','margin-left':'0px'});
        $sideInner.css({'position':'relative', 'left':'0'});
    }
}

$(window).scroll(function () {

    //check side height and adjust
    adjustSideHeight();

    if (!$nav.hasClass("shrink")) {
        if ($(document).scrollTop() > 150) {
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


$(document).ready(function () {

    adjustSideHeight();

    $( window ).resize(function() {
        resizeSidebar();
    });

    $featureOffset = addFeaturedHeight();
    $topOffSet  = $topOffSet + $featureOffset;
    console.log($featureOffset);
    console.log("top off " + $topOffSet);

    $('.nav').on('affix-bottom.bs.affix', function(){
        alert('The navigation menu is about to return to its original bottom position - The .affix class is about to be replaced with .affix-bottom');
    });


    //smooth scroll
    $('a[href^="#"]:not(a[data-toggle])').bind('click.smoothscroll', function (e) {
        e.preventDefault();
        // console.log("click");
        if($nav.hasClass("shrink")){
            //   console.log("we are shrunk");
            headerHeight = $topOffSet;
        }else{
            // console.log("we are NOT shrunk");
            headerHeight = 150;
        }
        console.log(headerHeight);
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {

                var targetOffset = target.offset().top + (- headerHeight);
                //console.log(targetOffset);
                $('html,body').delay(0).animate({
                    scrollTop: targetOffset
                }, 1000);
            }
        }
        //            //scrollspy refresh
        //            $('[data-spy="scroll"]').each(function () {
        //                var $spy = $(this).scrollspy('refresh')
        //            })
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


            document.body.classList.remove('scroll-up');
        } else if (delta > 0 && scrollTop > 0) {
            // console.log("plus");
            document.body.classList.add('scroll-up');
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