<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "idoctor";

$patient_id = $doctor_id = $date = $time = "";

if(isset ($_GET['patient_id'])) {$patient_id = $_GET['patient_id'];}
if(isset ($_GET['doctor_id'])) {$doctor_id = $_GET['doctor_id'];}
if(isset ($_GET['date'])) {$date = $_GET['date'];}
if(isset ($_GET['time'])) {$time = $_GET['time'];}

$def_time = '0000-00-00';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM appointments WHERE PatientID= '$patient_id' AND DoctorID='$doctor_id ' AND Date='$date' AND TimeID='$time'";

if ($conn->query($sql) === TRUE) {
	//connect to timeslots table and update it here
	//$sql1 = "UPDATE timeslots SET slot_date='$def_time' WHERE DoctorID='$doctor_id ' AND slot_date='$date' AND slot_time='$time'";
	
	$sql1 = "DELETE FROM timeslots WHERE DoctorID='$doctor_id ' AND slot_date='$date' AND slot_time='$time'";
	$query = $conn->query($sql1);
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>