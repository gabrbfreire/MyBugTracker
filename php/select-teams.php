<?php
session_start();

//Server connection
include 'connect.php';

$userId = $_SESSION['userId'];

$sql = "CALL SelectTeams($userId);";
$result = mysqli_query($connection, $sql)or die("Error");

$i = 0;
$rows = mysqli_num_rows($result);

//Creates JSON with results
echo '{';
    for ($i; $i <$rows ; $i++) {
        if (mysqli_data_seek($result, $i)){
            $resultRow = mysqli_fetch_assoc($result);
            $num = $i + 1;
            echo '"team'.$num.'":{"id":"'.$resultRow['id_team'].'",
                  "name":"'.$resultRow['nm_team'].'"}';
            if($i != $rows-1){
                echo ',';
            }
        }
    }
echo '}';

mysqli_close($connection);