<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: spacing
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SP_WPCP_Field_spacing' ) ) {
	class SP_WPCP_Field_spacing extends SP_WPCP_Fields {

		/**
		 * Spacing field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		/**
		 * Function to render the field.
		 *
		 * @return void
		 */
		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'top_icon'           => '<i class="fa fa-long-arrow-up"></i>',
					'right_icon'         => '<i class="fa fa-long-arrow-right"></i>',
					'bottom_icon'        => '<i class="fa fa-long-arrow-down"></i>',
					'left_icon'          => '<i class="fa fa-long-arrow-left"></i>',
					'all_text'           => '<i class="fa fa-arrows"></i>',
					'top_placeholder'    => esc_html__( 'top', 'wp-carousel-pro' ),
					'right_placeholder'  => esc_html__( 'right', 'wp-carousel-pro' ),
					'bottom_placeholder' => esc_html__( 'bottom', 'wp-carousel-pro' ),
					'left_placeholder'   => esc_html__( 'left', 'wp-carousel-pro' ),
					'all_placeholder'    => esc_html__( 'all', 'wp-carousel-pro' ),
					'top'                => true,
					'left'               => true,
					'bottom'             => true,
					'right'              => true,
					'unit'               => true,
					'min'                => '0',
					'all'                => false,
					'units'              => array( 'px', '%', 'em' ),
				)
			);

			$default_values = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'all'    => '',
				'unit'   => 'px',
				'min'   => '',
			);

			$value = wp_parse_args( $this->value, $default_values );

			echo $this->field_before();

			$min = ( isset( $args['min'] ) ) ? ' min="' . $args['min'] . '"' : '';
			if ( ! empty( $args['all'] ) ) {

				$placeholder = ( ! empty( $args['all_placeholder'] ) ) ? ' placeholder="' . $args['all_placeholder'] . '"' : '';

				echo '<div class="spf--input">';
				echo ( ! empty( $args['all_text'] ) ) ? '<span class="spf--label spf--label-icon">' . $args['all_text'] . '</span>' : '';
				echo '<input type="number" name="' . $this->field_name( '[all]' ) . '" value="' . $value['all'] . '"' . $placeholder . $min . ' class="spf-number" />';
				echo ( count( $args['units'] ) === 1 && ! empty( $args['unit'] ) ) ? '<span class="spf--label spf--label-unit">' . $args['units'][0] . '</span>' : '';
				echo '</div>';

			} else {

				$properties = array();

				foreach ( array( 'top', 'right', 'bottom', 'left' ) as $prop ) {
					if ( ! empty( $args[ $prop ] ) ) {
						$properties[] = $prop;
					}
				}

				$properties = ( $properties === array( 'right', 'left' ) ) ? array_reverse( $properties ) : $properties;

				foreach ( $properties as $property ) {

					$placeholder = ( ! empty( $args[ $property . '_placeholder' ] ) ) ? ' placeholder="' . $args[ $property . '_placeholder' ] . '"' : '';

					echo '<div class="spf--input">';
					echo ( ! empty( $args[ $property . '_icon' ] ) ) ? '<span class="spf--label spf--label-icon">' . $args[ $property . '_icon' ] . '</span>' : '';
					echo '<input type="number" name="' . $this->field_name( '[' . $property . ']' ) . '" value="' . $value[ $property ] . '"' . $placeholder . $min . ' class="spf-number" />';
					echo ( count( $args['units'] ) === 1 && ! empty( $args['unit'] ) ) ? '<span class="spf--label spf--label-unit">' . $args['units'][0] . '</span>' : '';
					echo '</div>';

				}
			}

			if ( ! empty( $args['unit'] ) && count( $args['units'] ) > 1 ) {
				echo '<select name="' . $this->field_name( '[unit]' ) . '">';
				foreach ( $args['units'] as $unit ) {
					$selected = ( $value['unit'] === $unit ) ? ' selected' : '';
					echo '<option value="' . $unit . '"' . $selected . '>' . $unit . '</option>';
				}
				echo '</select>';
			}

			echo '<div class="clear"></div>';

			echo $this->field_after();

		}

		public function output() {

			$output    = '';
			$element   = ( is_array( $this->field['output'] ) ) ? join( ',', $this->field['output'] ) : $this->field['output'];
			$important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
			$unit      = ( ! empty( $this->value['unit'] ) ) ? $this->value['unit'] : 'px';

			$mode = ( ! empty( $this->field['output_mode'] ) ) ? $this->field['output_mode'] : 'padding';
			$mode = ( $mode === 'relative' || $mode === 'absolute' || $mode === 'none' ) ? '' : $mode;
			$mode = ( ! empty( $mode ) ) ? $mode . '-' : '';

			if ( ! empty( $this->field['all'] ) && isset( $this->value['all'] ) && $this->value['all'] !== '' ) {

				$output  = $element . '{';
				$output .= $mode . 'top:' . $this->value['all'] . $unit . $important . ';';
				$output .= $mode . 'right:' . $this->value['all'] . $unit . $important . ';';
				$output .= $mode . 'bottom:' . $this->value['all'] . $unit . $important . ';';
				$output .= $mode . 'left:' . $this->value['all'] . $unit . $important . ';';
				$output .= '}';

			} else {

				$top    = ( isset( $this->value['top'] ) && $this->value['top'] !== '' ) ? $mode . 'top:' . $this->value['top'] . $unit . $important . ';' : '';
				$right  = ( isset( $this->value['right'] ) && $this->value['right'] !== '' ) ? $mode . 'right:' . $this->value['right'] . $unit . $important . ';' : '';
				$bottom = ( isset( $this->value['bottom'] ) && $this->value['bottom'] !== '' ) ? $mode . 'bottom:' . $this->value['bottom'] . $unit . $important . ';' : '';
				$left   = ( isset( $this->value['left'] ) && $this->value['left'] !== '' ) ? $mode . 'left:' . $this->value['left'] . $unit . $important . ';' : '';

				if ( $top !== '' || $right !== '' || $bottom !== '' || $left !== '' ) {
					$output = $element . '{' . $top . $right . $bottom . $left . '}';
				}
			}

			$this->parent->output_css .= $output;

			return $output;

		}

	}
}
