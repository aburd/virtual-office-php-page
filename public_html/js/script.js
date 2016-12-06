// JavaScript Document

var resizeFlag = true;

$(function(){

	// smooth scroll
	$('.smooth').bind('click',function(event){
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1000,'easeInOutExpo');
		event.preventDefault();
	});

	// video stop when modal close
	$('#youtubeOne').on('shown.bs.modal', function (e) {
		var src = $('#videowrapperOne').attr('data-iframe-src');
		$('#videowrapperOne').attr('src', src);
	});
	$('#youtubeOne').on('hidden.bs.modal', function (e) {
		$('#videowrapperOne').attr('src', '');
	});

	$('#youtubeThree').on('shown.bs.modal', function (e) {
		var src = $('#videowrapperThree').attr('data-iframe-src');
		$('#videowrapperThree').attr('src', src);
	});
	$('#youtubeThree').on('hidden.bs.modal', function (e) {
		$('#videowrapperThree').attr('src', '');
	});
	
	// slide reset number
	$('#youtubeTwo').on('show.bs.modal', function (e) {
		$('.carousel').carousel(0);
	});

});

$(window).on("load resize", function(){

	var xsMarker = $(".xs-marker").css("display");

	if(xsMarker == "none") { // tablet & pc
		
		// accordion
		$("#accordion").accordion("destroy");
		
		resizeFlag = true;

	} else { // smart phone
		
		if(resizeFlag) {
			
			// accordion
			$("#accordion").accordion({
				autoHeight: false,
				collapsible: true,
				active: 10,
			});
			
			resizeFlag = false;
		}
		
	}
  
});

