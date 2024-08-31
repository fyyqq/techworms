<?php

/**
  * Plugin name: Techworms
  * Description: Plugin for visitors (Techworms)
  * Author: Afiq Hakimi
  * Author URI: http://localhost/wp/wp-content/plugins/techworms/public/home
  * version: 1.0.0
  * Text Domain: techworms
*/

defined('ABSPATH') or die('No script kiddies please!');

define('TW_DIR', plugin_dir_path(__FILE__));
define('TW_URL', plugin_dir_url(__FILE__));
define('TW_ADMIN_DIR', trailingslashit(TW_DIR . "admin"));
define('TW_APP_DIR', trailingslashit(TW_DIR . "app"));
define('TW_PUBLIC_DIR', trailingslashit(TW_DIR . "public"));
define('TW_TEXT_DOMAIN', 'Techworms');

define('DB_TYPE_PLUGIN', 'mysql');
define('DB_HOST_PLUGIN', 'localhost');
define('DB_NAME_PLUGIN', 'wp_techworms');
define('DB_USER_PLUGIN', 'root');
define('DB_PASS_PLUGIN', '');

require  TW_ADMIN_DIR . 'VisitorTable.php';
require  TW_ADMIN_DIR . 'FormSetup.php';
require  TW_ADMIN_DIR . 'ActivitionPlugin.php';

$visitor_table = new VisitorTable();
$form_setup = new FormSetup();
new ActivitionPlugin();