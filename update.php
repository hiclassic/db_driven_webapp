<?php
$conn = new mysqli("localhost", "root", "", "your_db_name");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];

  $sql = "UPDATE product SET name='$name', price='$price' WHERE id='$id'";
  if ($conn->query($sql) === TRUE) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Updated!',
        text: 'Product updated successfully!'
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
