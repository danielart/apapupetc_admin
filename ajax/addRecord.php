<?php
	if(isset($_POST['name']) &&
	 isset($_POST['age']) &&
	 isset($_POST['breed']) &&
	 isset($_POST['weight']) &&
	 isset($_POST['arrived']) &&
	 isset($_POST['description']) &&
	 isset($_POST['size']))
	{
		// include Database connection file
		include("db_connection.php");

		// get values
		$name = $_POST['name'];
		$age =  $_POST['age'];
		$breed = $_POST['breed'];
		$weight = $_POST['weight'];
		$arrived = $_POST['arrived'];
		$description = $_POST['description'];
		$size = $_POST['size'];

		$query = "INSERT INTO animales(name, age, breed, weight,arrived,description,size)
		VALUES('$name',
			'$age',
			'$breed',
			'$weight',
			'$arrived',
			'$description',
			'$size')";
		if (!$resultado = $mysqli->query($query)) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            exit;
	    }
	    echo "1 Record Added!";
			$resultado->free();
			$mysqli->close();
	}
?>
