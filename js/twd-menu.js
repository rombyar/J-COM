$(function(){

	var menu = $('#twd-menu'),
		pos = menu.offset();

		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('normal')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('normal').addClass('fixed').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('fixed').addClass('normal').fadeIn('fast');
				});
			}
		});

});
