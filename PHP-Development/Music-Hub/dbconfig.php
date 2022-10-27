<?php

$dbhost = 'localhost';
$dbdatabase = 'skillvertex';
$dbuser = 'root';
$dbpwd = '';

$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbdatabase);

if(!$conn) {
    echo "Database not connected<br>",mysqli_connect_error();
}
?>