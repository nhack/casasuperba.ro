$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 101
        }, 1000);
        return false;
      }
    }
  });
});


function slide() {
var next_pos = slider_pos + 1;

if (next_pos > 6) {
	next_pos = 1;
}// end if

$('#slider').fadeTo('slow', 0.3, function() {
		    $(this).css('background-image', 'url(http://assets.casasuperba.ro/slider_'  + next_pos + '.05121301.jpg)');
}).fadeTo('slow', 1);

//$('#slider').css('background-image', 'url(slider_'  + next_pos + '.jpg)');

slider_pos = next_pos;
}// end slider()

window.setInterval(function(){slide()}, 5000);