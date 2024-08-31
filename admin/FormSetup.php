<?php   

class FormSetup {
    public function __construct() {
        add_action('admin_menu', [$this, 'create_form_setup']);
        add_action('wp_enqueue_scripts', [$this, 'tw_slidein_form_enqueue_font_awesome']);
        add_action('wp_head', [$this, 'form_custom_styles']);
    }

    public function create_form_setup() {
        add_menu_page(
            'Form Setup',
            'Form Setup',
            'manage_options',
            'slide-in-form-setups',
            [$this, 'add_form_setup'],
            'dashicons-format-aside',
            3
        );
    }
    
    function add_form_setup() {
        $form_setup_controller = TW_ADMIN_DIR . 'controller/FormSetupController.php';
    
        if (file_exists($form_setup_controller)) {
            require_once $form_setup_controller;
            $form_setup_controller = new FormSetupController();
            $form_setup_controller->view_form_setup();
        }
    }

    public function tw_slidein_form_enqueue_font_awesome() {
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');
    }

    public function form_custom_styles() {
        $icon = get_option('form_icon', 'fas fa-brain');
        $bg_color = get_option('form_bg_color', '#ffffff');
        $font_color = get_option('form_font_color', '#000000');
    }
}