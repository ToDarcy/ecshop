$(function($) {
	$('.nav-list li').click(function() {
		$(this).toggleClass('active').siblings().removeClass('active');
		
	});
	$('.sidemenu-header').click(function() {
		//		$(this).toggleClass('active');
		$('.main-left').toggleClass('active');
		var header = $('.main-left').outerWidth();
		$.cookie("menuheader", header);
		if ($(this).parent().hasClass('active')) {
			$('.main-content').addClass('active');
		} else {
			$('.main-content').removeClass('active');
		}
	});
	$(".nav-list").collapse("show");
	//tabmenu
	$('.main-sidemenu-list li').click(function() {
		$('.main-content-content').hide().eq($('.main-sidemenu-list li').index(this)).show();
	})
	$(".main-collapse").click(function(){
		$('.main-content-sidemenu').toggleClass("active");
		$('.main-content-content').toggleClass("select");
		$(this).toggleClass("active");
	});
});

//cookie
$(function($) {
	//menu-state
	var header = $('.main-left').outerWidth();
	if($.cookie("menuheader") != undefined){
		//cookie记录的index
		if ($.cookie("menuheader") > 50) {
			$('.main-left').addClass('active');
			$('.main-content').addClass('active');
		} else {
			$('.main-left').removeClass('active');
			$('.main-content').removeClass('active');
		}
		$.cookie("menuheader", header);
	}
	else{
		$.cookie("menuheader", header);
	}
	//menu-state
	$('.main-left').find('.nav-list li').click(function() {
		$('.main-left').find('.nav-list li').removeClass('active');
		var index = $('.main-left').find('.nav-list li').index(this);
		$.cookie("current", index);
		$(this).addClass("active");
	});
	//cookie记录的index
	if ($.cookie("current") != null) {
		var num = $.cookie("current");
		$('.main-left').find('.nav-list li').eq(num).addClass('active').siblings().removeClass('active');
	}
});

//pjax
$(function() {
	$('#loading').hide();
	$(document).pjax('a', '#pjax-container');
});