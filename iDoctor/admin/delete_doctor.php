<?php

$email_id = "";
if(isset ($_GET['drEmail'])) {$email_id = $_GET['drEmail'];}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "idoctor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM doctors WHERE Email= '$email_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>