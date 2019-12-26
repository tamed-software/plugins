jQuery(document).ready(function(){

	

	jQuery('.images').css('position','relative');
	 jQuery('.thumbnails.columns-3 a:first-child').hide();
	//jQuery( "<p>Test</p>" ).appendTo( "img" );

	if(jQuery('#check_post').val()==1||jQuery('#edit_value').val()==1)
	{
		jQuery("#postdivrich").hide();
		jQuery("#postimagediv").hide();
		jQuery("#edit-slug-box").hide();

		// jQuery("span:contains('phoe_badge')").replaceWith("<span>Badge Options</span");
	}
	

	/******************add color picker in textboxes****************/
        jQuery('.color-field').wpColorPicker({
    	change: function(event, ui) {
      	jQuery("#inner_pre").css("background-color",ui.color.toString()); 
       
   	 }});



	jQuery('.color-field-txt').wpColorPicker({
    	change: function(event, ui) {
      	jQuery("#inner_pre").css("color",ui.color.toString()); 
       
   	 }});
	
	
	jQuery("h2 a").click(function(){


	jQuery("h2 a").removeClass("nav-tab-active");
	jQuery(this).addClass("nav-tab nav-tab-active");
});


	
	/*************************************** show the text in preview pane*************************************/

	jQuery("#b_text").keyup(function(){
			jQuery("#inner_pre").text(jQuery(this).val());

		});
	/****************************************************change the size of inner pane********************************************/

		jQuery("#size_w").keyup(function(){
			jQuery("#inner_pre").css("width",jQuery(this).val());

		});


		jQuery("#size_h").keyup(function(){
			jQuery("#inner_pre").css("height",jQuery(this).val());

		});
	/***************************************change the position of inner pane**************************************************/
		
		jQuery('#badge_pos').on("change",function(){

			var pos=jQuery('#badge_pos').val();
	

			if(pos=='bottom-left')
			{

				jQuery('#inner_pre').css({"bottom":"0","top":'auto',"left":'0',"right":'auto'});
			}
			else if(pos=='top-left')
			{

				jQuery('#inner_pre').css({"top":"0","bottom":'auto',"left":'0',"right":'auto'});
			}
			else if(pos=='top-right')
			{

				jQuery('#inner_pre').css({"top":"0","right":'0',"left":'auto',"bottom":'auto'});
			}
			else if(pos=='bottom-right')
			{

				jQuery('#inner_pre').css({"bottom":"0","right":'0',"left":'auto','top':'auto'});
			}



			
		

		});

		jQuery('#badge_pos1').on("change",function(){




					var pos=jQuery('#badge_pos1').val();
	

			if(pos=='bottom-left')
			{

				jQuery('#inner_pre1').css({"bottom":"0","top":'auto',"left":'0',"right":'auto'});
			}
			else if(pos=='top-left')
			{

				jQuery('#inner_pre1').css({"top":"0","bottom":'auto',"left":'0',"right":'auto'});
			}
			else if(pos=='top-right')
			{

				jQuery('#inner_pre1').css({"top":"0","right":'0',"left":'auto',"bottom":'auto'});
			}
			else if(pos=='bottom-right')
			{

				jQuery('#inner_pre1').css({"bottom":"0","right":'0',"left":'auto','top':'auto'});
			}

		
		
	});
/**************************************** this will switch between image and text tab*******************************/

	jQuery("#btn-image").click(function(){
				

			//alert(jQuery("#badge_type").val());
			jQuery("#badge_type").val("2");
			jQuery("#txt-content").hide();
			jQuery("#img-content").show();
			jQuery("#btn-image").css({"border-left":"solid 1px","border-top":"solid 1px","border-right":"solid 1px","background-color":"white"});
			jQuery("#btn-text").css({"border-left":"none","border-top":"none","border-right":"none","background-color":"#F0F0F0"});
		});
	jQuery("#btn-text").click(function(){
			
				//alert(jQuery("#badge_type").val());
			jQuery("#badge_type").val("1");
			jQuery("#txt-content").show();
			jQuery("#img-content").hide();
			jQuery("#btn-text").css({"border-left":"solid 1px","border-top":"solid 1px","border-right":"solid 1px","background-color":"white"});
			jQuery("#btn-image").css({"border-left":"none","border-top":"none","border-right":"none","background-color":"#F0F0F0"});
		});
    jQuery("td img").click(function(){
		
				jQuery("#pre_img").attr("src",jQuery(this).attr("src"));
				jQuery("#pre_img").attr("height",jQuery(this).attr("height"));
				jQuery("#pre_img").attr("width",jQuery(this).attr("width"));
				jQuery("#img_path").val(jQuery(this).attr("alt"));
				
			
			
	});


jQuery('#badge_form').submit(function(){


	

});

    
jQuery('#title').keyup(function(){


	var a=jQuery("#title").val();
	jQuery("#b_title").val(a);

});

	
jQuery('#premium').click(function(){

	
	jQuery('#setting_div').hide();
});
jQuery('#more_plugin').click(function(){

	
	jQuery('#setting_div').hide();
});

jQuery('#setting').click(function(){

	
	jQuery('#setting_div').show();
});
	
    
});


