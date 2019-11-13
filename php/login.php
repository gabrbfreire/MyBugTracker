<?php
session_start();
//Conexão ao servidor
include 'connect.php';

$userEmail = filter_var($_REQUEST["name"], FILTER_SANITIZE_EMAIL);
$userPassword = filter_var($_REQUEST["password"], FILTER_SANITIZE_STRING);

//Chama procedure de Log In
$sql = "CALL SelectUser('$userEmail');";
$result = mysqli_query($connection, $sql)or die("Erro");
$resultRow = mysqli_fetch_assoc($result);

//Login  
if($resultRow['nm_email_user'] == $userEmail && password_verify($userPassword, $resultRow['pw_user']) == 1){
    $resultText = "";
    $_SESSION['user'] = $userEmail;
    $_SESSION['userId'] = $resultRow['id_user'];
}else{
    $resultText = "Email or password not valid.";
}
mysqli_close($connection);

echo $resultText;