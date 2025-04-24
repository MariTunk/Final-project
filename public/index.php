<?php

require '../app/core/setup.php'; 
use app\core\Router;
use app\controllers\MainController;
use app\controllers\BookingController;


$routes = require '../app/core/routes.php';


$router = new Router($routes); 


$router->serveRoute();
