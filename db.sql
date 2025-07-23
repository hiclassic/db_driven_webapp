
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
