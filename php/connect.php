<?php
$servername = getenv('DB_URL');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

$connection = mysqli_connect($servername, $username, $password, $dbname)or die('Error');
mysqli_set_charset($connection, 'utf8');