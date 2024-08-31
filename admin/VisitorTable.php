<?php 

class VisitorTable {
    public function __construct() {
        add_action('admin_menu', [ $this, 'create_admin_menu'] );
        add_action('admin_enqueue_scripts', [$this, 'admin_assets']);
    }

    public function create_admin_menu() {
        add_menu_page(
            'Techworms Visitors',
            'Visitors',
            'manage_options',
            'visitors',
            [$this, 'add_admin_menu'],
            'dashicons-groups',
            2
        );
    }

    public function add_admin_menu() {
        $visitor_controller = TW_ADMIN_DIR . 'controller/VisitorController.php';
    
        if (file_exists($visitor_controller)) {
            require_once $visitor_controller;
            $visitor_controller = new VisitorController();
            $visitor_controller->get_visitors_list();
        }
    }

    public function admin_assets() {
        // Bootstrap CSS
        wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        
        wp_enqueue_style('techworms-admin-css', plugin_dir_url(__FILE__) . 'public/css/styles.css');
    }
}