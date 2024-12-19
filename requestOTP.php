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
   <title>Forgot Password</title>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <div class="wrapper">
      <form action="sendOTP.php" method="POST">
         <h1>Request OTP</h1>

         <form action="sendOTP" method="POST">
            <div class="input-box">
               <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>

            <button type="submit" name="send" class="btn">Send</button>
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