-- Create the database
CREATE DATABASE FRESHSCENT_db;

-- Use the created database
USE FRESHSCENT_db;


-- Create Users table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Products table
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    image_url VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create Orders table
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Order_Items table
CREATE TABLE Order_Items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE
);


-- Create Payment_Methods table
CREATE TABLE Payment_Methods (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    card_number VARCHAR(20) NOT NULL, -- Store encrypted card number
    card_type VARCHAR(50) NOT NULL,
    expiration_date DATE NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Shopping_Cart table
CREATE TABLE Shopping_Cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Cart_Items table
CREATE TABLE Cart_Items (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (cart_id) REFERENCES Shopping_Cart(cart_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Products(product_id) ON DELETE CASCADE
);

CREATE TABLE contact_queries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    query TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Products (name, description, price, category, image_url) VALUES
('Ocean Breeze 450ml', 'A refreshing body lotion with an ocean breeze scent.', 169.99, 'Body Lotion', 'items/Body lotion2.jpg'),
('Rose Essence 450ml', 'A soothing body lotion infused with rose essence.', 179.99, 'Body Lotion', 'items/Body lotion1.jpg'),
('Tropical Paradise 450ml', 'A tropical body lotion that brings the essence of paradise.', 149.99, 'Body Lotion', 'items/Body lotion3.jpg'),
('Citrus Grove 450ml', 'A zesty body lotion that invigorates the skin.', 159.99, 'Body Lotion', 'items/Body lotion4.jpg'),
('Mint Bliss 450ml', 'A cooling body lotion with a refreshing mint scent.', 169.99, 'Body Lotion', 'items/Body lotion5.jpg'),
('Lemongrass Fields 450ml', 'A revitalizing body lotion with lemongrass.', 149.99, 'Body Lotion', 'items/Body lotion6.jpg'),
('Berry Harvest 400ml', 'A fruity body lotion that hydrates and nourishes.', 139.99, 'Body Lotion', 'items/Body lotion7.jpg'),
('Honeysuckle Bloom 450ml', 'A floral body lotion with a sweet honeysuckle scent.', 159.99, 'Body Lotion', 'items/Body lotion8.jpg'),
('Forest Whisper 120ml', 'A captivating perfume that evokes the essence of a forest.', 249.99, 'Perfume', 'items/Perfume1.jpg'),
('Desert Bloom 140ml', 'A warm and floral fragrance inspired by desert blooms.', 259.99, 'Perfume', 'items/Perfume2.jpg'),
('Blooming Jasmine 120ml', 'A delicate perfume with the enchanting scent of jasmine.', 169.99, 'Perfume', 'items/Perfume3.jpg'),
('Mountain Air 150ml', 'A fresh and invigorating fragrance reminiscent of mountain air.', 249.99, 'Perfume', 'items/Perfume4.jpg'),
('Midnight Rose 120ml', 'A romantic and mysterious scent with notes of rose.', 209.99, 'Perfume', 'items/Perfume5.jpg'),
('Seaside Serenity 120ml', 'A calming fragrance that captures the essence of the sea.', 219.99, 'Perfume', 'items/Perfume6.jpg'),
('Citrus Grove 100ml', 'A bright and zesty perfume that uplifts the spirit.', 159.99, 'Perfume', 'items/Perfume7.jpg'),
('Rain-kissed Petals 120ml', 'A fresh and floral scent inspired by rain-kissed flowers.', 239.99, 'Perfume', 'items/Perfume8.jpg'),
('Tea Tree & Lemon 400ml', 'A refreshing body wash with tea tree and lemon.', 159.99, 'Body Wash', 'items/Body wash1.jpg'),
('Lavender Fields 400ml', 'A calming body wash infused with lavender.', 179.99, 'Body Wash', 'items/Body wash2.jpg'),
('Citrus Burst 450ml', 'An energizing body wash with a burst of citrus.', 199.99, 'Body Wash', 'items/Body wash3.jpg'),
('Ocean Mist 450ml', 'A refreshing body wash that evokes the scent of the ocean.', 149.99, 'Body Wash', 'items/Body wash4.jpg'),
('Himalayan Rose 450ml', 'A luxurious body wash with the essence of Himalayan roses.', 179.99, 'Body Wash', 'items/Body wash5.jpg'),
('Coconut & Aloe 450ml', 'A soothing body wash with coconut and aloe vera.', 189.99, 'Body Wash', 'items/Body wash6.jpg'),
('Eucalyptus & Mint 450ml', 'A revitalizing body wash with eucalyptus and mint.', 159.99, 'Body Wash', 'items/Body wash7.jpg'),
('Jasmine Blossom 450ml', 'A fragrant body wash with the scent of jasmine.', 189.99, 'Body Wash', 'items/Body wash8.jpg'),
('Cocoa & Vanilla Bean 120ml', 'A rich and creamy shea butter blend.', 100.00, 'Shea Butter for Skin', 'items/Shea Butter1.jpg'),
('Lavender & Chamomile 100ml', 'A soothing shea butter with lavender and chamomile.', 129.99, 'Shea Butter for Skin', 'items/Shea Butter2.jpg'),
('Citrus Blossom 120ml', 'A refreshing shea butter with citrus notes.', 139.99, 'Shea Butter for Skin', 'items/Shea Butter3.jpg'),
('Pineapple & Papaya 120ml', 'A tropical shea butter blend with pineapple and papaya.', 109.99, 'Shea Butter for Skin', 'items/Shea Butter4.jpg'),
('Wild Rose & Bergamot 100ml', 'A floral shea butter with wild rose and bergamot.', 114.99, 'Shea Butter for Skin', 'items/Shea Butter5.jpg'),
('Sea Salt & Driftwood 120ml', 'A unique shea butter with sea salt and driftwood.', 129.99, 'Shea Butter for Skin', 'items/Shea Butter6.jpg'),
('Hibiscus & Rosehip 120ml', 'A nourishing shea butter with hibiscus and rosehip.', 119.99, 'Shea Butter for Skin', 'items/Shea Butter7.jpg');
