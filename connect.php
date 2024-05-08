<?php
$GLOBALS['connection'] = new mysqli('localhost', 'root', '', 'dbsegundof3');

if (!$connection) {
	die(mysqli_error($mysqli));
}
