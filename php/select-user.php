<?php
session_start();

include 'php/connect.php';
$user = $_SESSION['user'];

$sql = "CALL SelectUser('$user');";
$result = mysqli_query($connection, $sql)or die("Erro");

$i = 0;
$rows = mysqli_num_rows($result);

//Creates JSON with results
echo '{';
    for ($i; $i <$rows ; $i++) {
        if (mysqli_data_seek($result, $i)){
            $resultRow = mysqli_fetch_assoc($result);
            $num = $i + 1;
            echo '"user'.$num.'":{"id":"'.$resultRow['id_project'].'",
                  "title":"'.$resultRow['nm_project'].'", 
                  "team":"'.$resultRow['teams_id_team'].'"}';
            if($i != $rows-1){
                echo ',';
            }
        }
    }
echo '}';