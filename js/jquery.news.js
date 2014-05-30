$(document).ready(function() {
$(".main_image .desc").show(); //Show Banner
$(".main_image .block").animate({ opacity: 0.65 }, 1 ); $(".image_thumb ul li:first").addClass('active'); //runs function on click
$(".image_thumb ul li").click(function () {
var imgAlt = $(this).find('img').attr("alt");
var imgTitle = $(this).find('a').attr("href");
var imgDesc = $(this).find('.block').html();
var imgDescHeight = $(".main_image").find('.block').height();

if ($(this).is(".active")) {
return false;
} else {
$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
$(".main_image .block").html(imgDesc).animate({ opacity: 0.85, marginBottom: "0" }, 250 );
$(".main_image img").attr({ src: imgTitle , alt: imgAlt});
});
}

$(".image_thumb ul li").removeClass('active');
$(this).addClass('active');
return false;$active = $(this);
slideSwitchClick();
})
.hover(function(){

$(this).addClass('hover');
clearInterval(playSlideshow);
playSlideshow = setInterval('slideSwitchTimed()', 7000 );
}, function() {
$(this).removeClass('hover');
});

//runs function, set timer here
$(function() {
playSlideshow = setInterval('slideSwitchTimed()', 7000 );
});
});

function slideSwitchTimed() {
$active = $('.image_thumb ul li.active').next();
if ( $active.length == 0 ) $active = $('.image_thumb ul li:first');
slideSwitch();
}

function slideSwitchClick() {
slideSwitch();
}

function slideSwitch() {
var $prev = $('.image_thumb ul li.active');

//Show active list-item
$prev.removeClass('active');
$active.addClass('active');

//Set Variables
var imgAlt = $active.find('img').attr("alt");
var imgTitle = $active.find('a').attr("href");
var imgDesc = $active.find('.block').html();
var imgDescHeight = $(".main_image").find('.block').height();

if ($(this).is(".active")) {
return false;
} else {

$(".main_image img").animate({ opacity: 0}, 250 );
$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
$(".main_image .block").html(imgDesc).animate({ opacity: 0.85, marginBottom: "0" }, 250 );
$(".main_image img").attr({ src: imgTitle , alt: imgAlt}).animate({ opacity: 1}, 250 );
});
}
return false;
}