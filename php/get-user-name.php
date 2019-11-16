<?php
include 'php/connect.php';

$user = $_SESSION['user'];

$sql = "CALL SelectUser('$user');";
$result = mysqli_query($connection, $sql)or die("Erro");
$resultRow = mysqli_fetch_assoc($result);

$userName = $resultRow['nm_name_user'] ." ". $resultRow['nm_last_name_user'];

mysqli_close($connection);