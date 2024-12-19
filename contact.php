<?php
require_once 'includes/conn.php';

if (!isset($_SESSION["login-user"])) {
   header("Location: login.php");
   exit;
}

if (isset($_POST["send"])) {
   $nama = $_POST["nama"];
   $email = $_POST["email"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];

   $query = "INSERT INTO pesan(nama, email, subject, message) VALUES ('$nama' , '$email', '$subject', '$message')";
   mysqli_query($conn, $query);

   echo "
      <script>
         alert('Your Message was Sent');
         document.location.href = 'contact.php';
      </script>";
}
?>

<html>

<head>
   <title>Contact Us</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">
   <!-- STYLE -->
   <link rel="stylesheet" href="css/home.css" />

   <!-- ICON -->
   <script src="https://unpkg.com/feather-icons"></script>

   <!-- FONT -->
   <style>
      @import url("https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Averia+Gruesa+Libre&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Fira+Code:wght@300..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
   </style>

   <style>
      body {
         background: url('https://img.freepik.com/free-vector/gradient-black-background-with-cubes_23-2149177091.jpg?t=st=1732147113~exp=1732150713~hmac=412bbb441080eb3709f011d3e2eef0d5ff5735e9cd9557f59452504ad69dbfd9&w=1060') no-repeat center center fixed;
         background-size: cover;
         color: #DEDCDC;
         font-family: "Kanit", sans-serif
      }

      .header {
         text-align: center;
         margin-top: 30px;
         margin-bottom: 30px;
      }

      .infokontak {
         padding: 20px;
      }

      .infokontak p {
         font-size: 16px;
         margin-bottom: 10px;
         padding-left: 30px;
         padding-right: 20px;
         padding-top: 10px;
         padding-bottom: 50px;
         text-indent: -7px;
      }

      .formkontak {
         margin-top: 30px;
         margin-left: 100px;
         max-width: 600px;
         background: white;
         padding: 20px;
         border-radius: 10px;
         color: black;
      }

      label.error {
         font-weight: 700;
         display: block;
         color: #f00;
         font-size: 14px;
      }
   </style>
</head>

<body>
   <!-- NAVBAR START -->
   <nav style="padding-top:0.2rem;" class="navbarr">
      <a style="text-decoration: none;" href="index.php" class="navbar-logo header">GiFezz</a>

      <div class="navbar-nav primary-font">
         <a style="text-decoration: none;" href="submit.php">Submit</a>
         <a style="text-decoration: none;" href="search.php">Browse</a>
         <a style="text-decoration: none;" href="about.php">About</a>
         <a style="text-decoration: none;" href="contact.php">Contact</a>
      </div>

      <div class="img header">
         <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="..."
            style="border-radius: 50px;">
         <a style="text-decoration: none;" href="akun.php">
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

   <div class="container" style="margin-top:10rem;">
      <div class="row">
         <div class="col-md-6 infokontak animate__animated animate__fadeInLeft">
            <h2 styles="margin-top: 30px">Contact us</h2>
            <p><i class="fas fa-map-marker-alt"></i> <strong>ADDRESS:</strong><br>
               R.102, Gedung C Fasilkom-TI, Universitas Sumatera Utara, Jl. Alumni No.3, Padang Bulan, Kec. Medan
               Baru, Kota Medan, Sumatera Utara 20155</p>
            <p><i class="fas fa-phone"></i> <strong>PHONE:</strong><br> +62 81234567890</p>
            <p><i class="fas fa-envelope"></i> <strong>EMAIL:</strong><br> loremipsum@gmail.com</p>
            <p><i class="fas fa-globe"></i> <strong>WEBSITE:</strong><br> loremipsum.com</p>
         </div>
         <div class="col-md-6">
            <div class="formkontak animate__animated animate__fadeInRight">
               <h3 style="margin-bottom: 20px;">Get in touch</h3>
               <form name="form" id="form" method="POST">
                  <div class="mb-3">
                     <label for="name" class="form-label">Nama</label>
                     <input type="text" name="nama" class="form-control" id="name" placeholder="Nama" required>
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                  </div>
                  <div class="mb-3">
                     <label for="subject" class="form-label">Subject</label>
                     <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="mb-3">
                     <label for="message" class="form-label">Message</label>
                     <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message" required></textarea>
                  </div>
                  <button type="submit" name="send" class="btn btn-primary">Send Message</button>
               </form>
            </div>
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
         <a href="about.php">About</a>
         <a href="">Contact</a>
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

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <script src="js/form.js"></script>
</body>

</html>