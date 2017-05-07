<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $animal_id = $_POST['id'];
    $name = $_POST['name'];
//    $age =  $_POST['update_age'];
//    $breed = $_POST['update_breed'];
//    $weight = $_POST['update_weight'];
//    $arrived = $_POST['update_arrived'];
//    $description = $_POST['update_description'];
//    $size = $_POST['update_size'];
//    $adopted = $_POST['update_adopted'];

    // Updaste User details
    $query = "UPDATE animales SET name = '$name' WHERE animal_id = '$animal_id'";


    if ($mysqli->query($query) === TRUE) {

    } else {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    }

}