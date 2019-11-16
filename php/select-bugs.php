<?php
session_start();
//Server connection
include 'connect.php';

$projectId = $_REQUEST['projectId'];

if($projectId == 'undefined' || $projectId == 0){
    exit();
}

$sql = "CALL SelectBugs($projectId);";
$result = mysqli_query($connection, $sql)or die("Error");

$i = 0;
$rows = mysqli_num_rows($result);

//Creates JSON with results
echo '{';
    for ($i; $i <$rows ; $i++) {
        if (mysqli_data_seek($result, $i)){
            $resultRow = mysqli_fetch_assoc($result);
            $num = $i + 1;
            echo '"bug'.$num.'":{"id":"'.$resultRow['id_bug'].'",
                  "title":"'.$resultRow['nm_bug'].'", 
                  "desc":"'.$resultRow['nm_bugDesc'].'",
                  "status":"'.$resultRow['cd_status'].'",
                  "project":"'.$resultRow['projects_id_project'].'"}';
            if($i != $rows-1){
                echo ',';
            }
        }
    }
echo '}';

mysqli_close($connection);