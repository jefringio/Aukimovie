<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "moviedb";

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";



if(!empty($_POST['id'])) {
	$id = $_POST['id'];
    $sql = "DELETE FROM  list WHERE id = '$id' ";

    if ($conn->query($sql) === TRUE) {
        echo "successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
	
}
$conn->close();
?>