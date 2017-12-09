<?php
// include Database connection file
include("db_connection.php");

// Design initial table header
$data = '';

// query
$sql = "SELECT * FROM animales where status = 1 AND adopted=0";
if (!$resultado = $mysqli->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

    $output = $resultado->fetch_all( MYSQLI_ASSOC );
    echo json_encode( $output );

$resultado->free();
$mysqli->close();


