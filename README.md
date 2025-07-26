 📦 Database Driven Web Application

A simple **Database Driven Web Application** built with **PHP**, **MySQL (Stored Procedures, Triggers, Views)**, **Bootstrap 5**, and **SweetAlert2** for modern user interactions.

---

## 📂 **Module Overview**

This project demonstrates:

- ✅ **Create Two Tables**
  - `manufacturer`: Stores manufacturer details
  - `product`: Stores product details linked to manufacturer

- ✅ **Stored Procedure**
  - Insert new manufacturers

- ✅ **Trigger**
  - Automatically delete `product` rows if their `manufacturer` is deleted

- ✅ **View**
  - Shows products where `price` > 5000

- ✅ **PHP Frontend**
  - Add manufacturer
  - Add product (dropdown select manufacturer)
  - View products (edit, delete with SweetAlert2)
  - View manufacturers
  - Bootstrap 5 responsive UI

---

## 🗃️ **Database Setup**

```sql
-- 1️⃣ Create Tables
CREATE TABLE manufacturer (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  address VARCHAR(100),
  contact_no VARCHAR(50)
);

CREATE TABLE product (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  price INT,
  manufacturer_id INT,
  FOREIGN KEY (manufacturer_id) REFERENCES manufacturer(id)
);

-- 2️⃣ Stored Procedure
DELIMITER //
CREATE PROCEDURE insert_manufacturer(IN mname VARCHAR(50), IN maddress VARCHAR(100), IN mcontact VARCHAR(50))
BEGIN
  INSERT INTO manufacturer (name, address, contact_no) VALUES (mname, maddress, mcontact);
END;
//
DELIMITER ;

-- 3️⃣ Trigger
DELIMITER //
CREATE TRIGGER after_manufacturer_delete
AFTER DELETE ON manufacturer
FOR EACH ROW
BEGIN
  DELETE FROM product WHERE manufacturer_id = OLD.id;
END;
//
DELIMITER ;

-- 4️⃣ View
CREATE VIEW expensive_products AS
SELECT * FROM product WHERE price > 5000;

-- 5️⃣ Example Data
INSERT INTO manufacturer (name, address, contact_no) VALUES 
('Samsung', 'Seoul', '012345'),
('Sony', 'Tokyo', '067890'),
('Apple', 'California', '099876'),
('Dell', 'Texas', '055432'),
('HP', 'Palo Alto', '078912'),
('Asus', 'Taipei', '066789'),
('Lenovo', 'Beijing', '088654'),
('Acer', 'Taiwan', '077543'),
('LG', 'Seoul', '065432'),
('Microsoft', 'Redmond', '034567');

INSERT INTO product (name, price, manufacturer_id) VALUES
('Laptop A', 6000, 1),
('Laptop B', 4500, 2),
('Monitor A', 5200, 3),
('Tablet A', 8000, 4),
('PC A', 3500, 5),
('Smartphone A', 7000, 6),
('Smartphone B', 2000, 7),
('Laptop C', 10000, 8),
('Monitor B', 1500, 9),
('PC B', 5500, 10);
⚙️ Run the Project
Clone or download.

Import SQL.

Place files in htdocs/your-folder/ (XAMPP/LAMP).

Update DB credentials in index.php:

php
Copy code
$conn = new mysqli("localhost", "root", "YOUR_PASSWORD", "db_driven_webapp");
Browse: http://localhost/your-folder/

🎨 Features
✅ Insert Manufacturer — with Stored Procedure
✅ Insert Product — with dynamic Manufacturer dropdown
✅ Edit Product — with Bootstrap Modal
✅ Delete Product — with SweetAlert2 confirm
✅ Trigger cleans orphaned products on manufacturer delete
✅ View shows expensive_products only
✅ Fully responsive Bootstrap UI

🗂️ Professional Git Commit Structure
bash
Copy code
git init
git add .
git commit -m "Initialize project: DB Driven App structure with Bootstrap"
git commit -m "Add Manufacturer insert logic with Stored Procedure"
git commit -m "Add Product insert with Manufacturer dropdown"
git commit -m "Add expensive products View and display logic"
git commit -m "Add delete trigger to clean products when manufacturer deleted"
git commit -m "Integrate SweetAlert2 for insert/update/delete confirmation"
git commit -m "Add Bootstrap Navbar and page routing"
git commit -m "Add Edit Product with Bootstrap Modal"
git commit -m "Clean code: output buffering & secure redirects"
📌 Credits
Author: @hiclassic
Tech Stack: PHP | MySQL | Bootstrap 5 | SweetAlert2
License: MIT
