<?php
require_once "includes/conn.php";

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
   <title>About Us</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
   <link rel="stylesheet" href="css/aboutpage.css" />
   <link rel="stylesheet" href="css/home.css" />

   <!-- FONT -->
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Averia+Gruesa+Libre&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
   </style>

   <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
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
            style="border-radius: 50px" />
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

   <header>
      <h1><i class="fas fa-globe icon icon-globe"></i>About Us</h1>
   </header>

   <div class="content header-thin">
      <p style="font-size: 1.2rem;">
         <i class="fas fa-heart icon icon-heart"></i>Welcome to GiFezz! Our
         platform is designed to give people a safe space to share their
         thoughts, experiences, and secrets anonymously. We believe that everyone
         deserves a place to express themselves freely, without fear of judgment
         or repercussion. Confess allows users to find solace, support, and
         connection with others who may relate to their stories, offering comfort
         and understanding within our community.
      </p>

      <p style="font-size: 1.2rem;">
         Through anonymous sharing, our platform encourages open communication
         and emotional release, helping people to unburden their minds and
         discover that they are not alone in their experiences. We hope Confess
         becomes a supportive environment where people can feel heard and valued.
      </p>

      <h2 style="margin-top: 3rem; color: #191d23;"><i class="fas fa-users icon icon-users"></i>Our Team</h2>
      <div class="team">
         <div class="member">
            <img src="img/mufti.jpg" alt="Team Member 1" />
            <h3>MUFTI FARDAN LUBIS</h3>
         </div>
         <div class="member">
            <img src="img/marco.jpg" alt="Team Member 2" />
            <h3>MARCO RIVERO HUTAGAOL</h3>
         </div>
         <div class="member">
            <img src="img/marvel.jpg" alt="Team Member 3" />
            <h3>MARVEL PASARIBU</h3>
         </div>
         <div class="member">
            <img
               src="img/anggie.jpg"
               alt="Team Member 4" />
            <h3>ANGGIE RAHMADINA NASUTION</h3>
         </div>
         <div class="member">
            <img src="img/shelly.jpg" alt="Team Member 5" />
            <h3>SHELLY</h3>
         </div>
      </div>
   </div>

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
         <a href="">Contact</a>
      </div>

      <div class="credit header" style="font-weight: 400">
         <p>Created by <span>Kelompok 6</span> | &copy; 2024.</p>
      </div>
   </footer>
   <!-- FOOTER END -->

   <!-- ICON -->
   <script>
      feather.replace();
   </script>
</body>

</html>