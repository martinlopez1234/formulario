// JavaScript Document
jQuery(document).ready(function() {
	
	var biztoViewPortWidth = '',
		biztoViewPortHeight = '';

	function biztoViewport(){

		biztoViewPortWidth = jQuery(window).width(),
		biztoViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( biztoViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var biztoSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var biztoSiteHeaderWidth = jQuery('.site-header').width();
			var biztoSiteHeaderPadding = ( biztoSiteHeaderWidth * 2 )/100;
			var biztoMenuHeight = jQuery('.menu-container').height();
			
			var biztoMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var biztoMenuPadding = ( biztoSiteHeaderHeight - ( (biztoSiteHeaderPadding * 2) + biztoMenuHeight ) )/2;
			var biztoMenuButtonsPadding = ( biztoSiteHeaderHeight - ( (biztoSiteHeaderPadding * 2) + biztoMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':biztoMenuPadding});
			jQuery('.site-buttons').css({'padding-top':biztoMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		biztoViewport();
		
	});
	
	biztoViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( biztoViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

		
	
});		