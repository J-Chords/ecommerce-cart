-- Create the 'ecommerce' database
CREATE DATABASE IF NOT EXISTS ecommerce;

-- Use the 'ecommerce' database
USE ecommerce;

-- Create the 'products' table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL,  -- Optional field for product description
    image VARCHAR(255) DEFAULT NULL  -- Path to the product image
);

-- Insert sample data into 'products' table
INSERT INTO products (name, price, description, image) VALUES
    ('Cake', 20.00, 'Sweet and Moist Cakes', 'product1.jpg'),
    ('Bread', 35.50, 'Freshly baked, soft and perfect', 'product2.jpg'),
    ('Groundnut', 15.99, 'Crunchy, roasted and rich', 'product3.jpg'),
    ('Chips', 20.00, 'Crispy and savory snack', 'product4.jpg'),
    ('Chocolate', 35.50, 'Rich, smooth and delightful', 'product5.jpg'),
    ('Corn', 15.99, 'Sweet and tender kernels', 'product6.jpg'),
    ('Peas', 20.00, 'Fresh, green and packed with nutrients', 'product7.jpg'),
    ('Beans', 35.50, 'Protein-rich and hearty', 'product8.jpg'),
    ('Flour', 15.99, 'Fine and versatile, ideal for baking and cooking', 'product9.jpg');
