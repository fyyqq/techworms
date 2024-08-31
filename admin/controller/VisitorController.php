<?php  

defined('ABSPATH') or die('No script kiddies please!');

class VisitorController {

    public function get_visitors_list() {
        require_once TW_APP_DIR . 'model/visitor.php';

        $visitors = new Visitor();
        $visitors->plugin_connect_database();
        $data = $visitors->getVisitors();

        $this->view_visitor($data);
    }

    public function view_visitor($visitors) {
        $html_file_path = TW_ADMIN_DIR . 'view/data_table.php';

        if (file_exists($html_file_path)) {
            ob_start();

            extract($visitors);
            
            include $html_file_path;

            $html_content = ob_get_clean();

            echo wp_kses_post($html_content);
        } else {
            echo '
                <div class="container-fluid mt-5 d-flex align-items-center justify-content-center">
                    <p class="mt-3 fw-bold">' . esc_html__('HTML file not found.') . '</p>
                </div>
            ';
        }
    }
}