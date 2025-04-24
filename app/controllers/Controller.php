<?php

namespace app\controllers;

class Controller {

    // JSON response
    public function json($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit();
    }

    // HTML view 
    public function returnView($path) {
        if (file_exists($path)) {
            include $path;
        } else {
            echo "View not found: " . htmlspecialchars($path);
        }
    }
}
