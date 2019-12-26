<div class="step-contact-w latepoint-step-content">
	<?php if(isset($booking) && $booking->customer_id){ ?>
		<div class="step-contact-logged-in-header-w">
	  	<div><?php _e('Información de contacto', 'latepoint'); ?></div>
	  	<span><?php _e('', 'latepoint'); ?></span><a data-btn-action="<?php echo OsRouterHelper::build_route_name('bookings', 'logout_customer'); ?>" style="font-size: 11px" href="#" class="step-customer-logout-btn"><?php _e('Cerrar sesión', 'latepoint'); ?></a>
	  </div>
	  <?php include ('_contact_form.php'); ?>
	<?php }else{ ?>
		 		<script>
			  
			   		
			   		if (variableJS == "/activacion-2/"){
			   			 document.getElementById("registro").style.display = "none";
			   			 document.getElementById("registro-data").style.display = "none";
			   			 document.getElementById("login").style.display = "block !important";
			   			
			   		}else{
			   			document.getElementById("login").style.display = "none";
			   		}
			   		if (variableJS == "/proyectos/"){
			   			document.getElementById("registro").style.display = "none";
			   			document.getElementById("login-tab").style.display = "none";
			   			document.getElementById("tabs-cita").style.display = "none";
			   		}
			   	</script>
	  <div class="os-step-tabs-w">
	  	<?php if(OsSettingsHelper::get_settings_value('steps_hide_login_register_tabs') != 'on'){ ?>
			  <div class="os-step-tabs" id="tabs-cita">


		
			  	<div class="os-step-tab active" data-target=".os-step-new-customer-w" id="registro" ><?php _e('Registrate', 'latepoint'); ?></div>
			  	<div class="os-step-tab " data-target=".os-step-existing-customer-login-w" id="login-tab"><?php _e('Iniciar Sesión', 'latepoint'); ?></div>
			  </div>
			
			<?php } ?>
		  <div class="os-step-tab-content os-step-new-customer-w" id="registro-data">
			  <?php include ('_contact_form.php'); ?>
		  </div>
	  	<?php if(OsSettingsHelper::get_settings_value('steps_hide_login_register_tabs') != 'on'){ ?>
			  <div class="os-step-tab-content os-step-existing-customer-login-w" id="login">
				  <div class="os-row">
				    <?php echo OsFormHelper::text_field('customer_login[email]', __('Correo', 'latepoint'), '', array('class' => 'required'), array('class' => 'os-col-12')); ?>
				    <?php echo OsFormHelper::password_field('customer_login[password]', __('Contraseña', 'latepoint'), '', array('class' => 'required'), array('class' => 'os-col-12')); ?>
				  </div>
					<div class="os-form-buttons os-flex os-space-between">
				    <a data-btn-action="<?php echo OsRouterHelper::build_route_name('bookings', 'login_customer'); ?>" href="#" class="latepoint-btn latepoint-btn-primary step-login-existing-customer-btn"><?php _e('Iniciar', 'latepoint'); ?></a>
						<a href="#" class="latepoint-btn-link" style="font-size: 10px;" data-os-action="<?php echo OsRouterHelper::build_route_name('customers', 'request_password_reset_token'); ?>" data-os-output-target=".os-password-reset-form-holder" data-os-after-call="latepoint_reset_password_from_booking_init" data-os-params="<?php echo OsUtilHelper::build_os_params(['from_booking' => true]) ?>"><?php _e('Olvidaste tu contraseña?', 'latepoint'); ?></a>
					</div>
				</div>
				<div class="os-password-reset-form-holder"></div>
			<?php } ?>		</div>
		<?php if(OsSettingsHelper::is_using_google_login() || OsSettingsHelper::is_using_facebook_login()){ ?>
		  <div class="os-social-or"><span><?php _e('OR', 'latepoint'); ?></span></div>
		  <div class="os-social-login-options">
		  	<?php if(OsSettingsHelper::is_using_facebook_login()){ ?>
			  	<a href="#" id="facebook-signin-btn" data-login-action="<?php echo OsRouterHelper::build_route_name('bookings', 'login_customer_using_facebook_token'); ?>" class="os-social-login-facebook os-social-login-option"><i class="latepoint-icon latepoint-icon-facebook"></i><span><?php _e('Login with Facebook', 'latepoint'); ?></span></a>
			  <?php } ?>
		  	<?php if(OsSettingsHelper::is_using_google_login()){ ?>
			  	<a href="#" id="google-signin-btn" data-login-action="<?php echo OsRouterHelper::build_route_name('bookings', 'login_customer_using_google_token'); ?>" class="os-social-login-google os-social-login-option"><i class="latepoint-icon latepoint-icon-google"></i><span><?php _e('Login with Google', 'latepoint'); ?></span></a>
			  <?php } ?>
		  </div>
		<?php } ?>
	<?php } ?>
</div>
<?php if(!isset($no_params)) include '_booking_params.php'; ?>