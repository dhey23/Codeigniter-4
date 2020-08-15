<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourpackage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname) or die(mysql_error($mysqli));

if (isset($_POST['btnSubmit'])) {
	$name = $_POST['txtName'];
	
	$mysqli->query("INSERT INTO contact_us (name) VALUES('$name')") or die($mysqli->error);
}

?>