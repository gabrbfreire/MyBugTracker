<?php
session_start();
//Conexão ao servidor
include 'connect.php';

$userEmail = filter_var($_REQUEST["n"], FILTER_SANITIZE_EMAIL);
$userPassword = filter_var($_REQUEST["p"], FILTER_SANITIZE_STRING);

//Chama procedure de Log In
$sql = "CALL LogIn('$userEmail');";
$result = mysqli_query($connection, $sql)or die("Error");
$resultRow = mysqli_fetch_assoc($result);

//Sign In
//Se usuário existir impede registro
if($resultRow['em_usuario'] == $userEmail){ 
  $resultText = "Usuário já existe";
}else{
  mysqli_close($connection);
  $connection = mysqli_connect($servername, $username, $password, $dbname)or die("Error");

  $hash = password_hash($userPassword, PASSWORD_DEFAULT); //Cria hash
  $sql = "CALL RegisterUser('$userEmail', '$hash');"; //Chama procedure de Sign In

  $result = mysqli_query($connection, $sql)or die("Error");

  $resultText = "";
  $_SESSION['usuario'] = $userEmail;
}
mysqli_close($connection);

echo $resultText;