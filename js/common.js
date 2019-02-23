// type anything here
var text = 'LasPegas';

// this function turns a string into an array
var createLetterArray = function createLetterArray(string) {
  return string.split('');
};

// this function creates letter layers wrapped in span tags
var createLetterLayers = function createLetterLayers(array) {
  return array.map(function (letter) {
    var layer = '';
    //specify # of layers per letter
    for (var i = 1; i <= 2; i++) {
      // if letter is a space
      if (letter == ' ') {
        layer += '<span class="word space"></span>';
      } else {
        layer += '<span class="word letter-' + i + '">' + letter + '</span>';
      }
    }
    return layer;
  });
};

// this function wraps each letter in a parent container
var createLetterContainers = function createLetterContainers(array) {
  return array.map(function (item) {
    var container = '';
    container += '<div class="wrapper">' + item + '</div>';
    return container;
  });
};

// use a promise to output text layers into DOM first
var outputLayers = new Promise(function (resolve, reject) {
  document.getElementById('text').innerHTML = createLetterContainers(createLetterLayers(createLetterArray(text))).join('');
  resolve();
});

// then adjust width and height of each letter
var spans = Array.prototype.slice.call(document.getElementsByClassName('word'));
outputLayers.then(function () {
  return spans.map(function (span) {
    setTimeout(function () {
      span.parentElement.style.width = span.offsetWidth + 'px';
      span.parentElement.style.height = span.offsetHeight + 'px';
    }, 250);
  });
}).then(function () {
  // then slide letters into view one at a time
  var time = 250;
  return spans.map(function (span) {
    time += 75;
    setTimeout(function () {
      span.parentElement.style.top = '0px';
    }, time);
  });
});

$( () => {
	
	//On Scroll Functionality
	$(window).scroll( () => {
		var windowTop = $(window).scrollTop();
		windowTop > 100 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
		windowTop > 100 ? $('ul').css('top','100px') : $('ul').css('top','160px');
	});
	
	//Click Logo To Scroll To Top
	$('.logo').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		},500);
		e.preventDefault();
	});
	
	//Toggle Menu
	$('#menu-toggle').on('click', () => {
		$('#menu-toggle').toggleClass('closeMenu');
		$('ul').toggleClass('showMenu');
		
		$('li').on('click', () => {
			$('ul').removeClass('showMenu');
			$('#menu-toggle').removeClass('closeMenu');
		});
	});
	
});