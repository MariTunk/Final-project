<?php

require '../app/core/setup.php'; // Ensure this file sets up your environment correctly

use app\core\Router;
use app\controllers\MainController;
use app\controllers\BookingController;

// Load routes from routes.php
$routes = require '../app/core/routes.php'; // Ensure this path is correct

// Create a new Router instance with the routes
$router = new Router($routes); // Pass the routes to the constructor

// Serve the route based on the request
$router->serveRoute();