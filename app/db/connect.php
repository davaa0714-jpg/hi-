<?php

$host = 'localhost:3306';
$user = 'standardubgov';
$pass = 'QD.$80}z&$4Q';
$db_name = 'standard_wp';

$conn = new MySQLi($host, $user, $pass, $db_name);

mysqli_set_charset($conn, "utf8");
mysqli_query($conn, "SET CHARACTER SET utf8;");
mysqli_query($conn, "SET NAMES utf8");