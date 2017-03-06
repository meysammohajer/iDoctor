<?php

$pat_id = $doc_id = "";
if(isset ($_GET['pat_id'])) {$pat_id = $_GET['pat_id'];}
if(isset ($_GET['doc_id'])) {$doc_id = $_GET['doc_id'];}
// Create connection
$conn = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM favorites WHERE PatientID= '$pat_id' AND DoctorID='$doc_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>