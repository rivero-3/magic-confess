<?php
require_once '../includes/conn.php';

$id = $_GET["id"];

$query = "DELETE FROM submit WHERE id = $id";
mysqli_query($conn, $query);

echo "
   <script>
      alert('Delete Success');
      document.location.href = 'message.php';
   </script>";
