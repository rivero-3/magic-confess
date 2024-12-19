<?php
require_once 'includes/conn.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['uname']) && isset($_COOKIE['pass'])) {
   $id = $_COOKIE['id'];
   $uname = $_COOKIE['uname'];
   $pass = $_COOKIE['pass'];

   $query = "SELECT username, password FROM akun WHERE id = $id";
   $result = mysqli_query($conn, $query);
   $data = mysqli_fetch_assoc($result);

   if ($uname == $data["username"] && $pass == $data["password"]) {
      $_SESSION['login-user'] = true;
      $_SESSION['login-admin'] = true;
   }
}

if (isset($_SESSION["login-admin"])) {
   header("Location: admin/index.php");
} else if (isset($_SESSION["login-user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <?php
   if (isset($_POST["login"])) {
      $username_login = $_POST['username'];
      $password_login = $_POST['password'];

      $query = "SELECT * FROM akun WHERE username = '$username_login'";
      $result = mysqli_query($conn, $query);

      $data = mysqli_fetch_array($result);
      $id = $data['id'];
      $username = $data['username'];
      $password = $data['password'];
      $nama = $data['nama'];
      $email = $data['email'];
      $level = $data['level'];

      if ($username_login == $username) {
         if (password_verify($password_login, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $nama;

            if (isset($_POST["remember"])) {
               setcookie('id', $id, time() + 3600, '/');
               setcookie('uname', $username, time() + 3600, '/');
               setcookie('nama', $nama, time() + 3600, '/');
               setcookie('pass', $password, time() + 3600, '/');
            }

            if ($level == 1) {
               $_SESSION["login-user"] = true;

               echo "
               <script>
                  alert('Login Success');
                  document.location.href = 'index.php';
               </script>";
            } else if ($level == 2) {
               $_SESSION["login-admin"] = true;

               echo "
               <script>
                  alert('Login Success');
                  document.location.href = 'admin/index.php';
               </script>";
            }

         } else {
            echo "
               <script>
                  alert('Wrong Password');
                  document.location.href = 'login.php';
               </script>";
         }
      } else {
         echo "
            <script>
               alert('Username Not Found');
               document.location.href = 'login.php';
            </script>";
      }
   }
   ?>

   <div class="wrapper">
      <form action="" method="POST">
         <h1>Login</h1>
         <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
         </div>
         <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
         </div>

         <div class="remember-forgot">
            <label><input type="checkbox" name="remember">Remember me</label>
            <a href="requestOTP.php">Forgot password?</a>
         </div>

         <button type="submit" name="login" class="btn">Log In</button>

         <div class="register-link">
            <p>Don't have an account?
               <a href="register.php">Register</a>
            </p>
         </div>
      </form>
   </div>
</body>

</html>