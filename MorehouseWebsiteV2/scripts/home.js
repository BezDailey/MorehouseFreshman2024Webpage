$(document).ready(function() {
    //$('#nav').hide();
    //$('#nav').slideDown(700);
    //$('#img_div_words').hide();
    //$('#img_div_words').fadeIn(600);
    var slideIndex = 1;
    var length = $('.slide:last').attr('id');
 
    $('.slide').hide();
    $('#1').show();
    updateCounter(slideIndex, length);

    $('.next').click(function(){
        prevIndex = slideIndex;
        nextIndex = slideIndex + 1;
        if(nextIndex >= length){
            nextIndex = length;
            hideSlide(prevIndex);
            showSlide(nextIndex);
            slideIndex = nextIndex
            updateCounter(slideIndex, length);
        } else {
            hideSlide(prevIndex); 
            showSlide(nextIndex);
            slideIndex = nextIndex
            updateCounter(slideIndex, length);
        }     
    });

    $('.prev').click(function(){
        prevIndex = slideIndex;
        nextIndex = slideIndex - 1;
        if(nextIndex <= 0){
            nextIndex = 1;
            hideSlide(prevIndex);
            showSlide(nextIndex);
            slideIndex = nextIndex
            updateCounter(slideIndex, length);
        } else {
            hideSlide(prevIndex); 
            showSlide(nextIndex);
            slideIndex = nextIndex;
            updateCounter(slideIndex, length);
        }   

    });

    $(window).on('scroll', function(){
        var $nav = $('#nav');
        var $logo_num = $('#logo_numbers');
        var $window = $(window);
        if ($window.scrollTop() > ($nav.height() / 2)) {
            $nav.removeClass('transparent_nav');
            $logo_num.addClass('logo_numbers_black');
            $logo_num.removeClass('logo_numbers_white');

        }
        if($window.scrollTop() < ($nav.height() / 2)) {
            $nav.addClass('transparent_nav');
            $logo_num.addClass('logo_numbers_white');
            $logo_num.removeClass('logo_numbers_black');
        }
    })

    if($(window).width() <= 480){
        $('#mobile_nav a').on('click', function(){
            $('#mobile_nav_links').slideToggle();
        });
    }

    if($(window).width() >= 481 && $(window).width() < 830) {
        $('#mobile_nav a').on('click', function(){
            $('#mobile_nav_links').slideToggle();
        });
    }

});

function showSlide(n) {
    $('#' + n).show();
};

function hideSlide(n){ 
    $('#' + n).hide();
};

function updateCounter(n, length) {
    $('.slide_number').text(n + '/' + length);
}