<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bug_tracker";

$connection = mysqli_connect($servername, $username, $password, $dbname)or die("Error");