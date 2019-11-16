<?php
session_start();
//Server connection
include 'connect.php';

$userName = filter_var($_REQUEST["name"], FILTER_SANITIZE_STRING);
$userLastName = filter_var($_REQUEST["lastName"], FILTER_SANITIZE_STRING);
$userEmail = filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
$userPassword = filter_var($_REQUEST["password"], FILTER_SANITIZE_STRING);

//
$sql = "CALL SelectUser('$userEmail');";
$result = mysqli_query($connection, $sql)or die("Error");
$resultRow = mysqli_fetch_assoc($result);

//Sign In
//
if($resultRow['nm_email_user'] == $userEmail){ 
  $resultText = "Someone already has this email address. Try another name.";
}else{
  mysqli_close($connection);
  $connection = mysqli_connect($servername, $username, $password, $dbname)or die("Error");

  $hash = password_hash($userPassword, PASSWORD_DEFAULT); //Creates hash
  $sql = "CALL RegisterUser('$userName', '$userLastName', '$userEmail', '$hash');"; //Calls Register SP

  $result = mysqli_query($connection, $sql)or die("Error");

  $resultText = "";
  $_SESSION['user'] = $userEmail;
}
mysqli_close($connection);

echo $resultText;