
<style>
.premium-box{ width:100%; height:auto; background:#fff;  }
.premium-features{}
.premium-heading{  color: #484747;font-size: 40px;padding-top: 35px;text-align: center;text-transform: uppercase;}
.premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
.premium-features li .detail{ width:50%; }
.premium-features li .img-box{ width:50%; }

.premium-features li:nth-child(odd) { background:#f4f4f9; }
.premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
.premium-features li:nth-child(odd) .detail .inner-detail{}
.premium-features li:nth-child(odd) .detail p{ }
.premium-features li:nth-child(odd) .img-box{ float:left; text-align:right;}

.premium-features li:nth-child(even){  }
.premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
.premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
.premium-features li:nth-child(even) .detail p{ float:right;} 
.premium-features li:nth-child(even) .img-box{ float:right;}

.premium-features .detail{}
.premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0;}
.premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
/**images**/
.add_particular_badge{ background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/add_particular_badge.png); width:500px; height:272px; display:inline-block; margin-right: 25px; margin-top: -2px; background-repeat:no-repeat;}

.hide_the_default_wooCommerce{ background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/hide_the_default_wooCommerce.png); width:426px; height:188px; display:inline-block; background-size:500px auto; margin-right:30px; margin-top: 6px; background-repeat:no-repeat;}

.hide_badge_in_single_product_page{ background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/hide_badge_in_single_product_page.png); width:500px; height:130px; display:inline-block; margin-top: 5px; background-repeat:no-repeat;}

.add_specific_badge_to_each_product{background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/add_specific_badge_to_each_product.png); width:500px; height:493px; display:inline-block; margin-right:30px; margin-top: 2px; background-repeat:no-repeat;}

.upload_your_own_badge_image_choices{background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/upload_your_own_badge_image_choices.png); width:541px; height:442px; display:inline-block;margin-top:-6px; background-repeat:no-repeat;}

.set_badge_container_position_opacity {background:url(<?php echo PHBGPLUG_PATH; ?>assets/images/set_badge_container_position_opacity.png); width:498px; height:178px; display:inline-block; margin-right:30px; margin-top: 5px; background-repeat:no-repeat;}




/*upgrade css*/

.upgrade{background:#f4f4f9;padding: 50px 0; width:100%; clear: both;}
.upgrade .upgrade-box{ background-color: #808a97;
    color: #fff;
    margin: 0 auto;
   min-height: 110px;
    position: relative;
    width: 60%;}

.upgrade .upgrade-box p{ font-size: 15px;
     padding: 19px 20px;
    text-align: center;}

.upgrade .upgrade-box a{background: none repeat scroll 0 0 #6cab3d;
    border-color: #ff643f;
    color: #fff;
    display: inline-block;
    font-size: 17px;
    left: 50%;
    margin-left: -150px;
    outline: medium none;
    padding: 11px 6px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    top: 36%;
    width: 277px;}

.upgrade .upgrade-box a:hover{background: none repeat scroll 0 0 #72b93c;}

.premium-vr{ text-transform:capitalize;} 


.premium-box-head {
    background: #eae8e7 none repeat scroll 0 0;
    height: 500px;
    text-align: center;
    width: 100%;
}
.pho-upgrade-btn {
    display: block;
    text-align: center;
}
.pho-upgrade-btn a {
    display: inline-block;
    margin-top: 75px;
}
.main-heading {
    background: #fff none repeat scroll 0 0;
    margin-bottom: -70px;
    text-align: center;
}
.main-heading img {
    margin-top: -200px;
}
.premium-box-container {
    margin: 0 auto;
}
.premium-box-container .description:nth-child(2n+1) {
    background: #fff none repeat scroll 0 0;
}
.premium-box-container .description {
    display: block;
    padding: 35px 0;
    text-align: center;
    position: relative;
}
.premium-box-container .pho-desc-head::after {
    background: rgba(0, 0, 0, 0) url("<?php echo $plugin_dir_url; ?>assets/images/head-arrow.png") no-repeat scroll 0 0;
    content: "";
    height: 98px;
    position: absolute;
    right: 58px;
    top: 30px;
    width: 69px;
}

.premium-box-container .pho-desc-head h2 {
    color: #02c277;
    font-size: 28px;
    font-weight: bolder;
    margin: 0;
    text-transform: capitalize;
}
.pho-plugin-content {
    margin: 0 auto;
    overflow: hidden;
    width: 768px;
}

.pho-plugin-content p {
    color: #212121;
    font-size: 18px;
    line-height: 32px;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url("<?php echo $plugin_dir_url; ?>assets/images/image-frame-odd.png") no-repeat scroll 100% top;
}


.description .pho-plugin-content .pho-img-bg {
    border-radius: 5px 5px 0 0;
    height: auto;
    margin: 0 auto;
    padding: 70px 0 40px;
    width: 750px;
}
.pho-plugin-content img {
    max-width: 100%;
    width: auto;
}

.premium-box-container .description:nth-child(2n) {
    background: #eae8e7 none repeat scroll 0 0;
}
.premium-box-container .description:nth-child(2n) .pho-img-bg {
    background: #f1f1f1 url("<?php echo $plugin_dir_url; ?>assets/images/image-frame-even.png") no-repeat scroll 100% top;
}
.pho-upgrade-btn {
    display: block;
    text-align: center;
}
.pho-upgrade-btn a {
    display: inline-block;
    margin-top: 75px;
}

.pho-upgrade-btn > a:focus {
	box-shadow: none !important;
}


</style>

<div class="premium-box">

<div class="premium-box-head">
<div class="pho-upgrade-btn">
<a target="_blank" href="http://www.phoeniixx.com/product/badge-management-for-woocommerce"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
<a target="blank" href="http://badgemanagement.phoeniixxdemo.com/"><img src="<?php echo $plugin_dir_url; ?>assets/images/button2.png" /></a>
</div>
</div>

<div class="main-heading"><h1><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-head.png" /></h1></div>

<div class="premium-box-container">
<div class="description">
                <div class="pho-desc-head"><h2><?php _e('Add Particular Badge to &#39;Recent&#39;, &#39;Featured&#39; or &#39;On Sale&#39; Products','badge-management'); ?>
</h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php _e(' Highlight your &#39;Recent&#39;, &#39;Featured&#39; or &#39;On Sale&#39; Products using attractive badges. Just select a badge of your choice in the backend and it will be assigned to items belonging to the given category.','badge-management'); ?>
      
    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/add_particular_badge.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
 
 <div class="description">
                <div class="pho-desc-head"><h2><?php _e('Hide the Default WooCommerce &#39;On Sale&#39; Badge','badge-management'); ?> </h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php _e(' Don&#39;t want to have the Default &#39;On Sale&#39; Badge of WooCommerce? This feature lets you simply hide it in the backend.','badge-management'); ?>
    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/hide_the_default_wooCommerce.png" />
                        </div>
                    </div>
            </div> <!-- description end -->  
            
  <div class="description">
                <div class="pho-desc-head"><h2><?php _e('Hide Badge in Single Product Page','badge-management'); ?> </h2></div>
                
                    <div class="pho-plugin-content">
                       <p><?php _e(' If, in case, you don&#39;t want a badge to display on each and every product page, you could simply select this option and stop the badge from displaying on individual product pages.','badge-management'); ?>
      
    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/hide_badge_in_single_product_page.png" />
                        </div>
                    </div>
            </div> <!-- description end -->  
            
         
  <div class="description">
                <div class="pho-desc-head"><h2><?php _e('Add Specific Badge to each Product Category ','badge-management'); ?></h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
      <?php _e('You may want to place a Badge on all the items belonging to a particular product category. This feature lets you do exactly that.','badge-management'); ?>

    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/add_specific_badge_to_each_product.png" />
                        </div>
                    </div>
            </div> <!-- description end -->    
            
  <div class="description">
                <div class="pho-desc-head"><h2><?php _e('Upload Your Own Badge Image or Pick One From Available Choices','badge-management'); ?> </h2></div>
                
                    <div class="pho-plugin-content">
                      <p>
		<?php _e('You could either upload & place a badge of your choice on your products, or could pick one from the nine available options.','badge-management'); ?>
    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/upload_your_own_badge_image_choices.png" />
                        </div>
                    </div>
            </div> <!-- description end -->                                      


<div class="description">
                <div class="pho-desc-head"><h2><?php _e('Set Badge Container, Position & Opacity','badge-management'); ?> </h2></div>
                
                    <div class="pho-plugin-content">
                      <p>
      <?php _e('This option lets you style your badges as per your liking. You could set the badge container&#39;ts Border Radius, Padding &#38; Opacity and could also decide its position & opacity.','badge-management'); ?>
    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/set_badge_container_position_opacity.png" />
                        </div>
                    </div>
            </div> <!-- description end -->  
            
 
 
 
 <div class="pho-upgrade-btn">

 
        <a target="_blank" href="http://www.phoeniixx.com/product/badge-management-for-woocommerce"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
		<a target="blank" href="http://badgemanagement.phoeniixxdemo.com/"><img src="<?php echo $plugin_dir_url; ?>assets/images/button2.png" /></a>
        </div>
 
            
</div> <!-- premium-box-container -->           



</div>