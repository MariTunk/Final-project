<?php

namespace app\controllers;

class MainController extends Controller {

    public function homepage() {
        // Remember to route relative to index.php
        // Require page and exit to return an HTML page
        $this->returnView('./assets/views/main/homepage.html'); // Adjust path as necessary
    }

    public function notFound() {
        http_response_code(404);
        $this->returnView('./assets/views/main/notFound.html');
        echo "404 Not Found"; // You can also return a view for a custom 404 page
    }
}