<?php
require_once "../includes/conn.php";

$_SESSION = [];
session_unset();
session_destroy();

if (isset($_COOKIE["uname"])) {
   setcookie('id', '', time() - 3600, '/');
   setcookie('uname', '', time() - 3600, '/');
   setcookie('nama', '', time() - 3600, '/');
   setcookie('pass', '', time() - 3600, '/');
}

echo "
   <script>
      alert('Logout Success');
      document.location.href = '../login.php';
   </script>";
exit();