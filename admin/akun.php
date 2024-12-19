<?php
require_once '../includes/conn.php';

if (!isset($_SESSION["login-admin"])) {
   header("Location: ../error.php");
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Account</title>

   <!-- TYPING CDN -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.8/typed.min.js "></script>

   <!-- STYLE -->
   <link rel="stylesheet" href="../css/home.css" />
   <link rel="stylesheet" href="../css/table.css" />

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

      <div class="navbar-nav primary-font" style="margin-left:68%;">
         <a href="message.php">Message</a>
         <a href="akun.php">Account</a>
         <a href="../process/logout.php">Logout</a>
      </div>

      <div class="img header">
         <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="..."
            style="border-radius: 50px;">
         <a href="index.php">
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

   <div class="table">
      <table border="1" cellpadding="10" cellspacing="20">
         <tr class="header">
            <th>No.</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Passord</th>
            <th>Gender</th>
            <th>Action</th>
         </tr>

         <?php
         $i = 1;
         $query = "SELECT * FROM akun";
         $result = mysqli_query($conn, $query);
         ?>
         <?php foreach ($result as $row): ?>
            <tr class="header-thin">
               <td><?= $i ?></td>
               <td><?= $row['nama'] ?></td>
               <td><?= $row['username'] ?></td>
               <td><?= $row['email'] ?></td>
               <td><?= $row['phone'] ?></td>
               <td><?= $row['password'] ?></td>
               <td><?= $row['gender'] ?></td>
               <td>
                  <button class="header-thin">
                     <a href="delete-akun.php?id= <?= $row["id"]; ?>">Ban</a>
                  </button>
               </td>
            </tr>
            <?php $i++; ?>
         <?php endforeach; ?>

      </table>


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
         <a href="about.php">About</a>
         <a href="">Contact</a>
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