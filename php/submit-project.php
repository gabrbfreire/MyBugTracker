<?php
session_start();
//Server connection
include 'connect.php';

$projectName = filter_var($_REQUEST["projectName"], FILTER_SANITIZE_STRING);
$userId = filter_var($_SESSION["userId"]);
$teamId = filter_var($_REQUEST["teamId"]);

$sql = "CALL RegisterProject($userId, '$projectName', $teamId);";
$result = mysqli_query($connection, $sql)or die("Error");

mysqli_close($connection);
