<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2 class="mb-4">Products > 5000</h2>
      <?php
      $conn = new mysqli("localhost", "root", "", "your_db_name");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM expensive_products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>
        <table class='table table-striped table-hover'>
          <thead class='table-dark'>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Manufacturer ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['price']."</td>
            <td>".$row['manufacturer_id']."</td>
            <td>
              <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal".$row['id']."'>Edit</button>
              <button class='btn btn-sm btn-danger' onclick='deleteRecord(".$row['id'].")'>Delete</button>
            </td>
          </tr>";

          // Edit Modal for each row
          echo "
          <div class='modal fade' id='editModal".$row['id']."' tabindex='-1'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <form action='update.php' method='POST'>
                  <div class='modal-header'>
                    <h5 class='modal-title'>Edit Product</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                  </div>
                  <div class='modal-body'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <div class='mb-3'>
                      <label class='form-label'>Name</label>
                      <input type='text' name='name' class='form-control' value='".$row['name']."' required>
                    </div>
                    <div class='mb-3'>
                      <label class='form-label'>Price</label>
                      <input type='number' name='price' class='form-control' value='".$row['price']."' required>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button type='submit' name='update' class='btn btn-success'>Update</button>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          ";
        }
        echo "</tbody></table></div>";
      } else {
        echo "<div class='alert alert-warning'>No data found.</div>";
      }

      $conn->close();
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function deleteRecord(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: 'This record will be deleted!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'delete.php?id=' + id;
        }
      });
    }
  </script>
</body>
</html>
