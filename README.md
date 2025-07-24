# 🚀 DB Driven Web Application — Bootstrap + Modal + SweetAlert2

**Module:** Database Driven Web Application  
**Author:** @hiclassic

---

## ✅ Project Highlights

- ✔️ `manufacturer` table — Insert via Stored Procedure (`insert_manufacturer`)
- ✔️ `product` table — Linked with `manufacturer_id` (FK)
- ✔️ After Delete Trigger — Auto delete related products when a manufacturer is deleted
- ✔️ View — Expensive Products (Price > 5000)
- ✔️ Bootstrap 5 UI — Responsive Card, Table, Modal
- ✔️ SweetAlert2 — Beautiful Success/Error/Confirmation popups
- ✔️ Full CRUD — Insert, View, Edit (Modal), Delete (with confirmation)

---

## 📁 Folder Structure

db_driven_webapp/
├── index.php # Single entry point (all logic: Insert, View, Edit, Delete)
├── db.sql # Full SQL Dump (Tables, SP, Trigger, View)
└── README.md # Project instructions

yaml
Copy code

---

## ✅ How to Setup

### 1️⃣ Requirements

- Localhost (XAMPP, Laragon, etc)
- PHP 7+ / 8+
- MySQL / MariaDB

---

### 2️⃣ Create Database

1. Start Apache + MySQL
2. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Click **Databases** ➜ Create database: `db_driven_webapp`
4. Import `db.sql`  
   ✅ This will create:  
   - Tables: `manufacturer`, `product`  
   - Stored Procedure: `insert_manufacturer`  
   - Trigger: `after_manufacturer_delete`  
   - View: `expensive_products`

---

### 3️⃣ Configure DB Credentials

Inside `index.php`:
```php
$conn = new mysqli("localhost", "root", "YOUR_PASSWORD", "db_driven_webapp");
Replace "YOUR_PASSWORD" with your MySQL root password.
(Default for XAMPP is "" — empty)

4️⃣ Run & Test
✅ Add Manufacturer ➜ Calls Stored Procedure

✅ Add Product ➜ Linked to Manufacturer ID

✅ View Products ➜ Price > 5000 (View)

✅ Edit Product ➜ Bootstrap Modal + SweetAlert2

✅ Delete Product ➜ Confirmation via SweetAlert2

✅ Delete Manufacturer ➜ Related products auto deleted (Trigger)

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
✔️ Single entry point (index.php)
✔️ Clean procedural PHP
✔️ Uses Stored Procedure for secure insert
✔️ Uses Trigger for relational integrity
✔️ Uses View for filtered product list
✔️ Bootstrap for responsive layout
✔️ SweetAlert2 for modern UX

❤️ Credits
Built by @hiclassic
For DB Driven Web App Module / Assignment / Practice.