<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "your_db_name";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];

  $sql = "CALL insert_manufacturer('$name', '$address', '$contact_no')";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Manufacturer inserted successfully!',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location.href = 'index.php';
      });
    </script>";
  } else {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '". $conn->error ."',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location.href = 'index.php';
      });
    </script>";
  }
}

$conn->close();
?>
