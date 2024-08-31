<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $config_path = "../config/config.php";
    $model_path = "../model/Visitor.php";
    
    if (file_exists($config_path)) {
        require_once $config_path;
    }
    
    if (file_exists($model_path)) {
        require_once $model_path;
    }

    if (isset($_POST["action"]) && $_POST["action"] == "insert") {
        $post_data = $_POST;
        $post_data = (array) unserialize(serialize($post_data));

        $first_name = filter_var(trim($post_data["first_name"]), FILTER_SANITIZE_STRING);
        $last_name = filter_var(trim($post_data["last_name"]), FILTER_SANITIZE_STRING);
        $email_address = filter_var(trim($post_data["email_address"]), FILTER_SANITIZE_EMAIL);
        $recaptcha = $post_data["g-recaptcha-response"];
        
        $validate_first_name = [
            "status" => true, 
            "value" => ""
        ];
        $validate_last_name = [
            "status" => true, 
            "value" => ""
        ];
        $validate_email_address = [
            "status" => true, 
            "value" => ""
        ];
        $validate_recaptcha = [
            "status" => true, 
            "value" => ""
        ];
        
        if (empty($first_name)) {
            $validate_first_name = [
                "status" => false, 
                "value" => "First name is required"
            ];
        }
        if (empty($last_name)) {
            $validate_last_name = [
                "status" => false, 
                "value" => "Last name is required"
            ];
        }
        if (empty($email_address)) {
            $validate_email_address = [
                "status" => false, 
                "value" => "Email address is required"
            ];
        } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            $validate_email_address = [
                "status" => false, 
                "value" => "Email address is invalid"
            ];
        }
        
        // Recaptcha
        $recaptcha_key = RECAPTCHA_SECRET_KEY;
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_key . '&response=' . $recaptcha;
        $confirm_recaptcha = json_decode(file_get_contents($url))->success;
        
        if (empty($recaptcha)) {
            $validate_recaptcha = [
                "status" => false, 
                "value" => "Recaptcha is required"
            ];
        } else {
            if (!$confirm_recaptcha) {
                $validate_recaptcha = [
                    "status" => false, 
                    "value" => "Recaptcha verification failed. Please try again or refresh."
                ];
            }
        }
        
        if ($validate_first_name["status"] && 
            $validate_last_name["status"] && 
            $validate_email_address["status"] && 
            $validate_recaptcha["status"]) {
                
            // Insert Database
            $visitor = new Visitor();
            $insert_visitor = $visitor->insertVisitors($first_name, $last_name, $email_address);
            
            if ($insert_visitor[0]) {
                print_r(json_encode(["insert", true, $insert_visitor[1]]));
            } else {
                print_r(json_encode(["insert", false, $insert_visitor[1]]));
            }
        } else {
            if (!$validate_first_name["status"] || 
            !$validate_last_name["status"] || 
            !$validate_email_address["status"] || 
            !$validate_recaptcha["status"]) {
                
                $errors = [
                    "first_name" => [],
                    "last_name" => [],
                    "email_address" => [],
                    "recaptcha" => [],
                ];

                if (!$validate_first_name["status"]) $errors["first_name"] = $validate_first_name["value"];
                if (!$validate_last_name["status"]) $errors["last_name"] = $validate_last_name["value"];
                if (!$validate_email_address["status"]) $errors["email_address"] = $validate_email_address["value"];
                if (!$validate_recaptcha["status"]) $errors["recaptcha"] = $validate_recaptcha["value"];

                print_r(json_encode(["form", false, $errors]));
            }
        }
    }
}