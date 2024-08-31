<?php

require_once TW_ADMIN_DIR . 'database/DatabasePlugin.php';

class ActivitionPlugin {
    protected $table_name;

    public function __construct() {
        register_activation_hook(__FILE__, [$this, 'plugin_activate']);
        register_deactivation_hook(__FILE__, [$this, 'plugin_deactivate']);
    }

    public function DatabaseConnection() {
        $database = new DatabasePlugin();
        $connect_db = $database->getConnection();
        return $connect_db;
    }

    public function plugin_activate() {
        $connect_db = $this->DatabaseConnection();
        $this->table_name = 'plugin_table';

        $connect_db->query("
            CREATE TABLE IF NOT EXISTS " . $this->table_name . " (
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
                name TINYTEXT NOT NULL,
                text TEXT NOT NULL,
                PRIMARY KEY (id)
            )"
        );
    
        // Menambahkan opsi default
        add_option('my_plugin_option', 'default_value');
    }

    public function plugin_deactivate() {
        $connect_db = $this->DatabaseConnection();

        delete_option('my_plugin_option');

        $connect_db->query("DROP TABLE IF EXISTS " . $this->table_name);
        
        wp_clear_scheduled_hook('my_plugin_daily_event');    
        delete_transient('my_plugin_temp_data');
    }
}