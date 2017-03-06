var slider = document.getElementById("slider"),
		slider_pos = 1,
		body = document.getElementById("body"),
		overlay = document.getElementById("overlay"),
		overlay_wrapper = document.getElementById("overlay_wrapper"),
		houses = new Array(document.getElementById("house_1")),
		overlay_close = document.getElementById("overlay_close"),
		house_1_i_1 = document.getElementById("house_1_i_1"),
		house_1_i_2 = document.getElementById("house_1_i_2"),
		nr_houses, i;


function loadJs(a){
	var f = document.createElement('script'),
			s = document.getElementsByTagName("script")[0];
 		 
  f.type = 'text/javascript';
  f.async = true;
  f.src = a;
  s.parentNode.insertBefore(f, s);
}// end loadJs()	


window.onload = function() {
	var f = document.createElement('link'),
			h = document.getElementsByTagName('head')[0],
			motto_left = document.getElementById("motto_left"),
			motto_right = document.getElementById("motto_right"),
			about_us_right = document.getElementById("about_us_right"),
			frame_5 = document.getElementById("pentru_arhitecti"),
			frame_8_right = document.getElementById("frame_8_right");
	
	f.onload = function() {
		motto_left.className += ' motto_left_bg';
		motto_right.className += ' motto_right_bg';
		about_us_right.className += ' about_us_right_bg';
		frame_5.className += ' frame_5_bg';
		frame_8_right.className += ' frame_8_right_bg';
	}// end f.onload()
	
	f.type = 'text/css';
	f.rel = 'stylesheet';
	f.href = 'assets/normal/after.css';
	h.parentNode.insertBefore(f, h);
	
	//load the assets
	loadJs('assets/after.06121301.min.js');	
}// end window.onload()


nr_houses = houses.length;

for (i = 0; i < nr_houses; i++) {
	houses[i].onclick = function() {
		var img1 = img2 = new Array(), 
				imgs1, imgs2, j, n;
		
		// show the overlay screen
		body.className += "noscroll";
		overlay.className = overlay.className.replace("dn", "db");
		overlay_wrapper.className = overlay_wrapper.className.replace("dn", "db");
		
		// load first layer of images
		imgs1 = house_1_i_1.getElementsByTagName('img');
		n = imgs1.length;
		
		for (j = 0; j < n; j++) {
			img1[j] = new Image();
			
			img1[j].onload = function(j) { return function(e) {
				imgs1[j].src = this.src;
				imgs1[j].className = imgs1[j].className.replace('opacity0', 'opacity1');
			}}(j)//end img[j].onload
			
			img1[j].src = imgs1[j].getAttribute('data-src');
		}// end for
		
		// load second layer of images
		imgs2 = house_1_i_2.getElementsByTagName('img');
		n = imgs2.length;
		
		for (j = 0; j < n; j++) {
			img2[j] = new Image();
			
			img2[j].onload = function(j) { return function(e) {
				imgs2[j].src = this.src;
				imgs2[j].className = imgs2[j].className.replace('opacity0', 'opacity1');
			}}(j)//end img[j].onload
			
			img2[j].src = imgs2[j].getAttribute('data-src');
		}// end for
		
	}// end houses[i].onclick()
}// end for


function loadAssetsAfterScroll() {
	var gallery = document.getElementById("frame_6_gallery"),
			frame_7_img = document.getElementById("frame_7_img"),
			img = new Array(),
			n, i, imgs, f7img;
	
	// load frame 7 image
	f7img = new Image();
	
	f7img.onload = function() {
		frame_7_img.src = this.src;
		frame_7_img.className = frame_7_img.className.replace('opacity0', 'opacity1');
	}// end f7img.onload()
	f7img.src = frame_7_img.getAttribute('data-src');
	
	// load the gallery
	imgs = gallery.getElementsByTagName('img');
	n = imgs.length;
	
	for (i = 0; i < n; i++) {
		img[i] = new Image();
		
		img[i].onload = function(i) { return function(e) {
			imgs[i].src = this.src;
			imgs[i].className = imgs[i].className.replace('opacity0', 'opacity1');
		}}(i)//end img[j].onload
		
		img[i].src = imgs[i].getAttribute('data-src');
	}// end for
	
	window.onscroll = null; 
}// end loadAssetsAfterScroll()


window.onscroll = loadAssetsAfterScroll;


overlay_close.onclick = function() {
	// hide the overlay screen
	body.className = "";
	overlay.className = overlay.className.replace("db", "dn");
	overlay_wrapper.className = overlay_wrapper.className.replace("db", "dn");
}// end overlay_close.onclick()

