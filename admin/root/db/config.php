<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'web');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
