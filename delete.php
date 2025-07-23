<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM product WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Deleted!',
        text: 'Product deleted successfully!'
      }).then(() => {
        window.location.href = 'view.php';
      });
    </script>";
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
?>
