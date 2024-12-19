<?php
require_once '../includes/conn.php';

$id = $_GET["id"];

$query = "DELETE FROM akun WHERE id = $id";
mysqli_query($conn, $query);

echo "
   <script>
      alert('The Account Successfuly Banned');
      document.location.href = 'akun.php';
   </script>";
