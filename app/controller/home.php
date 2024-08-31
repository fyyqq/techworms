<?php

class Home extends Controller {
    public function index() {
        
        require_once "../app/model/Visitor.php";
        $visitor = new Visitor();
        // $visitor->createTableVisitors();
        // $visitor->dropTableVisitors();
        $data = $visitor->get_form_icon();
        $result = [];

        foreach ($data as $key => $item) {
            $result[$item["option_name"]] = $item["option_value"];
        }

        $this->view("components/header");
        $this->view("components/navbar", $result);
        $this->view("components/sidebar", $result);
        $this->view("home/index");
        $this->view("components/footer");
    }
}