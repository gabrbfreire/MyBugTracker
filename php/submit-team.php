<?php
session_start();
//Server connection
include 'connect.php';

$teamName = filter_var($_REQUEST["teamName"], FILTER_SANITIZE_STRING);
$userId = filter_var($_SESSION["userId"]);

$sql = "CALL RegisterTeam($userId, '$teamName');";
$result = mysqli_query($connection, $sql)or die("Error");

mysqli_close($connection);
