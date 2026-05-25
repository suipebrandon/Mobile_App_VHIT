-- Create Database
CREATE DATABASE IF NOT EXISTS bd_web_db;
USE bd_web_db;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Add an index for faster email lookups
CREATE INDEX idx_email ON users(email);

-- Optional: Insert sample data (comment out if not needed)
-- INSERT INTO users (name, email, password) VALUES
-- ('Admin User', 'admin@example.com', '$2y$10$YourHashedPasswordHere'),
-- ('John Doe', 'john@example.com', '$2y$10$YourHashedPasswordHere');
