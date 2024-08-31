<?php

class App {

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $this->redirectTrailingSlash();

        $url = $this->parseURL();

        // controller
        if ($url && file_exists('../app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];

            require_once '../app/controller/' . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (!empty($url)) {
                $this->params = array_values($url);
            }

            // run
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
    }

    private function redirectTrailingSlash() {
        $currentUrl = $_SERVER['REQUEST_URI'];
    
        if (substr($currentUrl, -1) === '/' && $currentUrl !== '/' && !strpos($currentUrl, '?')) {
            $redirectUrl = rtrim($currentUrl, '/');
            header("Location: $redirectUrl", true, 301);
            exit;
        }
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
                $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}