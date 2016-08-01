$(document).ready(function(){
	$('.main-slider').slick({
		autoplay: true,
		dots: true,
		arrows: false
	});
});

$('.partners').slick({
  dots: false,
  arrows: true,
  infinite: false,
  autoplay: true,
  speed: 1000,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  ]
});


$('.fade').slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  adaptiveHeight: true
});


openMenu = function(){
	var menu = document.getElementById("hidden");
	console.log(menu.getAttribute("style"));
	if(menu.getAttribute("style") == "display: block"){
		menu.setAttribute("style","display: none");
	} else{
		menu.setAttribute("style","display: block");
	}
}

$(function() {
  var ele = $('#energy');
  var clr = null;
  var rand = 123456788991231;
  (loop = function() {
    clearTimeout(clr);
    (inloop = function() {
      ele.html(rand+=1);
      if(!(rand % 50)) {
        return;
      }
      clr = setTimeout(inloop, 30);
    })(); 
    setTimeout(loop, 10);
  })();
});

