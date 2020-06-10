<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'tcs2_day14';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->error) {
    die('Tidak dapat terhubung');
}

?>