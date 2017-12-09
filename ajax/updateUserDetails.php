<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $animal_id = $_POST['id'];
    $name = $_POST['name'];
    $age =  $_POST['age'];
    $breed = $_POST['breed'];
    $weight = $_POST['weight'];
    $arrived = $_POST['arrived'];
    $description = $_POST['desc'];
    $size = $_POST['size'];
    $puppy = $_POST['puppy'];
    $adopted = $_POST['adopted'];
    $adoptedDate = $_POST['adoptedDate'];


    // Updaste User details
    $query = "UPDATE animales 
                SET name = '$name', age = '$age', breed = '$breed', 
                    weight = '$weight', arrived = '$arrived', description = '$description', 
                    size = '$size', adopted = '$adopted', adopted_date = '$adoptedDate' 
              WHERE animal_id = '$animal_id'";

    echo $query;

    if ($mysqli->query($query) === TRUE) {
        echo "ok";

    } else {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    }

}