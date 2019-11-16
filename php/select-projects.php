<?php
session_start();

//Server connection
include 'connect.php';

$teamId = $_REQUEST['teamId'];

$sql = "CALL SelectProjects($teamId);";
$result = mysqli_query($connection, $sql)or die("Error");

$i = 0;
$rows = mysqli_num_rows($result);

//Creates JSON with results
echo '{';
    for ($i; $i <$rows ; $i++) {
        if (mysqli_data_seek($result, $i)){
            $resultRow = mysqli_fetch_assoc($result);
            $num = $i + 1;
            echo '"project'.$num.'":{"id":"'.$resultRow['id_project'].'",
                  "title":"'.$resultRow['nm_project'].'", 
                  "team":"'.$resultRow['teams_id_team'].'"}';
            if($i != $rows-1){
                echo ',';
            }
        }
    }
echo '}';

mysqli_close($connection);