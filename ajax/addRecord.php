<?php
if (isset($_POST['name']) &&
    isset($_POST['age']) &&
    isset($_POST['breed']) &&
    isset($_POST['weight']) &&
    isset($_POST['arrived']) &&
    isset($_POST['description']) &&
    isset($_POST['size'])
) {
    // include Database connection file
    include("db_connection.php");

    // get values
    $name = $_POST['name'];
    $age = $_POST['age'];
    $breed = $_POST['breed'];
    $weight = $_POST['weight'];
    $arrived = $_POST['arrived'];
    $description = $_POST['description'];
    $size = $_POST['size'];

    echo($name . " - " . $age);

    $query = "INSERT INTO animales(name, age, breed, weight,arrived,description,size)
									VALUES(	'$name',
													'$age',
													'$breed',
													'$weight',
													'$arrived',
													'$description',
													'$size')";

    echo($query);

    if (!$resultado = $mysqli->query($query)) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        exit;
    } else {
        $last_id = $conn->insert_id;
    }
    echo("last_id " . $last_id);
    echo "1 Record Added!";

    $mysqli->close();
}
