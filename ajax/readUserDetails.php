<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $animal_id = $_POST['id'];

    // Get User Details
    $sql = "SELECT * FROM animales  where  animal_id = '$animal_id'";
    if (!$resultado = $mysqli->query($sql)) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    }

    $response = array();

    if ($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_assoc ($resultado)) {
            $response = $row;
        }
    } else {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

$resultado->free();
$mysqli->close();