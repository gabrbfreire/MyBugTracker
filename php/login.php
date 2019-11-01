<?php
session_start();
//Conexão ao servidor
include 'connect.php';

$userEmail = filter_var($_REQUEST["n"], FILTER_SANITIZE_EMAIL);
$userPassword = filter_var($_REQUEST["p"], FILTER_SANITIZE_STRING);

//Chama procedure de Log In
$sql = "CALL LogIn('$userEmail');";
$result = mysqli_query($connection, $sql)or die("Erro");
$resultRow = mysqli_fetch_assoc($result);

//Login  
if($resultRow['em_usuario'] == $userEmail && password_verify($userPassword, $resultRow['pw_usuario']) == 1){
    $resultText = "";
    $_SESSION['usuario'] = $userEmail;
}else{
    $resultText = "Usuário ou Senha inválidos";
}
mysqli_close($connection);

echo $resultText;