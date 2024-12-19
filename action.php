<?php
require_once 'includes/conn.php';

$id = $_GET["id"];

if (!isset($_SESSION["login-user"])) {
   header("Location: login.php");
   exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Send The Song</title>
   <link rel="stylesheet" href="css/bootstrap.css" />
   <link rel="stylesheet" href="css/submit.css" />
   <link rel="stylesheet" href="css/home.css" />

   <style>
      @import url("https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Averia+Gruesa+Libre&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
   </style>

   <!-- ICON -->
   <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
   <?php
   if (isset($_POST["edit"])) {
      $akun = htmlspecialchars($_SESSION['username']);
      $pengirim = htmlspecialchars($_POST['sender']);
      $penerima = htmlspecialchars($_POST['recipient']);
      $pesan = htmlspecialchars(string: $_POST['message']);


      // QUERY INSERT DATA
      $query = "UPDATE submit SET akun = '$akun', pengirim = '$pengirim', penerima = '$penerima', pesan = '$pesan' WHERE id = $id";
      mysqli_query($conn, $query);

      echo "
         <script>
            alert('Edit Success');
            document.location.href = 'akun.php';
         </script>";
   }

   if (isset($_POST["delete"])) {

      // QUERY INSERT DATA
      $query = "DELETE FROM submit WHERE id = $id";
      mysqli_query($conn, $query);

      echo "
         <script>
            alert('Delete Success');
            document.location.href = 'akun.php';
         </script>";
   }
   ?>

   <!-- NAVBAR START -->
   <nav class="navbarr">
      <a href="index.php" class="navbar-logo header">GiFezz</a>

      <div class="navbar-nav primary-font">
         <a href="submit.php">Submit</a>
         <a href="search.php">Browse</a>
         <a href="about.php">About</a>
         <a href="contact.php">Contact</a>
      </div>

      <div class="img header">
         <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="..."
            style="border-radius: 50px;">
         <a href="akun.php">
            <?php
            if (isset($_COOKIE["uname"])) {
               echo "$_COOKIE[uname]";
            } else {
               echo "$_SESSION[username]";
            }
            ?>
         </a>
      </div>
   </nav>
   <!-- NAVBAR END -->

   <br id="home">
   <section class="form">
      <div class="container">
         <form action="" method="POST">
            <?php
            $query = "SELECT * FROM submit WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result)
               ?>
            <label for="recipient">Sender Name</label>
            <input type="text" id="sender" name="sender" placeholder="Enter your name"
               value="<?= $data['pengirim'] ?>" />

            <label for="recipient">Recipient Name</label>
            <input type="text" id="recipient" name="recipient" placeholder="Enter recipient's name"
               value="<?= $data['penerima'] ?>" />

            <label for="message">Message</label>
            <input type="text" id="message" name="message" placeholder="Write your message here"
               value="<?= $data['pesan'] ?>" />


            <button type="submit" name="edit">Edit</button>
            <br><br>
            <button type="submit" name="delete">Delete</button>
         </form>
      </div>
   </section>

   <!-- FOOTER START -->
   <footer>
      <div class="socials">
         <a href="#"><i data-feather="instagram"></i></a>
         <a href="#"><i data-feather="twitter"></i></a>
         <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links primary-font">
         <a href="#home">Go Up</a>
         <a href="submit.php">Submit</a>
         <a href="search.php">Browse</a>
         <a href="about.php">About</a>
         <a href="contact.php">Contact</a>
      </div>

      <div class="credit header" style="font-weight: 400;">
         <p>Created by <span>Kelompok 6</span> | &copy; 2024.</p>
      </div>
   </footer>
   <!-- FOOTER END -->

   <!-- ICON -->
   <script>
      feather.replace();
   </script>

   <script src="js/submit.js"></script>

   <!-- SWEETALERT -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>