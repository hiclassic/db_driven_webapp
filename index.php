<?php
// DB Connection
$conn = new mysqli("localhost", "root", "2997", "db_driven_webapp");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// ✅ Insert Manufacturer
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