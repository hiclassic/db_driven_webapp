<?php
// DB Connection
$conn = new mysqli("localhost", "root", "2997", "db_driven_webapp");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Insert Manufacturer
if (isset($_POST['submit_manufacturer'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $sql = "CALL insert_manufacturer('$name', '$address', '$contact_no')";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>Swal.fire({icon:'success',title:'Added!',text:'Manufacturer Added!'}).then(() => { window.location.href='?page=view_manufacturer'; });</script>";
    exit;
  } else {
    echo "Error: " . $conn->error;
  }
}


// Insert Product
if (isset($_POST['submit_product'])) {
  $pname = $_POST['product_name'];
  $pprice = $_POST['product_price'];
  $mid = $_POST['manufacturer_id'];
  $sql = "INSERT INTO product (name, price, manufacturer_id) VALUES ('$pname', '$pprice', '$mid')";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>Swal.fire({icon:'success',title:'Added!',text:'Product Added!'}).then(() => { window.location.href='?page=view'; });</script>";
    exit;
  } else {
    echo "Error: " . $conn->error;
  }
}


// Update Product
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $sql = "UPDATE product SET name='$name', price='$price' WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>Swal.fire({icon:'success',title:'Updated!',text:'Product Updated!'}).then(() => { window.location.href='?page=view'; });</script>";
    exit;
  } else {
    echo "Error: " . $conn->error;
  }
}

// Delete Product
if (isset($_GET['delete_id'])) {
  $id = $_GET['delete_id'];
  $sql = "DELETE FROM product WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>Swal.fire({icon:'success',title:'Deleted!',text:'Product Deleted!'}).then(() => { window.location.href='?page=view'; });</script>";
    exit;
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>DB Driven Web App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">DB Driven App</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="?page=insert"><i class="fas fa-plus"></i> Add Manufacturer</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=add_product"><i class="fas fa-box"></i> Add Product</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=view"><i class="fas fa-eye"></i> View Products</a></li>
        <li class="nav-item"><a class="nav-link" href="?page=view_manufacturer"><i class="fas fa-industry"></i> View Manufacturers</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'insert') {
  echo '
  <div class="card p-4 shadow">
    <h2><i class="fas fa-industry"></i> Add Manufacturer</h2>
    <form method="POST">
      <div class="mb-3"><label class="form-label">Name</label><input type="text" name="name" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Address</label><input type="text" name="address" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Contact No</label><input type="text" name="contact_no" class="form-control" required></div>
      <button type="submit" name="submit_manufacturer" class="btn btn-primary"><i class="fas fa-plus"></i> Add</button>
    </form>
  </div>';
} elseif ($page == 'add_product') {
  $manus = $conn->query("SELECT id, name FROM manufacturer");
  echo '
  <div class="card p-4 shadow">
    <h2><i class="fas fa-box"></i> Add Product</h2>
    <form method="POST">
      <div class="mb-3"><label class="form-label">Product Name</label><input type="text" name="product_name" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Price</label><input type="number" name="product_price" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Select Manufacturer</label>
      <select name="manufacturer_id" class="form-select" required>
        <option value="">-- Select Manufacturer --</option>';
        while ($row = $manus->fetch_assoc()) {
          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
  echo '</select></div>
      <button type="submit" name="submit_product" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
    </form>
  </div>';

