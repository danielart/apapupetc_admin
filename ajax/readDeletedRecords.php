<?php
// include Database connection file
include("db_connection.php");

// Design initial table header
$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Edad</th>
							<th>Entrada</th>
							<th>Raza</th>
							<th>Peso</th>
							<th>Acciones</th>
						</tr>';

// query
$sql = "SELECT * FROM animales where status = 1";
if (!$resultado = $mysqli->query($sql)) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($animal = $resultado->fetch_assoc()) {
        $data .= '<tr>
				<td>'.$animal['animal_id'].'</td>
				<td>'.utf8_encode($animal['name']).'</td>
				<td>'.utf8_encode($animal['age']).'</td>
				<td>'.utf8_encode($animal['arrived']).'</td>
				<td>'.utf8_encode($animal['breed']).'</td>
				<td>'.utf8_encode($animal['weight']).'</td>
				<td>
					<button onclick="GetUserDetails('.$animal['animal_id'].')" class="btn btn-warning">Editar</button>
					<button data-toggle="modal"
					onclick="setAnimalIdToDelete('.$animal['animal_id'].');"
					data-target=".bs-example-modal-lg"
					class="btn btn-danger deleteAnimal">
					    Borrar
					</button>
				</td>
    		</tr>';
    }
} else {
    // records now found
    $data .= '<tr><td colspan="8">Records not found!</td></tr>';
}

$data .= '</table>';

echo $data;

$resultado->free();
$mysqli->close();

?>
