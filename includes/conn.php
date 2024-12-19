<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'gifezz';

$conn = new mysqli($host, $user, $pass, $database);
$pdo = new PDO("mysql: host=$host; dbname=$database", $user, $pass);