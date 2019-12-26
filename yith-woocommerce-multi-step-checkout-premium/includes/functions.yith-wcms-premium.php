<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! function_exists( 'yith_wcms_checkout_timeline_default_icon' ) ) {
    /**
     * Get Default timeline icon options
     *
     * @param string|$step The timeline step
     *
     * @since    1.0
     * @return mixed|array|string
     */
    function yith_wcms_checkout_timeline_default_icon( $step = 'all', $size = 'original' ) {
        $default_icon = array(
            'login'         => YITH_WCMS_ASSETS_URL . 'images/icon/login.png',
            'billing'       => YITH_WCMS_ASSETS_URL . 'images/icon/billing.png',
            'shipping'      => YITH_WCMS_ASSETS_URL . 'images/icon/shipping.png',
            'order'         => YITH_WCMS_ASSETS_URL . 'images/icon/order.png',
            'payment'       => YITH_WCMS_ASSETS_URL . 'images/icon/payment.png',
        );

        if( 'original' == $size ) {
            return 'all' == $step ? $default_icon : $default_icon[ $step ];
        }

        else{
            $image_size = YITH_Multistep_Checkout()->sizes['yith_wcms_timeline_' . $size];
            return sprintf( '%s_%dx%d.png', strstr( $default_icon[ $step ], '.png', true ), $image_size['width'], $image_size['height'] );
        }
    }
}

if ( ! function_exists( 'yith_wcms_checkout_timeline_get_icon' ) ) {
    /**
     * Get Default timeline icon options
     *
     * @param        $style The timeline style
     * @param string|$step The timeline step
     *
     * @since    1.0
     * @return mixed|array|string
     */
    function yith_wcms_checkout_timeline_get_icon( $style, $step ) {
        $image_id  = get_option( 'yith_wcms_timeline_options_icon_' . $step );

        if ( is_numeric( $image_id ) ) {
            $image_src = wp_get_attachment_image_src( $image_id, 'yith_wcms_timeline_' . $style );
            return $image_src[0];
        }
        else {
            return yith_wcms_checkout_timeline_default_icon( $step, $style );
        }
    }
}

if( ! function_exists( 'yith_wcms_my_account_login_form' ) ){

	/**
	 * Show My Account login form
	 *
	 * @author Andrea Grillo <andrea.grillo@yithemes.com>
	 * @since  1.6.1
	 *
	 * @return void
	 */
	function yith_wcms_my_account_login_form(){
		if( ! is_user_logged_in() ){
			?>
            <?php
                    /**
                     * Login Form
                     *
                     * @author      WooThemes
                     * @package     WooCommerce/Templates
                     * @version     3.5.0
                     */

                    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
                    ?>

                    <style>
                        .entry-header .entry-title,
                        .entry-header .page-title,
                        form .page-title {
                            display: none !important;
                        }
                        .account-forms-container {
                            display: inline-block;
                            max-width: 100%;
                            width: 100% !important;
                            text-align: left;
                            height: auto;
                            padding-left: 0px;
                        }
                        .woocommerce form .form-row label {

                            line-height: 2;
                            font-size: 14px !important;
                            font-weight: 400 !important;
                            text-transform: none !important;

                        }
                        .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea {
                            font-size: 14px;
                            font-weight: 500;
                            color: #828186;
                            border-bottom: 1px !important;
                            height: 25px;
                            border-style: solid !important;
                            border-color: #c7c5cc !important;

                        }
                        .woocommerce form .form-row label.inline {
                            font-size: 14px !important;
                            font-weight: 400 !important;
                            text-transform: none !important;
                        }
                        .login-register-container .lost-pass-link {
                            font-size: 14px !important;
                            font-weight: 500 !important;
                            text-transform: none !important;
                        }
                        .account-tab-link {
                            font-size: 12px !important;
                            color: #0090ff !important;
                            font-weight: 500 !important;
                        }
                        .account-tab-item.last {
                            margin-right: 0;
                            font-size: 12px !important;
                        }
                        .woocommerce-Button {
                            position: absolute;
                            width: 45% !important;
                            background-color: #0090ff !important;
                            color: #ffffff !important;
                            border: 4px !important;
                            border-style: solid !important;
                            border-radius: 4px !important;
                            border-color: #0090ff !important;
                            text-transform: none !important;
                            padding: 8px 20px !important;
                        }
                        .woocommerce-Button:hover {
                            position: absolute;
                            background-color: #097dd7  !important;
                            color: #ffffff !important;
                            border: 4px !important;
                            border-style: solid !important;
                            border-radius: 4px !important;
                            border-color: #097dd7  !important;
                            text-transform: none !important;
                            padding: 8px 20px !important;
                        }
                        .woocommerce form .form-row, .woocommerce-page form .form-row {
                            padding: 7px 12px 0 7px !important;
                            margin: 0;
                        }
                        .registro-form{
                            border-style: none !important;
                        }
                        .input-form-registro{
                            height: 24px !important;
                            margin: -12px 0 !important;
                        }
                        .ur-frontend-form {
                            padding: 0px !important;

                        }
                        .woocommerce form .form-row label {
                            font-size: 13px !important;
                        }
                        .ur-frontend-form:last-child {
                            margin-bottom: 0;
                            margin-top: -24px;
                        }
                        .ur-frontend-form .ur-form-row .ur-form-grid {
                            padding: 0 0px !important;
                        }
                        .woocommerce button.button, .woocommerce input.button, .woocommerce-checkout a.button.wc-backward {
                            background-color: #0090ff !important;
                            color: #fff !important;
                            border-radius: 4px !important;
                            padding: 10px 20px !important;
                            float: none !important;
                            left: 0% !important;
                        }
                        .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-checkout a.button.wc-backward:hover {
                            background-color: #0090ff !important;
                            color: #fff !important;
                            border-radius: 4px !important;
                            padding: 11px 22px !important;
                        }
                        .ur-frontend-form .ur-form-row .ur-form-grid input[type="checkbox"], .ur-frontend-form .ur-form-row .ur-form-grid input[type="radio"] {
                            vertical-align: top !important;
                        }
                        .woocommerce form .form-row .required {
                           display: none !important;
                        }
                        span.description {
                            font-size: 13px !important;
                        }
                        .input-checkbox:after,
                        input[type="checkbox"]:after {
                          border-radius: 2px;
                          z-index: 999;
                        }

                        .input-checkbox:checked:after,
                        input[type="checkbox"]:checked:after {
                          border-color: #0090ff !important;
                          color: #0090ff !important;
                        }

                        .input-checkbox:checked:before,
                        input[type="checkbox"]:checked:before {
                          content: "";
                          position: absolute;
                          top: 2px;
                          left: 6px;
                          display: table;
                          width: 5px;
                          height: 10px;
                          border: 2px solid #0090ff;
                          border-top-width: 0;
                          border-left-width: 0;
                          -webkit-transform: rotate(45deg);
                          -ms-transform: rotate(45deg);
                          transform: rotate(45deg);
                        }
                        .woocommerce-privacy-policy-text p, .woocommerce-terms-and-conditions-checkbox-text {
                            font-size: 12px;
                            line-height: 1.4285em;
                            margin: 5px 0 13px !important;
                            font-weight: normal;
                        }
                        .form-row.form-footer {
                            margin-top: 10px !important;
                        }
                        .class-separacion{
                            border-top: 0px;
                            border-left: 1px #828186;
                            border-left-style: none;
                            border-right: 0px;
                            border-bottom: 0px;
                            border-left-style: solid;
                            padding: 0 0 0 31px;
                        }
                        .stilo-titulo{
                            font-size: 14px; font-weight: 400; text-align: center; padding: 10px 0 20px;
                        }
                        .altura-div{
                            margin-top: 25px;
                        }



                    </style>
                     <script src="https://www.w3schools.com/lib/w3.js"></script>
                    <div class="row">


                        <div class="medium-10 medium-centered columns" style="margin-bottom: -116px;">

                            <?php do_action( 'woocommerce_before_customer_login_form' ); ?>

                            <div class="login-register-container">

                                        <div class="account-forms-container" id="contenedor-principal">


                                            <div class="account-forms">
                                                <form id="login" method="post" class="woocommerce-form woocommerce-form-login login login-form" style="margin-top: 50px;">
                                                    <div class="row">
                                                    <div class="col-xs-12 col-sm-7 altura-div">
                                                    <p class="stilo-titulo">Bienvenid@, inicia sesión para tener una mejor experiencia </p>
                                                    <?php do_action( 'woocommerce_login_form_start' ); ?>
                                                        <?php echo do_shortcode('[woo_social_login networks="facebook,googleplus,linkedin,instagram"][/woo_social_login]'); ?>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 class-separacion">
                                                        <p style="font-size: 14px; font-weight: 400; text-align: center;">--------------- o ingresa con tu cuenta ---------------</p>

                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
                                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
                                                        </p>
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
                                                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                                                        </p>

                                                        <?php do_action( 'woocommerce_login_form' ); ?>

                                                        <p class="form-row form-footer">
                                                            <?php wp_nonce_field( 'woocommerce-login' ); ?>
                                                            <label for="rememberme" class="inline">
                                                                <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
                                                            </label>
                                                            <button type="submit" class="woocommerce-Button" name="login" style="margin-left: 35px;margin-top: -5px; font-weight: 500" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
                                                            <br/><br/>


                                                        </p>

                                                        <?php do_action( 'woocommerce_login_form_end' ); ?>
                                                        <a class="lost-pass-link" style="text-align: center; margin: 0 23px 9px 0px;" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
                                                </form>

                                                </div>
                                            </div>
                                                <p style="font-size: 12px; font-weight: 400; text-align: center; margin: 32px 0 18px;">Al ingresar aceptas las <a href="<?php echo home_url(); ?>/condiciones-de-compra">políticas de privacidad</a> de TAMED Store. </p>
                                                <ul class="account-tab-list">

                                                    <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>


                                                             <a class="account-tab-link" href="#register" style="color: #0090ff; font-weight: 500; font-size: 12px; opacity: 1 !important;" onclick="cambiarestilo()"><b style="font-size: 12px; color: #828186; text-align: center; font-weight: 400;">¿Nuevo en TAMED? </b><?php _e( 'Crear una cuenta', 'woocommerce' ); ?></a>


                                                    <?php endif; ?>

                                                </ul>

                                            <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>


                                                <form id="register" method="post" class="woocommerce-form woocommerce-form-register register register-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                                                    <p style="font-size: 14px; font-weight: 400; text-align: center; margin: 10px 0 18px;">Bienvenid@, regístrate con tu red social o ingresa tus datos </p>
                                                    <?php do_action( 'woocommerce_register_form_start' ); ?>

                                                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                                                        </p>

                                                    <?php endif; ?>

                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                                                    </p>

                                                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                                                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                                                        </p>

                                                    <?php else : ?>

                                                        <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

                                                    <?php endif; ?>

                                                    <?php do_action( 'woocommerce_register_form' ); ?>

                                                    <p class="woocommerce-FormRow form-row">
                                                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                                                        <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                                                    </p>

                                                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                                                </form><!-- .register-->


                                            <?php endif; ?>
                                            </div><!-- .account-forms-->

                                        </div><!-- .account-forms-container-->
                            </div><!-- .login-register-container-->

                            <?php do_action( 'woocommerce_after_customer_login_form' ); ?>

                        </div><!-- .large-6-->
                    </div><!-- .rows-->

                    <script type="text/javascript">
                            function cambiarestilo(){
                               var div = document.getElementById('contenedor-principal');
                               div.style.maxWidth = "40%";
                            }
                    </script>


            <?php
		}
	}
}
