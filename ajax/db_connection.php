<?php

// Connection variables

$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "apapupetc"; // MySQL Database name



//
// $host = "pdb11.atspace.me"; // MySQL host name eg. localhost
// $user = "1377211_pupetc"; // MySQL user. eg. root ( if your on localserver)
// $password = "apapupetc2017db"; // MySQL user password  (if password is not set for your root user then keep it empty )
// $database = "1377211_pupetc"; // MySQL Database name

$mysqli = new mysqli($host, $user, $password, $database);

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos

    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
?>
