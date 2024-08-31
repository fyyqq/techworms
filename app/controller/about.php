<?php

class About extends Controller {
    public function index() {
        require_once "../app/model/Visitor.php";
        $visitor = new Visitor();
        $data = $visitor->get_form_icon();
        $result = [];

        foreach ($data as $key => $item) {
            $result[$item["option_name"]] = $item["option_value"];
        }

        $this->view("components/navbar", $result);
        $this->view("components/header", $result);
        $this->view("components/sidebar", $result);
        $this->view("about/index", $result);
        $this->view("components/footer", $result);
    }
}