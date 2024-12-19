<?php
require_once 'includes/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Page</title>
   <link rel="stylesheet" href="css/style1.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
   <?php
   if (isset($_POST["submit"])) {
      $nama = $_POST['nama'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];

      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO akun(nama, username, email, phone, password, gender, level) 
               VALUES ('$nama', '$username', '$email', '$phone', '$password_hash', '$gender', 1)";
      mysqli_query($conn, $query);

      header("Location:login.php");
   }
   ?>

   <div class="container">
      <div class="title">Registration</div>
      <form action="" method="POST" name="form" id="form">
         <div class="user-details">
            <div class="input-box">
               <span class="details">Full Name</span>
               <input type="text" name="nama" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
               <span class="details">Username</span>
               <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
               <span class="details">Email</span>
               <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
               <span class="details">Phone Number</span>
               <input type="text" name="phone" placeholder="Enter your phone number" value="+62" required>
            </div>
            <div class="input-box">
               <span class="details">Password</span>
               <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
               <span class="details">Confirm Password</span>
               <input type="password" id="confirmPassword" name="confirm" placeholder="Confirm your password" required>
            </div>
         </div>
         <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="Male">
            <input type="radio" name="gender" id="dot-2" value="Female">
            <input type="radio" name="gender" id="dot-3" value="Other">
            <span class="gender-title">Gender</span>
            <div class="category">
               <label for="dot-1">
                  <span class="dot one"></span>
                  <span class="gender">Male</span>
               </label>
               <label for="dot-2">
                  <span class="dot two"></span>
                  <span class="gender">Female</span>
               </label>
               <label for="dot-3">
                  <span class="dot three"></span>
                  <span class="gender">Prefer not to say</span>
               </label>
            </div>
         </div>
         <div class="button">
            <input type="submit" name="submit" value="Register">
         </div>
         <div class="register-link">
            <p>Already have an account?
               <a href="login.php">Login</a>
            </p>
         </div>
      </form>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="js/form.js"></script>
</body>

</html>