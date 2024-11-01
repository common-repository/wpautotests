<?php
defined( 'ABSPATH' ) OR exit;
/**
* Plugin Name: WPAutoTests
* Plugin URI: http://www.wpautotests.com/
* Version: 1.1.03
* Author: WPAutoTests
* Description: Activate this plugin so that WPAutoTests.com can start running automated browser tests and monitoring your WordPress site.
* License: GPL2
*/

/*
Copyright (C) 2018 WPAutoTests

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class WPAutoTests {

	public function __construct() {

		$this->plugin               = new stdClass;
    $this->plugin->name         = 'wpautotests'; // Plugin Folder
    $this->plugin->displayName  = 'WPAutoTests'; // Plugin Name
    $this->plugin->version      = '1.1.03';
    $this->plugin->folder       = plugin_dir_path( __FILE__ );
    $this->plugin->url          = plugin_dir_url( __FILE__ );
    $this->plugin->start_url   = 'https://wpautotests.com/app/wp/';
    $this->plugin->setup_url   = 'https://wpautotests.com/app/wp/setup.php';
    $this->plugin->install_alert_dismissed = $this->plugin->name . '_install_alert_dismissed';

    add_action( 'admin_menu', array( &$this, 'adminMenu' ) );
    add_action( 'admin_notices', array( &$this, 'adminNotices' ) );
    add_action( 'wp_enqueue_scripts', array( &$this, 'loadPluginScripts' ) );
    add_action( 'admin_enqueue_scripts', array( &$this, 'loadAdminScripts' ) );
    add_action( 'wp_ajax_' . $this->plugin->name . '_dismiss_admin_alert', array( &$this, 'dismissAdminNotices' ) );
		add_action( 'wp_footer', array( &$this, 'drawWPAutoTestsElement' ) );
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'addSettingsLink' ) );
	}

	function addSettingsLink($links) {
		$url = get_admin_url() . 'options-general.php?page=' .$this->plugin->name;
		$settings_link = '<a href="'.$url.'">' . __( 'Settings', 'textdomain' ) . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}

  public function loadPluginScripts() {
    wp_register_style( $this->plugin->name, plugins_url('css/styles.css', __FILE__) );
		wp_enqueue_style( $this->plugin->name );
	}

  public function loadAdminScripts() {
    wp_register_script( $this->plugin->name, plugins_url('js/iframeResizer.min.js', __FILE__) );
		wp_enqueue_script( $this->plugin->name );
	}

  function adminNotices() {
		global $current_page;
		if ( !get_option( $this->plugin->install_alert_dismissed ) ) {
    	if ( ! ( $current_page == 'options-general.php' && isset( $_GET['page'] ) && $_GET['page'] == 'insert-headers-and-footers' ) ) {
				$setting_page = admin_url( 'options-general.php?page=' . $this->plugin->name );
        include_once( $this->plugin->folder . '/include/admin-alert.php' );
      }
    }
  }

  function dismissAdminNotices() {
  	check_ajax_referer( $this->plugin->name . '-nonce', 'nonce' );
    update_option( $this->plugin->install_alert_dismissed, 1 );
    exit;
  }

  function adminMenu() {
  	add_submenu_page( 'options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array( &$this, 'adminPanel' ) );
	}

  function adminPanel() {
		if ( !current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', $this->plugin->name ) . '</p>';
			return;
		}
    include_once( WP_PLUGIN_DIR . '/' . $this->plugin->name . '/include/settings.php' );
  }

	function drawWPAutoTestsElement() {
		if ( is_admin() || is_feed() || is_robots() || is_trackback() || is_404() ) {
			return;
		}
    echo '<div id="WPAutoTests"></div>';
	}
}

$wpautotests = new WPAutoTests();
