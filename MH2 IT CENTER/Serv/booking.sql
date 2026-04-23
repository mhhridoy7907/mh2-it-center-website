CREATE DATABASE mh2_it_center;

USE mh2_it_center;

CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id VARCHAR(20),
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(30),
  service VARCHAR(100),
  booking_date DATE,
  payment_method VARCHAR(20),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
