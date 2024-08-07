<?php
const SERVER = 'localhost';
const DB     = 'eoe_db';
$offset="+02:00";
$_SESSION['conn'] = $conn = new mysqli(SERVER, $_SESSION['uid'], $_SESSION['pwd'], DB);
$conn->set_charset('utf8');
$conn->query("SET time_zone='".$offset."';");
