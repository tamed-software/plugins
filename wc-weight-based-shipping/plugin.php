<?php
/**
 * Plugin Family Id: dangoodman/wc-weight-based-shipping
 * Plugin Name: WooCommerce Weight Based Shipping +
 * Plugin URI: https://codecanyon.net/item/weight-based-shipping-for-woocommerce/10099013
 * Description: Simple yet flexible shipping method for WooCommerce.
 * Version: 5.2.6
 * Author: weightbasedshipping.com
 * Author URI: https://weightbasedshipping.com
 * Requires PHP: 5.3
 * Requires at least: 4.0
 * Tested up to: 5.1
 * WC requires at least: 2.3
 * WC tested up to: 3.6
 */

if (!class_exists('WbsVendors_DgmWpPluginBootstrapGuard', false)) {
    require_once(dirname(__FILE__).'/server/vendor/dangoodman/wp-plugin-bootstrap-guard/DgmWpPluginBootstrapGuard.php');
}

WbsVendors_DgmWpPluginBootstrapGuard::checkPrerequisitesAndBootstrap(
    'WooCommerce Weight Based Shipping',
    '5.3', '4.0', '2.3',
    dirname(__FILE__).'/bootstrap.php'
);