<?php
// DB Connection
$conn = new mysqli("localhost", "root", "2997", "db_driven_webapp");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}