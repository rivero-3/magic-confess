<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

include_once 'includes/conn.php';

$otp = rand(111111, 999999);
$email = $_POST["email"];

if (isset($_POST["send"])) {
   $sql_update = "UPDATE akun SET otp = :otp WHERE email = :email";
   $statement = $pdo->prepare($sql_update);
   $statement->execute(["otp" => $otp, "email" => $email]);

   $mail = new PHPMailer(true);

   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'magiconfezz@gmail.com';
   $mail->Password = 'soniyajkzskoujhi';
   $mail->SMTPSecure = 'ssl';
   $mail->Port = 465;

   $mail->setFrom('magiconfezz@gmail.com');

   $mail->addAddress($_POST["email"]);
   $mail->isHTML(true);
   $mail->Subject = "One Time Password";
   $mail->Body = "Your OTP to reset your password is: " . $otp;

   $mail->send();

   echo"<script>alert('The OTP was sent. Please Check your Message')</script>";

   header("Location: enterOTP.php");
}
