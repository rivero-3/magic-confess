<?php
require_once "../includes/conn.php";

$keyword = $_GET["keyword"];

$query = "SELECT * FROM submit WHERE penerima LIKE '%$keyword%'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $history = 1;
} else {
   $history = 0;
}
?>

<div style="margin-top: 3rem;" class="container boxx">
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
      <h4 class="header-thin">This recipient name was not found</h4>
   <?php } ?>
</div>