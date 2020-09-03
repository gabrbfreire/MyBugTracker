<?php
$servername = getenv('DB_URL');
$username = "root";
$password = "root";
$dbname = "bug_tracker";

$connection = mysqli_connect($servername, $username, $password, $dbname)or die("Error");
mysqli_set_charset($connection, 'utf8');