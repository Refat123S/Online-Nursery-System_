-- Schema for Online Nursery System
-- Run with: mysql -u <user> -p < schema.sql

-- Create database (optional)
CREATE DATABASE IF NOT EXISTS online_nursery DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE online_nursery;

-- Users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Plants table
CREATE TABLE IF NOT EXISTS plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  category VARCHAR(100),
  stock INT DEFAULT 0,
  description TEXT,
  image VARCHAR(255) DEFAULT 'default.jpg',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  plant_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  added_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (plant_id) REFERENCES plants(id) ON DELETE CASCADE
);

-- Feedback table
CREATE TABLE IF NOT EXISTS feedback (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(150),
  message TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Example inserts (optional)
-- INSERT INTO users (name, email, password) VALUES ('Admin', 'admin@example.com', 'password_here');
-- INSERT INTO plants (name, price, category, stock, description, image) VALUES ('Aloe Vera', 5.00, 'Indoor', 10, 'Hardy succulent', 'aloe_vera.jpg');
