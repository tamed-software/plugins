<?php

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}

session_start();
ob_start(); 
	
/************************ this will handle all the task related to front end************************/

/***************************

this function will show the badge on product

************************/

/* function phbg_single_post()
{
	phbg_post_single();	
} */

/* function phbg_post_single()
{
	$ur= $_SERVER['REQUEST_URI'];
	wp_dequeue_style('my-onsale-style');
	$ur=explode("/",$ur);
	if (!in_array("product", $ur))
	{
		$row['option_value']=get_option('_phoe_badge_onsale');
		if(($row['option_value']=='1'))
	 	 {
			?>
			<script>
			jQuery(document).ready(function(){
			jQuery(".onsale").css("display","none");
			});
			</script>
	<?php 	}



		$prod_id=get_the_ID();
		$post_thumbnail_id = get_post_thumbnail_id( $prod_id,'shop_thumbnail' );	
		echo "<div style='position:relative;height:auto; width:auto;'><img class='attachment-shop_catalog wp-post-image' src='". wp_get_attachment_url( $post_thumbnail_id )."'>";
		$res=get_post_meta($prod_id,'_phoe_badge_name');
		if($res[0])
		{
			$my_res=get_post_meta($res[0],'_phoe_badge');
			$my_res=$my_res[0];
			if($my_res)
			{
			 	$check_sql=get_post_status($res[0]);
			 	  if($check_sql!='trash')
			 	  {			
					if($my_res)
					{
						$row=json_decode($my_res);
						$s1=phbg_set_pos($row->position);					
						?>
						<script>
						jQuery(document).ready(function(){
						jQuery(".post-<?php echo $prod_id ?> .onsale").css("display","none");
						});
						</script>
						<?php
					
						if($row->type=='text')
						{
					
							echo "<div  style='".$s1." background-color:".$row->bg_color."; text-align:center; color:".$row->txt_color."; height:".$row->height."px; width:".$row->width."px;'><p style='position: relative;   top: 50%;   transform: translateY(-50%);'>".$row->text."</p></div>";
						}
						else
						{
							echo "<div style='".$s1."'><img src='".PHBGPLUG_PATH."assets/images/".$row->img."' style='margin:0px;'> </div>";					
						}
					}
				}
		 	}	
	    	}
		
		echo"</div>";
	}


} */

function phbg_product_post( $val, $product_id )
{
	
	//remove_action( 'post_thumbnail_html', 'phbg_single_post',10 , 2 );
	
	if(!is_object($product_id=='')){
		$product_id=get_the_ID();
	}
	//echo $prod_id=get_the_ID();	
	/* $prod_id=get_the_ID();	
	
	$p_badge=get_p_badge($prod_id);
	
	$post_thumbnail_id = get_post_thumbnail_id( $prod_id,'medium' );
	
	$src=wp_get_attachment_url( $post_thumbnail_id );

	echo'<a href="'.$src.'" itemprop="image" class="pzmp_magnifier_zoom woocommerce-main-image" title="mo2"><div class="my_badge" style="position:relative;"><img src="'.$src.'" class="attachment-shop_single wp-post-image" alt="mo2" height="119" width="212">'; echo $p_badge;echo'</div></a>'; */

	/* if ( strpos( $val, 'phoe-badge' ) > 0 )
		
		return $val;
 */
	//$product_id = $this->get_wpml_parent_id( $product_id );
	
	/* $id_badge   = ( isset( $bm_meta[ 'id_badge' ] ) ) ? $bm_meta[ 'id_badge' ] : ''; */

	$badge_container = "<div class='phoe-badge' style='position:relative;'>" . $val;
	
	ob_start();
	
	$badge_content   = get_p_badge($product_id);
	
	$badge_content .= ob_get_clean();

	if ( empty( $badge_content ) )
		
	return $val;

	$badge_container .= $badge_content . "</div>";

	return $badge_container;
	
	
}


/************************* this function will return the badge for single product page*************************************/

function get_p_badge($prod_id)
{
	$badge_sale=get_option('_phoe_badge_onsale');
	
	if(($badge_sale=='1')) 
	{
?>
		<script>
		jQuery(document).ready(function(){
			jQuery(".onsale").css("display","none");
		});
		</script>
<?php 
	}
		
	$res=get_post_meta($prod_id,'_phoe_badge_name');
	
	if(isset($res[0]) && $res[0])
	{	
		$check_sql=get_post_status($res[0]);
		$res=get_post_meta($res[0],'_phoe_badge');
		$res=isset($res[0])?$res[0]:'';

		if($check_sql!='trash')
		{
			if($res)
			{	
				?>
				<script>
				jQuery(document).ready(function(){

				jQuery(".post-<?php echo $prod_id ?> .onsale").css("display","none");
				jQuery("img").mouseout(function(){
				jQuery('img#img_badge').attr('srcset',jQuery("#img_badge_src").val());
				});
					
				});
				</script>
				<?php
				$row=json_decode($res);
				$s1=phbg_set_pos($row->position);

				if(isset($row->type) && $row->type=='text')
				{
					return "<div  style='".$s1." background-color:".$row->bg_color."; text-align:center; color:".$row->txt_color."; height:".$row->height."px; width:".$row->width."px;'><p style='position: relative;   top: 50%;   transform: translateY(-50%);'>".$row->text."</p></div>";
				}
				else
				{
					return "<div style='".$s1."'><input type='hidden' id='img_badge_src' value='".PHBGPLUG_PATH."assets/images/".$row->img."'><img src='".PHBGPLUG_PATH."assets/images/".$row->img."' style='margin:0px;'> </div>";
				
				}
			}
		}
	}		
}
?>