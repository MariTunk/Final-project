<?php

namespace app\controllers;

use app\models\Booking;

class BookingController extends Controller {

    public function createBooking() {
        $bookingData = [
            'booking_date' => $_POST['booking_date'] ?? null,
            'service_name' => $_POST['service_name'] ?? null,
            'henna_type' => $_POST['henna_type'] ?? null,
            'notes' => $_POST['notes'] ?? null,

        ];

        $bookingModel = new Booking();
        $errors = $bookingModel->validateBookingData($bookingData);

        if (!empty($errors)) {
            return $this->json(['success' => false, 'errors' => $errors], 422);
        }

        $success = $bookingModel->createBooking($bookingData);
        return $success
            ? $this->json(['success' => true, 'message' => 'Booking successful!'])
            : $this->json(['success' => false, 'message' => 'Booking failed'], 500);
    }

    public function getAllBookings() {
        header("Content-Type: application/json");

        try {
            $bookingModel = new Booking();
            $bookings = $bookingModel->getAllBookings();
            echo json_encode($bookings);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }

        exit();
    }

    public function viewBooking() {
        include './assets/views/users/bookingViewer.html';
    }
}
