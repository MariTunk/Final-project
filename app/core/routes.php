<?php

use app\controllers\BookingController;

$routes = [
    'bookings' => [
        'controller' => BookingController::class,
        'POST' => 'createBooking',
        'GET' => 'getAllBookings',
    ],
    'viewBooking' => [
        'controller' => BookingController::class,
        'GET' => 'viewBooking'
    ],
];

return $routes; // Make sure to return the routes array