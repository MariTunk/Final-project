<?php

namespace app\models;

class Booking extends Model {

    protected $table = 'bookings'; // For findAll() if needed

    public function createBooking($data) {
        $query = "INSERT INTO bookings (booking_date, service_name, henna_type, notes)
                  VALUES (:booking_date, :service_name, :henna_type, :notes)";
        
        return $this->query($query, $data);
    }

    public function getAllBookings() {
        $query = "SELECT * FROM bookings ORDER BY booking_date DESC";
        return $this->query($query);
    }

    public function validateBookingData($data) {
        $errors = [];

        if (empty($data['booking_date'])) {
            $errors[] = 'Booking date is required.';
        }

        if (empty($data['service_name'])) {
            $errors[] = 'Service name is required.';
        }

        if (empty($data['henna_type'])) {
            $errors[] = 'Henna type is required.';
        }

        // Notes are optional, so no validation needed

        return $errors;
    }
}
