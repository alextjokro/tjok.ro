$(function() {

	function projectBackground() {
		$('.project__header--bg').height($('.project__header').height() * 0.975);
		$('.project__details--bg').height($('.project__details').height() * 0.7);
	}

	// For every element that needs to use matchHeight.js
	function equalHeight() {
		$('.project__overview--col').matchHeight();
	}

	// Please place all the responsive functions here
	function respond() {
    projectBackground();
	}

	$(document).ready(function() {
		respond();
		equalHeight();
	});

	$(window).load(function() {

	});

	$(window).resize(function() {
		respond();
		
	});

	$(window).scroll(function() {
		
	});

}(jQuery))