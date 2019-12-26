<style type="text/css">
	.required {

    color: #828186 !important;

}
</style>
<div class="os-row">
  <?php echo OsFormHelper::text_field('customer[first_name]', __('Nombre', 'latepoint'), $booking->customer->first_name, array('class' => 'required'), array('class' => 'os-col-6')); ?>
  <?php echo OsFormHelper::text_field('customer[last_name]', __('Apellidos', 'latepoint'), $booking->customer->last_name, array('class' => 'required'), array('class' => 'os-col-6')); ?>
  <?php echo OsFormHelper::text_field('customer[phone]', __('Teléfono', 'latepoint'), $booking->customer->formatted_phone, array('class' => 'os-mask-phone'), array('class' => 'os-col-6 os-col-sm-12')); ?>
  <?php echo OsFormHelper::text_field('customer[email]', __('Email', 'latepoint'), $booking->customer->email, array('class' => 'required'), array('class' => 'os-col-6 os-col-sm-12')); ?>
   <?php 
	  if(isset($custom_fields_for_customer) && !empty($custom_fields_for_customer)){
	    foreach($custom_fields_for_customer as $custom_field){
	    	$required_class = ($custom_field['required'] == 'on') ? 'required' : '';

	    	if ($custom_field['id'] == "cf_TuuaLXH1"){

		    	switch ($custom_field['type']) {
		    		case 'text':
					    echo OsFormHelper::text_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
					   
		    			break;
		    		case 'textarea':
					    echo OsFormHelper::textarea_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
		    			break;
		    		case 'select':
					    echo OsFormHelper::select_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], OsFormHelper::generate_select_options_from_custom_field($custom_field['options']), $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
			    		break;
		        case 'checkbox':
		          echo OsFormHelper::checkbox_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], 'on', ($booking->customer->get_meta_by_key($custom_field['id'], 'off') == 'on') , ['class' => $required_class], array('class' => $custom_field['width']));
		          break;
		    	}
	    	}
	    	if ($custom_field['id'] == "cf_W5Ai9SKf"){

		    	switch ($custom_field['type']) {
		    		case 'text':
					    echo OsFormHelper::text_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
					   
		    			break;
		    		case 'textarea':
					    echo OsFormHelper::textarea_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
		    			break;
		    		case 'select':
					    echo OsFormHelper::select_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], OsFormHelper::generate_select_options_from_custom_field($custom_field['options']), $booking->customer->get_meta_by_key($custom_field['id'], ''), ['class' => $required_class, 'placeholder' => $custom_field['placeholder']], array('class' => $custom_field['width']));
			    		break;
		        case 'checkbox':
		          echo OsFormHelper::checkbox_field('customer[custom_fields]['.$custom_field['id'].']', $custom_field['label'], 'on', ($booking->customer->get_meta_by_key($custom_field['id'], 'off') == 'on') , ['class' => $required_class], array('class' => $custom_field['width']));
		          break;
		    	}
	    	}
	    } 
	  }?>
  <?php echo OsFormHelper::textarea_field('customer[notes]', __('Comentarios', 'latepoint'), '', array(), array('class' => 'os-col-12')); ?>
 
</div>
<script type="text/javascript">


</script>