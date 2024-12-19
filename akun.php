<?php
require_once 'includes/conn.php';

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
   <title>Your Account</title>

   <!-- TYPING CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js "></script>

   <!-- STYLE -->
   <link rel="stylesheet" href="css/akun.css" />
   <link rel="stylesheet" href="css/search.css" />
   <link rel="stylesheet" href="css/bootstrap.css" />
   <link rel="stylesheet" href="css/home.css" />

   <!-- ICON -->
   <script src="https://unpkg.com/feather-icons"></script>

   <!-- FONT -->
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Averia+Gruesa+Libre&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
   </style>
</head>

<body>
   <!-- NAVBAR START -->
   <nav class="navbarr">
      <a href="index.php" class="navbar-logo header">GiFezz</a>

      <div class="navbar-nav primary-font">
         <a href="submit.php">Submit</a>
         <a href="search.php">Browse</a>
         <a href="contact.php">Contact</a>
         <a href="process/logout.php">Logout</a>
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

   <!-- HERO SECT START -->
   <br id="home">
   <section>
      <div class="hero">
         <div class="content">
            <h1 class="header">
               Hi, <?php
               if (isset($_COOKIE["uname"])) {
                  echo "$_COOKIE[nama]";
               } else {
                  echo "$_SESSION[nama]";
               }
               ?>
            </h1>
            <br>
            <p class="primary-font">
               This is Your Account Page.
            </p>
         </div>
      </div>
   </section>
   <!-- HERO SECT END -->

   <!-- CONFESS BOX START -->


   <section class="confess" style="margin-top: 0;">
      <div style="margin-top: 2rem;" class="herooo">
         <div class="content">
            <h1 class="header">
               Your History
            </h1>
         </div>
      </div>
      <div style="margin-top: 3rem;" class="container boxx">
         <?php
         if (isset($_COOKIE["uname"])) {
            $akun = $_COOKIE["uname"];
         } else {
            $akun = $_SESSION['username'];
         }
         $query = "SELECT * FROM submit WHERE akun = '$akun'";
         $result = mysqli_query($conn, $query);

         if (mysqli_num_rows($result) > 0) {
            $history = 1;
         } else {
            $history = 0;
         }
         ?>

         <?php if ($history == 1) { ?>
            <?php foreach ($result as $row) { ?>
               <a href="action.php?id= <?= $row["id"]; ?>" style="color:black; text-decoration:none;">
                  <div class="confess-box primary-font">
                     <h5>To &nbsp;: <?= $row['penerima'] ?> </h5>
                     <p> <?= $row['pesan'] ?> </p>
                     <h5>From: &nbsp; <?= $row['pengirim'] ?> </h5>
                  </div>
               </a>
            <?php } ?>
         <?php } else { ?>
            <h4 class="header-thin">You haven't posted anything yet</h4>
         <?php } ?>
      </div>
   </section>
   <!-- CONFESS BOX END -->

   <!-- BOX START -->
   <section>
      <div class="containerr">
         <div class="box">
            <div class="content header">
               <h3>Create Your Message</h3>
               <br />

               <p class="primary-font">
                  Write a heartfelt message to someone special.
               </p>
            </div>

            <div class="submit header" style="font-weight: 400;">
               <a href="submit.php">Create Messages</a>
            </div>
         </div>

         <div class="box">
            <div class="content header">
               <h3>Thank you!</h3>
               <br />

               <p class="primary-font" style="font-size: 1.2rem">
                  Thank your for using our website to send your untold messages.
               </p>
            </div>
         </div>

         <div class="box">
            <div class="content header">
               <h3>Search Message</h3>
               <br />

               <p class="primary-font">
                  Search by your name to find messages that were written for you.
               </p>
            </div>

            <div class="submit header" style="font-weight: 400;">
               <a href="search.php">Search Messages</a>
            </div>
         </div>
      </div>
   </section>
   <!-- BOX END -->

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

   <!-- JS -->
   <script src="js/home.js"></script>

   <!-- ICON -->
   <script>
      feather.replace();
   </script>

   <!-- TYPING CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js"
      integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>