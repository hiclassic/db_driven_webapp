
-- Drop existing for clean import
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS manufacturer;
DROP PROCEDURE IF EXISTS insert_manufacturer;
DROP TRIGGER IF EXISTS after_manufacturer_delete;
DROP VIEW IF EXISTS expensive_products;

-- Manufacturer Table
CREATE TABLE manufacturer (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  address VARCHAR(100),
  contact_no VARCHAR(50)
);

-- Product Table
CREATE TABLE product (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  price INT(5),
  manufacturer_id INT(10)
);

-- Stored Procedure
DELIMITER //
CREATE PROCEDURE insert_manufacturer(IN m_name VARCHAR(50), IN m_address VARCHAR(100), IN m_contact VARCHAR(50))
BEGIN
  INSERT INTO manufacturer(name, address, contact_no)
  VALUES (m_name, m_address, m_contact);
END;
//
DELIMITER ;

-- Trigger
DELIMITER //
CREATE TRIGGER after_manufacturer_delete
AFTER DELETE ON manufacturer
FOR EACH ROW
BEGIN
  DELETE FROM product WHERE manufacturer_id = OLD.id;
END;
//
DELIMITER ;

-- View
CREATE VIEW expensive_products AS
SELECT * FROM product WHERE price > 5000;

INSERT INTO manufacturer (name, address, contact_no) VALUES
('Samsung', 'Dhaka, Bangladesh', '01711-111111'),
('Sony', 'Chittagong, Bangladesh', '01711-222222'),
('Walton', 'Gazipur, Bangladesh', '01711-333333'),
('Apple', 'USA HQ', '01711-444444'),
('Dell', 'Sylhet, Bangladesh', '01711-555555'),
('HP', 'Rajshahi, Bangladesh', '01711-666666'),
('Lenovo', 'Khulna, Bangladesh', '01711-777777'),
('Acer', 'Barishal, Bangladesh', '01711-888888'),
('Asus', 'Rangpur, Bangladesh', '01711-999999'),
('Microsoft', 'Mymensingh, Bangladesh', '01711-000000');


INSERT INTO product (name, price, manufacturer_id) VALUES
('Galaxy S23', 85000, 1),
('Bravia TV', 120000, 2),
('Walton Fridge', 40000, 3),
('iPhone 15', 150000, 4),
('Dell Inspiron', 65000, 5),
('HP Pavilion', 70000, 6),
('Lenovo ThinkPad', 80000, 7),
('Acer Aspire', 55000, 8),
('Asus ROG Laptop', 130000, 9),
('Surface Pro', 140000, 10);



DROP VIEW IF EXISTS expensive_products;

CREATE VIEW expensive_products AS
SELECT 
  p.id AS product_id,
  p.name AS product_name,
  p.price,
  p.manufacturer_id,
  m.name AS manufacturer_name
FROM 
  product p
JOIN 
  manufacturer m ON p.manufacturer_id = m.id
WHERE 
  p.price > 5000;




