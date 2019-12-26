<div class="os-form-sub-header"><h3><?php _e('Step Editing', 'latepoint'); ?></h3></div>
<div class="steps-ordering-w" data-step-order-update-route="<?php echo OsRouterHelper::build_route_name('settings', 'udpate_order_of_steps'); ?>">
	<?php
	foreach($steps as $step){ ?>
		<div class="step-w" data-step-name="<?php echo $step->name; ?>" data-step-order-number="<?php echo $step->order_number; ?>">
			<div class="step-head">
				<div class="step-drag"></div>
				<div class="step-name"><?php echo $step->title; ?></div>
				<?php if($step->name == 'locations' && (OsLocationHelper::count_locations() <= 1)){ ?>
					<a href="<?php echo OsRouterHelper::build_link(OsRouterHelper::build_route_name('locations', 'index') ); ?>" class="step-message"><?php _e('Como solo tienes una ubicación, este paso se omitirá.', 'latepoint'); ?></a>
				<?php } ?>
				<?php if($step->name == 'payment' && !OsSettingsHelper::is_accepting_payments()){ ?>
					<a href="<?php echo OsRouterHelper::build_link(OsRouterHelper::build_route_name('settings', 'payments') ); ?>" class="step-message"><?php _e('El procesamiento de pagos está deshabilitado. Haga clic para configurar.', 'latepoint'); ?></a>
				<?php } ?>
				<button class="step-edit-btn"><i class="latepoint-icon latepoint-icon-edit-3"></i></button>
			</div>
			<div class="step-body">
				<div class="os-form-w">
				  <form data-os-action="<?php echo OsRouterHelper::build_route_name('settings', 'update_step'); ?>" action="">
				  	<div class="os-row">
				  		<div class="os-col-6">
								<?php echo OsFormHelper::text_field('step[title]', __('Título del paso', 'latepoint'), $step->title, ['add_string_to_id' => $step->name]); ?>
				  		</div>
				  		<div class="os-col-6">
								<?php echo OsFormHelper::text_field('step[sub_title]', __('Sutitulo del paso', 'latepoint'), $step->sub_title, ['add_string_to_id' => $step->name]); ?>
				  		</div>
				  	</div>
		        <?php echo OsFormHelper::textarea_field('step[description]', __('Descripción corta', 'latepoint'), $step->description, ['add_string_to_id' => $step->name]); ?>
				  	<div class="os-row">
				  		<div class="os-col-12">
				  			<?php echo OsFormHelper::checkbox_field('step[use_custom_image]', __('Usar imagen de paso personalizada', 'latepoint'), 'on', $step->is_using_custom_image(), ['data-toggle-element' => '.custom-step-image-w-'.$step->name, 'add_string_to_id' => $step->name], ['class' => 'toggle-element-outside']); ?>
				  		</div>
				  	</div>
				  	<div class="os-row custom-step-image-w-<?php echo $step->name; ?>" style="<?php echo ($step->is_using_custom_image()) ? '' : 'display: none;'; ?>">
				  		<div class="os-col-12">
				  			<div class="os-form-group">
					        <?php echo OsFormHelper::media_uploader_field('step[icon_image_id]', 0, __('Imagen del paso', 'latepoint'), __('Remove Image', 'latepoint'), $step->icon_image_id); ?>
					      </div>
					  	</div>
				  	</div>
		        <?php echo OsFormHelper::hidden_field('step[name]', $step->name, ['add_string_to_id' => $step->name]); ?>
		        <?php echo OsFormHelper::hidden_field('step[order_number]', $step->order_number, ['add_string_to_id' => $step->name]); ?>
		        <div class="os-form-buttons">
			        <?php echo OsFormHelper::button('submit', __('Guardar paso', 'latepoint'), 'submit', ['class' => 'latepoint-btn', 'add_string_to_id' => $step->name]);  ?>
			        <a href="#" class="latepoint-btn latepoint-btn-secondary step-edit-cancel-btn"><?php _e('Cancelar', 'latepoint'); ?></a>
			      </div>
					</form>
				</div>
			</div>
		</div><?php
	}
	?>
</div>
<div class="os-form-w">
  <form action="" data-os-action="<?php echo OsRouterHelper::build_route_name('settings', 'update'); ?>">
		<div class="os-form-sub-header"><h3><?php _e('Other Step Settings', 'latepoint'); ?></h3></div>
		<?php echo OsFormHelper::checkbox_field('settings[steps_show_service_categories]', __('Mostrar categorías de servicio', 'latepoint'), 'on', (OsSettingsHelper::get_settings_value('steps_show_service_categories') == 'on')); ?>
		<?php echo OsFormHelper::checkbox_field('settings[steps_show_agent_bio]', __('Show Agent Bio Popup', 'latepoint'), 'on', (OsSettingsHelper::get_settings_value('steps_show_agent_bio') == 'on')); ?>
		<?php echo OsFormHelper::checkbox_field('settings[steps_hide_registration_prompt]', __('Ocultar el mensaje "Crear cuenta" en el paso de confirmación', 'latepoint'), 'on', (OsSettingsHelper::get_settings_value('steps_hide_registration_prompt') == 'on')); ?>
		<?php echo OsFormHelper::checkbox_field('settings[steps_hide_login_register_tabs]', __('Eliminar las pestañas de inicio de sesión / registro en el paso de información de contacto', 'latepoint'), 'on', (OsSettingsHelper::get_settings_value('steps_hide_login_register_tabs') == 'on')); ?>
		<?php echo OsFormHelper::checkbox_field('settings[steps_hide_agent_info]', __('No mostrar el nombre del experto en los pasos de resumen y confirmación', 'latepoint'), 'on', OsSettingsHelper::is_on('steps_hide_agent_info')); ?>
    <?php echo OsFormHelper::checkbox_field('settings[allow_any_agent]', __('Añadir la opción "Cualquier experto" a la selección de experto', 'latepoint'), 'on', OsSettingsHelper::is_on('allow_any_agent'), array('data-toggle-element' => '.lp-any-agent-settings')); ?>
    <div class="lp-form-checkbox-contents lp-any-agent-settings" <?php echo (OsSettingsHelper::is_on('allow_any_agent')) ? '' : 'style="display: none;"' ?>>
      <h3><?php _e('Cualquier configuración de experto', 'latepoint'); ?></h3>
      <?php echo OsFormHelper::select_field('settings[any_agent_order]', __('Si "Cualquier experto" seleccionó Asignar a', 'latepoint'), [ 
        LATEPOINT_ANY_AGENT_ORDER_RANDOM => __('Aleatoria', 'latepoint'),
        LATEPOINT_ANY_AGENT_ORDER_PRICE_HIGH => __('El experto mas caro', 'latepoint'),
        LATEPOINT_ANY_AGENT_ORDER_PRICE_LOW => __('Experto menos caro', 'latepoint'),
        LATEPOINT_ANY_AGENT_ORDER_BUSY_HIGH => __('Experto con la mayoría de las reservas en ese día', 'latepoint'),
        LATEPOINT_ANY_AGENT_ORDER_BUSY_LOW => __('Experto con menos reservas en ese día.', 'latepoint') ], OsSettingsHelper::get_any_agent_order()); ?>
    </div>
		<?php echo OsFormHelper::wp_editor_field('settings[steps_support_text]', 'settings_steps_support_text', __('Información extra en lightbox', 'latepoint'), OsSettingsHelper::get_steps_support_text(), array('editor_height' => 100)); ?>
		<?php echo OsFormHelper::button('submit', __('Guardar cambios', 'latepoint'), 'submit', ['class' => 'latepoint-btn']); ?>
	</form>
</div>
