<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $animal_id = $_POST['id'];

    // Get User Details
    $sql = "SELECT * FROM animales where animal_id = $animal_id";

    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc()){
        $json[] = $row;
    }

    $data = $json[0];

    echo json_encode($data);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

$result->free();
$mysqli->close();