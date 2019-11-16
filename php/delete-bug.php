<?php
session_start();
//Conexão ao servidor
include 'connect.php';

$userId = filter_var($_REQUEST["id"], FILTER_SANITIZE_EMAIL);

//Chama procedure de Log In
$sql = "CALL DeleteBug('$userId');";
$result = mysqli_query($connection, $sql)or die("Erro");

mysqli_close($connection);