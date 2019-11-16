<?php
session_start();
//Server connection
include 'connect.php';

$bugId = filter_var($_REQUEST["id"], FILTER_SANITIZE_STRING);
$newIndex = filter_var($_REQUEST["newIndex"], FILTER_SANITIZE_STRING);

$sql = "CALL UpdateBugIndex($bugId, $newIndex);";
$result = mysqli_query($connection, $sql)or die("Error");

mysqli_close($connection);
