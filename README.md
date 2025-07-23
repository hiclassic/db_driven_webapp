# 🚀 DB Driven Web Application — Bootstrap + Modal + SweetAlert2

**Module:** Database Driven Web Application  
**Author:** @hiclassic

---

## ✅ Project Highlights

- ✔️ Manufacturer Table — Insert via Stored Procedure
- ✔️ Product Table — Linked to Manufacturer
- ✔️ After Delete Trigger — Cascade delete on Product
- ✔️ View — Expensive Products (Price > 5000)
- ✔️ Bootstrap 5 UI — Responsive Card, Table, Modal
- ✔️ SweetAlert2 — Beautiful Success/Error/Confirmation Popups
- ✔️ Full CRUD — Insert, View, Edit, Delete

---

## 📁 Folder Structure

db_driven_webapp/
├── index.php # Insert Form
├── insert.php # Stored Procedure Insert + SweetAlert
├── view.php # Bootstrap Table + Edit/Delete Modal + SweetAlert
├── update.php # Update Logic + SweetAlert
├── delete.php # Delete Logic + SweetAlert
├── db.sql # Full SQL Dump (Tables + SP + Trigger + View)
└── README.md # This File!

yaml
Copy code

---

## ✅ How to Setup

### 1️⃣ Requirements

- **XAMPP/Laragon/Localhost**
- PHP 7+ / 8+
- MySQL / MariaDB

---

### 2️⃣ Create Database

1. Run Apache + MySQL
2. Visit [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Click **Databases** ➜ Create new: `db_driven_webapp` (or any name)
4. Import `db.sql` file  
   📌 This creates:  
   - Tables: `manufacturer`, `product`
   - Stored Procedure: `insert_manufacturer`
   - Trigger: `after_manufacturer_delete`
   - View: `expensive_products`

---

### 3️⃣ Configure DB in PHP Files

- Open `index.php`, `insert.php`, `view.php`, `update.php`, `delete.php`
- Ensure:
  ```php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "db_driven_webapp"; // Your DB name
4️⃣ Run & Test
✅ Add Manufacturer ➜ via index.php ➜ Stored Procedure used
✅ Delete Manufacturer ➜ Related Products auto deleted (Trigger)
✅ View Expensive Products ➜ view.php ➜ Edit/Delete ➜ Modal + SweetAlert2

✅ Libraries Used
Bootstrap 5

html
Copy code
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
SweetAlert2

html
Copy code
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
⚡ Developer Notes
✔️ Clean Structured PHP (Procedural)

✔️ Use of Stored Procedure — secure insert

✔️ Trigger ensures relational integrity

✔️ View used for filtered product list

✔️ Bootstrap for responsive design

✔️ SweetAlert2 for modern popups

❤️ Credits
Created by @hiclassic
For DB Driven Web App Module / Assignment / Practice
