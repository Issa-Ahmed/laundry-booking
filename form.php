<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry";
$pdo = new PDO("mysql:host=$servername;dbname=$database",$username,$password);

// Sanitize input
$fullname = htmlspecialchars($_POST['fullname']);
$phone = htmlspecialchars($_POST['phone']);
$type = htmlspecialchars($_POST['type']);
$message = htmlspecialchars($_POST['message']);

// Prepare statement
$stmt = $pdo->prepare("INSERT INTO bookings (fullname,phone,service,message) values(?,?,?,?)");
$stmt->execute([$fullname,$phone,$type,$message]);

header("Location:index.html");