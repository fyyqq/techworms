<?php

class Visitor {
    
    public function connect_database() {
        require_once __DIR__ . '/../core/Database.php';

        $database = new Database();
        return $database->getConnection();
    }
    
    public function plugin_connect_database() {
        require_once TW_ADMIN_DIR . 'database/DatabasePlugin.php';

        $database = new DatabasePlugin();
        return $database->getConnection();
    }

    public function createTableVisitors() {
        return $this->connect_database()->create("wp_visitors", [
            "id" => [
                "INT",
                "NOT NULL",
                "AUTO_INCREMENT"
            ],
            "first_name" => [
                "VARCHAR(100)",
                "NOT NULL",
            ],
            "last_name" => [
                "VARCHAR(100)",
                "NOT NULL",
            ],
            "email_address" => [
                "VARCHAR(100)",
                "NOT NULL",
                "UNIQUE"
            ],
            "created_at" => [
                "TIMESTAMP",
                "DEFAULT CURRENT_TIMESTAMP"
            ],
            "updated_at" => [
                "TIMESTAMP",
                "NULL",
                "DEFAULT NULL",
            ],
            "PRIMARY KEY (<id>)"
        ], [
            "ENGINE" => "InnoDB",
            "AUTO_INCREMENT" => 1
        ]);
    }

    public function dropTableVisitors() {
        return $this->connect_database()->drop("wp_visitors");
    }

    public function getVisitors() {        
        return $this->plugin_connect_database()->select("wp_visitors", [
            "first_name",
            "last_name",
            "email_address",
            "created_at",
        ]);
    }
    public function getVisitorsV2() {
        return $this->connect_database()->select("wp_visitors", [
            "first_name",
            "last_name",
            "email_address",
            "created_at",
        ]);
    }

    public function insertVisitors($fname, $lname, $email) {
        try {
            $insert_result = $this->connect_database()->insert("wp_visitors", [
                "first_name" => $fname,
                "last_name" => $lname,
                "email_address" => $email
            ]);

            return ($insert_result->rowCount() > 0) ? [true, "Insert successfully"] : [false, "Failed to insert"];

        } catch (Exception $err) {
            $error_message = $err->getMessage();

            if (strpos($error_message, 'Duplicate entry') !== false) {
                return [false, "The email address '$email' is already registered. Please use a different email."];
            } elseif (strpos($error_message, 'foreign key constraint') !== false) {
                return [false, "There is a problem with the data relationship. Please check your inputs."];
            } elseif (strpos($error_message, 'Data too long') !== false) {
                return [false, "One of the fields has too much data. Please shorten it and try again."];
            } elseif (strpos($error_message, 'SQLSTATE[HY000]') !== false) {
                return [false, "There was an issue connecting to the database. Please try again later."];
            } else {
                return [false, "An unexpected error occurred: " . $error_message];
            }
        }
    }

    public function get_form_icon() {
        return $this->connect_database()->select("wp_options", "*", [
            "option_name" => ["form_icon", "form_bg_color", "form_font_color"],
        ]);
    }
}