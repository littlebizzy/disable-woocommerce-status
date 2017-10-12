<?php
/*
Plugin Name: Disable WooCommerce Status
Plugin URI: https://www.littlebizzy.com/plugins/disable-woocommerce-status
Description: Completely disables the WooCommerce Status widget in the WP Admin dashboard to greatly improve backend performance on high traffic WooCommerce shops.
Version: 1.0.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

 define('RDW_VERSION', '1.0.0');
 define('RDW_DIR', plugin_dir_path(__FILE__));
 define('RDW_URL', plugin_dir_url(__FILE__));
 define('RDW_PLUGIN_BASENAME', plugin_basename(__FILE__));


 register_activation_hook(__FILE__, 'rdw_activation');
 register_deactivation_hook(__FILE__, 'rdw_deactivation');

 function rdw_activation() {
   //Activation

 }


 function rdw_deactivation() {
    // Deactivation
 }

 /**
  * Class for plugin functionallity
  */
  class RDW
  {

    function __construct()
    {
      add_action('wp_dashboard_setup', array( $this, 'removingWCStatus' ));
    }

    function removingWCStatus()
    {
      remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');
    }

  }
  $rwd = new RDW();
