CREATE DATABASE booking_db;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_date DATE NOT NULL,
    service_name VARCHAR(255) NOT NULL,
    henna_type ENUM('red', 'black', 'natural-red', 'jagua', 'glitter') NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
