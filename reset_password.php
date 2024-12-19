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
   <title>Change Password</title>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <?php
   include_once 'includes/conn.php';
   $otp = $_GET["otp"];

   $sql = "SELECT * FROM akun WHERE otp = :otp";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(["otp" => $otp]);
   $count = $stmt->rowCount();

   if (isset($_POST["change"])) {
      $new_password = $_POST["password"];
      $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

      $query = "UPDATE akun SET password = '$new_password_hash' WHERE otp = $otp";
      mysqli_query($conn, $query);

      header("Location: login.php");
   }

   if ($count > 0) { ?>
      <div class="wrapper">
         <form method="POST" name="form" id="form">
            <h1>Change Password</h1>
            <div class="input-box">
               <input type="password" name="password" id="password" placeholder="New Password" required>
            </div>
            <div class="input-box">
               <input type="password" name="confirm" placeholder="Confirm Password" required>
            </div>

            <button name="change" class="btn">Change</button>

            <div class="register-link">
               <p>Don't have an account?
                  <a href="register.php">Register</a>
               </p>
            </div>
         </form>
      </div>
   <?php } else {
      echo "
      <script>
         alert('Incorect OTP');
         document.location.href = 'enterOTP.php';
      </script>";
   } ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="js/form.js"></script>
</body>

</html>