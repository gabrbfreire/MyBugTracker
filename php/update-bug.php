<?php
session_start();
//Server connection
include 'connect.php';

$bugId = filter_var($_REQUEST["bugId"]);
$bugTitle = filter_var($_REQUEST["bugTitle"], FILTER_SANITIZE_STRING);
$bugDesc = filter_var($_REQUEST["bugDesc"], FILTER_SANITIZE_STRING);

$sql = "CALL UpdateBug($bugId, '$bugTitle', '$bugDesc');";
$result = mysqli_query($connection, $sql)or die("Error");

mysqli_close($connection);
