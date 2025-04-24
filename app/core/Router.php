<?php

namespace app\core;

use app\controllers\MainController; // Ensure MainController is imported

class Router {
    public $routeList;

    function __construct($routes) {
        $this->routeList = $routes;
    }

    public function serveRoute() {
        $cleanUri = strtok($_SERVER['REQUEST_URI'], '?');
        $uriParse = explode('/', trim($cleanUri, '/'));
        $method = $_SERVER['REQUEST_METHOD'];

        if ($uriParse[0]) {
            if (isset($this->routeList[$uriParse[0]])) {
                $route = $this->routeList[$uriParse[0]];
                $controller = $route['controller'];
                $action = $route[$method];
                $controller = new $controller();
                $controller->$action();
            } else {
                // Handle 404
                $homepageController = new MainController();
                $homepageController->notFound(); // Call the notFound method
            }
        } else {
            // Handle homepage
            $homepageController = new MainController();
            $homepageController->homepage();
        }
    }
}