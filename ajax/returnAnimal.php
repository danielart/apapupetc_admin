<?php
// check request

    // include Database connection file
    include("db_connection.php");

    // get user id
    $animal_id = $_POST['id'];

    // delete User
    $sql = "UPDATE animales SET adopted = 0 where  animal_id = '$animal_id'";
    if (!$resultado = $mysqli->query($sql)) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    }

    $mysqli->close();

?>