<?php
session_start();
//Server connection
include 'connect.php';

$bugTitle = filter_var($_REQUEST["bugTitle"], FILTER_SANITIZE_STRING);
$bugDesc = filter_var($_REQUEST["bugDesc"], FILTER_SANITIZE_STRING);
$projectId = filter_var($_REQUEST["projectId"]);

$sql = "CALL RegisterBug('$bugTitle', '$bugDesc', $projectId);";
$result = mysqli_query($connection, $sql)or die("Error");
