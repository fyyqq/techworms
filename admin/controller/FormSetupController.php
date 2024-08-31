<?php  

defined('ABSPATH') or die('No script kiddies please!');

class FormSetupController {
    public function view_form_setup() {
        $html_file_path = TW_ADMIN_DIR . 'view/form_setup.php';
        
        if (!current_user_can('manage_options')) {
            return;
        }
    
        $current_icon = get_option('form_icon', 'fas fa-brain');
        $current_bg_color = get_option('form_bg_color', '#ffffff');
        $current_font_color = get_option('form_font_color', '#000000');
    
        $form = [
            "icon" => $current_icon,
            "bg_color" => $current_bg_color,
            "font_color" => $current_font_color,
        ];

        if (file_exists($html_file_path)) {
            ob_start();

            extract($form);
            include $html_file_path;

        } else {
            echo '
                <div class="container-fluid mt-5 d-flex align-items-center justify-content-center">
                    <p class="mt-3 fw-bold">' . esc_html__('HTML file not found.') . '</p>
                </div>
            ';
        }
    }
}