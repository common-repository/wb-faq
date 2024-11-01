<?php
/**
 * Plugin Name:		   WB FAQ
 * Plugin URI:		   https://wbbrim.com/
 * Description:		   A quick and easy way to add FAQs to your site.
 * Version: 		     1.0
 * Author: 			     wpbrim < imran@wpbrim.com >
 * Author URI: 		   https://wbbrim.com/
 * Text Domain:      wb-faq
 * License:          GPL-2.0+
 * License URI:      http://www.gnu.org/licenses/gpl-2.0.txt
 * License: GPL2
 */
// include files
 include(plugin_dir_path( __FILE__ ).'/lib/wb-faq-cpt.php');
 include(plugin_dir_path( __FILE__ ).'/public/wb-faq-view.php');

 function wb_faq_enqueue_scripts() {
    //Plugin Main CSS File
     wp_enqueue_style( 'wb-faq-style', plugins_url('assets/css/wb-faq-style.css', __FILE__ ) );
  }

 add_action( 'wp_enqueue_scripts', 'wb_faq_enqueue_scripts' );

 function wb_faq_admin_style() {

  wp_enqueue_style( 'wb_faq_admin', plugins_url('assets/css/wb-faq-admin.css',__FILE__ ));

 }
 add_action( 'admin_enqueue_scripts', 'wb_faq_admin_style' );

 // Sub Menu Page

 add_action('admin_menu', 'wb_faq_menu_init');

 function wb_faq_menu_help(){
   include('lib/wb-faq-help-upgrade.php');
 }



 function wb_faq_menu_init()
   {

     add_submenu_page('edit.php?post_type=wb-faq', __('Help & Upgrade','wb-faq'), __('Help & Upgrade','wb-faq'), 'manage_options', 'wb_faq_menu_help', 'wb_faq_menu_help');

   }


// adding link
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wb_faq_plugin_action_links' );

function wb_faq_plugin_action_links( $links ) {
   $links[] = '<a class="wb-pro-link" href="https://wpbrim.com/products/" target="_blank">Pro Version</a>';
   $links[] = '<a href="https://wpbrim.com/products/" target="_blank">WB Plugins</a>';
   return $links;
}
