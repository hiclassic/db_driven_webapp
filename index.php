<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manufacturer Entry</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .fade-in {
      animation: fadeIn 1s ease-in;
    }
    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(-10px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5 fade-in">
    <div class="card shadow p-4">
      <h2><i class="fas fa-industry"></i> Add Manufacturer</h2>
      <form action="insert.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Contact No</label>
          <input type="text" name="contact_no" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">
          <i class="fas fa-plus-circle"></i> Insert
        </button>
      </form>
    </div>
  </div>
</body>
</html>
