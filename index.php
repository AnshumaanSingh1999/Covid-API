<?php


$response=array();

$db_connection = mysqli_connect("localhost", "root", "", "dummyapi");
if($db_connection){
    $query = "SELECT * FROM covid"; 
    $result = mysqli_query($db_connection,$query);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['Total Cases']=$row['Total Cases'];
            $response[$i]['Total Recovered']=$row['Total Recovered'];
            $response[$i]['Total Dead']=$row['Total Dead'];
            $response[$i]['Countries Affected']=$row['Countries Affected'];
            $i++;

        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    echo "DB not connected";
}