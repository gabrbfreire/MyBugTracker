<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bug_tracker";

$conexao = mysqli_connect($servername, $username, $password, $dbname)or die("Error");