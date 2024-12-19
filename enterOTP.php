<?php
require_once 'includes/conn.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['uname'])) {
   $id = $_COOKIE['id'];
   $uname = $_COOKIE['uname'];


   $query = "SELECT username FROM akun WHERE id = $id";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_assoc($result);

   if ($uname === hash('sha256', $data['username'])) {
      $_SESSION['login'] = true;
   }
}

if (isset($_SESSION["login"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Enter OTP</title>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="wrapper">
      <form method="GET" action="reset_password.php">
         <h1>Enter OTP</h1>

         <div class="input-box">
            <input type="password" name="otp" placeholder="Your OTP" required>
         </div>

         <button class="btn">Submit</button>
      </form>

      <div class="register-link">
         <p>Don't have an account?
            <a href="register.php">Register</a>
         </p>
      </div>
      </form>
   </div>
</body>

</html>