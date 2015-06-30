/*!
 * Start Bootstrap - Grayscale Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".headerTopContacts").addClass("headerPageContacts");
        $(".navbar-header").addClass("navbar-header-scroll");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".headerTopContacts").removeClass("headerPageContacts");
        $(".navbar-header").removeClass("navbar-header-scroll");
    }
});
$(window).scroll(function() {

    if (window.h < $(document).scrollTop() + 100) {
        $(".menu_m").addClass("main_mScrole");
    } else {
        $(".menu_m").removeClass("main_mScrole");
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(window).scroll(function(){
    //var h = $('.navigBot').offset().top;
    var top = $(document).scrollTop();
    //console.log($(document).scrollTop());
    //console.log("-------------");
    if($('.navigBot').attr('data-type') == 'absolute'){
        window.h = $('.navigBot').offset().top;
    }
    if($('.navigBot').attr('data-type') == 'fixed'){

    }
   // console.log(h);
    if(window.h < $(document).scrollTop() + 100){
        $('.navigBot').attr('data-type','fixed');
        $('.navigBot').css({'position':'fixed','top':'108px'/*,'background':'#fff'*/})
    }
    if(window.h > $(document).scrollTop() + 100){
        //$('.navigBot').attr('data-type','absolute');
        $('.navigBot').css({'position':'absolute','bottom':'10px','top':'initial','background':'rgba(0,0,0,0)'})
    }

if ($(document).scrollTop() > 100) {
        if($(".height").is(':visible')){
            $(".navigBot").css({height: "45px"});

            $(".h").css({display: "block"});

        }
    }
    if($(document).scrollTop() < 100){

        $(".navigBot").css({height: "0px"});

        $(".h").css({display: "none"});

    }

});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

function initialize() {

    var myLatlng = new google.maps.LatLng(59.934602, 30.334607);
    var mapOptions = {
        center: new google.maps.LatLng(59.934602, 30.334607),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"Ditlogistic"
    });
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE&callback=initialize";
    document.body.appendChild(script);
}

window.onload = loadScript;

$(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function() {
        $('body,html').animate({scrollTop: 0}, 1000);
    });

    $('.smoothScroll').click(function(event) {
        event.preventDefault();
        var href=$(this).attr('href');
        var target=$(href);
        var top=target.offset().top;
        $('html,body').animate({
            scrollTop: top
        }, 1000);
    });
});

$(document).ready(function(){

    var unslider = jQuery('.text').unslider({
        speed: 500,               //  The speed to animate each slide (in milliseconds)
        delay: 3000,              //  The delay between slide animations (in milliseconds)
        complete: function() {},  //  A function that gets called after every slide animation
        keys: false,              //  Enable keyboard (left, right) arrow shortcuts
        dots: false,              //  Display dot navigation
        fluid: false              //  Support responsive design. May break non-responsive designs
    });

     jQuery('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        //alert(fn);
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider.data('unslider')[fn]();
        return false;
    });

    var unslider_1 = jQuery('.review').unslider({
        speed: 500,               //  The speed to animate each slide (in milliseconds)
        delay: 3000,              //  The delay between slide animations (in milliseconds)
        complete: function() {},  //  A function that gets called after every slide animation
        keys: false,              //  Enable keyboard (left, right) arrow shortcuts
        dots: false,              //  Display dot navigation
        fluid: false              //  Support responsive design. May break non-responsive designs
    });

     jQuery('.unslider-arrow-1').click(function() {
        var fn = this.className.split(' ')[1];
        //alert(fn);
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider_1.data('unslider')[fn]();
        return false;
    });


});