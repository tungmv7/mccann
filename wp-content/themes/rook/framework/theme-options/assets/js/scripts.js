(function ($, window, document, undefined) {
    'use strict';

    jQuery(document).ready(function ($) {

		// Portfolio Select
		jQuery( "select#nnn" ).change(function() {
			var str = "";
			str +=jQuery( "#nnn" ).val();


			if( str == "default"){
				jQuery(".ext-link , .video-link, #project_description, .project_client, .project_website, #single_project_setup, #_thcmb_project_description, #portfolio_extra_settings1, #_thcmb_aditional_project_description").fadeOut(300);
			}
		 
			 if( str == "direct"){
				  jQuery(".video-link").fadeIn(500).css("display","block");
				  jQuery(".ext-link, #project_description, .project_client, .project_website, #single_project_setup, #_thcmb_project_description, #portfolio_extra_settings1, #_thcmb_aditional_project_description").css("display","none");
			}
			
			if( str == "external"){
				jQuery(".ext-link").fadeIn(500).css("display","block");
				jQuery(".video-link, #project_description, .project_client, .project_website, #single_project_setup, #_thcmb_project_description, #portfolio_extra_settings1, #_thcmb_aditional_project_description").css("display","none");
			}
            if( str == "single_page"){
                jQuery(".ext-link").fadeOut(300);
                jQuery("#project_description, .project_client, .project_website, #single_project_setup, .video-link, #_thcmb_project_description, #portfolio_extra_settings1, #_thcmb_aditional_project_description").fadeIn(500).css("display","block");

            }

			
		}).trigger( "change" );
		

		  
		  

		//Masked Inputs (images as radio buttons)
		jQuery('.of-radio-img').click(function(){
			jQuery(this).parent().parent().find('.of-radio-img').removeClass('radio-img-selected');
			jQuery(this).addClass('radio-img-selected');
		});
		jQuery('.radio-label').hide();
		jQuery('.of-radio-img').show();
		jQuery('.img-radio').hide();  
		
		var i = jQuery("input[type=radio][name=portf_thumbnail]:checked").val();
		
		if (i=="portfolio-small"){
			jQuery("#small").addClass('radio-img-selected'); 
			jQuery("#vertical").removeClass('radio-img-selected');   			
		}
		if (i=="half-vertical"){
			jQuery("#vertical").addClass('radio-img-selected'); 
			jQuery("#small").removeClass('radio-img-selected');   			
		}

	});
   
}());

jQuery(document).ready(function ($) {
	
	jQuery('#_thcmb_gallery_post_descrition').fadeOut();
	jQuery('#_thcmb_video_post_description').fadeOut();
	jQuery('#_thcmb_audio_post_description').fadeOut();
	jQuery('#_thcmb_link_post_description').fadeOut();
		
		
	if(jQuery('#post-format-gallery').is(':checked')) {
		jQuery('#_thcmb_gallery_post_descrition').fadeIn();
		jQuery('#_thcmb_video_post_description').fadeOut();
		jQuery('#_thcmb_audio_post_description').fadeOut();
		jQuery('#_thcmb_link_post_description').fadeOut();
	}
	if(jQuery('#post-format-video').is(':checked')) {
		jQuery('#_thcmb_gallery_post_descrition').fadeOut();
		jQuery('#_thcmb_video_post_description').fadeIn();
		jQuery('#_thcmb_audio_post_description').fadeOut();
		jQuery('#_thcmb_link_post_description').fadeOut();
	}
	if(jQuery('#post-format-link').is(':checked')) {
		jQuery('#_thcmb_gallery_post_descrition').fadeOut();
		jQuery('#_thcmb_video_post_description').fadeOut();
		jQuery('#_thcmb_audio_post_description').fadeOut();
		jQuery('#_thcmb_link_post_description').fadeIn();
	}
	if(jQuery('#post-format-audio').is(':checked')) {
		jQuery('#_thcmb_gallery_post_descrition').fadeOut();
		jQuery('#_thcmb_video_post_description').fadeOut();
		jQuery('#_thcmb_audio_post_description').fadeIn();
		jQuery('#_thcmb_link_post_description').fadeOut();
	}
	
	jQuery("#formatdiv input").click(function () {
		var format = jQuery(this).val();
	  
		jQuery('#_thcmb_gallery_post_descrition').fadeOut();
		jQuery('#_thcmb_video_post_description').fadeOut();
		jQuery('#_thcmb_audio_post_description').fadeOut();
		jQuery('#_thcmb_link_post_description').fadeOut();
	  
		if (format == 'gallery') { jQuery('#_thcmb_gallery_post_descrition').fadeIn(); }
		if (format == 'video') { jQuery('#_thcmb_video_post_description').fadeIn(); }
		if (format == 'audio') { jQuery('#_thcmb_audio_post_description').fadeIn(); }
		if (format == 'link') { jQuery('#_thcmb_link_post_description').fadeIn(); }
	});
});
		

		