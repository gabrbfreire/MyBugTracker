<?php
session_start();
//Server connection
include 'connect.php';

$bugId = filter_var($_REQUEST["id"], FILTER_SANITIZE_STRING);
$newStatus = filter_var($_REQUEST["newStatus"], FILTER_SANITIZE_STRING);

$sql = "CALL UpdateBugStatus($bugId, $newStatus);";
$result = mysqli_query($connection, $sql)or die("Error");
