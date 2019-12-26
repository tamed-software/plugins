<div class="os-password-reset-form-w">
	<?php if($from_booking){ ?>
		<a href="#" class="password-reset-back-to-login"><span><?php _e('cancelar', 'latepoint'); ?></span><i class="latepoint-icon latepoint-icon-common-01"></i></a>
	<?php } ?>
	<h4 style="    font-size: 13px;    margin-top: 9px;    color: #828186;    font-weight: bold !important;"><?php _e('Solicitud de reestablecimiento de contraseña', 'latepoint'); ?></h4>
	<?php if(isset($reset_token_error) && $reset_token_error) echo '<div class="os-form-message-w status-error">'.$reset_token_error.'</div>'; ?>
	<p style="font-size: 12px; text-align: justify; color: #828186 !important;"><?php _e("Te enviaremos una clave secreta. Una vez que lo reciba, puede usarlo para cambiar su contraseña.", 'latepoint'); ?></p>
	<?php if($from_booking){ ?>
		<?php echo OsFormHelper::text_field('password_reset_email', __('Email', 'latepoint')); ?>
		<?php echo OsFormHelper::hidden_field('from_booking', true); ?>
		<div class="os-form-buttons os-flex os-space-between">
			<a href="#" data-os-action="<?php echo OsRouterHelper::build_route_name('customers', 'request_password_reset_token'); ?>" data-os-output-target=".os-password-reset-form-holder" data-os-source-of-params=".os-password-reset-form-w" class="latepoint-btn latepoint-btn-primary" ><?php _e('Solicitar', 'latepoint'); ?></a>
			<a href="#" class="latepoint-btn-link" style="margin-left: 17px;    font-size: 10px;" data-os-params="<?php echo OsUtilHelper::build_os_params(['from_booking' => true]) ?>" data-os-action="<?php echo OsRouterHelper::build_route_name('customers', 'password_reset_form'); ?>" data-os-output-target=".os-password-reset-form-holder"><?php _e('¿Ya tienes una llave?', 'latepoint'); ?></a>
		</div>
	<?php }else{ ?>
		<form action="" data-os-action="<?php echo OsRouterHelper::build_route_name('customers', 'request_password_reset_token'); ?>" data-os-output-target=".latepoint-login-form-w">
			<?php echo OsFormHelper::text_field('password_reset_email', __('Email Address', 'latepoint')); ?>
			<div class="os-form-buttons os-flex os-space-between">
				<?php echo OsFormHelper::button('submit', __('Solicitar', 'latepoint'), 'submit', ['class' => 'latepoint-btn']); ?>
				<a href="#" class="latepoint-btn-link" data-os-action="<?php echo OsRouterHelper::build_route_name('customers', 'password_reset_form'); ?>" data-os-output-target=".latepoint-login-form-w"><?php _e('¿Ya tienes una llave?', 'latepoint'); ?></a>
			</div>
		</form>
	<?php } ?>
</div>