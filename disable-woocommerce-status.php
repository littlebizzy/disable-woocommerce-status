<?php
/*
Plugin Name: Disable WooCommerce Status
Plugin URI: https://www.littlebizzy.com/plugins/disable-woocommerce-status
Description: Completely disables the WooCommerce Status widget in the WP Admin dashboard to greatly improve backend performance on shops with large inventories.
Version: 1.0.4
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Prefix: DWCSTS
*/

// Admin Notices module
require_once dirname(__FILE__).'/admin-notices.php';
DWCSTS_Admin_Notices::instance(__FILE__);

/**
 * Admin Notices Multisite check
 * Uncomment //return to disable this plugin on Multisite installs
 */
require_once dirname(__FILE__).'/admin-notices-ms.php';
if (false !== \LittleBizzy\DisableWooCommerceStatus\Admin_Notices_MS::instance(__FILE__)) {
	//return;
}

// Plugin constants
 define('DWCSTS_VERSION', '1.0.4');
 define('DWCSTS_DIR', plugin_dir_path(__FILE__));
 define('DWCSTS_URL', plugin_dir_url(__FILE__));
 define('DWCSTS_PLUGIN_BASENAME', plugin_basename(__FILE__));


 register_activation_hook(__FILE__, 'dwcsts_activation');
 register_deactivation_hook(__FILE__, 'dwcsts_deactivation');

 function dwcsts_activation() {
   //Activation

 }


 function dwcsts_deactivation() {
    // Deactivation
 }

 /**
  * Class for plugin functionality
  */
  class DWCSTS
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
  $dwcsts = new DWCSTS();
