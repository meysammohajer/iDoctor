<?php

$servername = "localhost";
$userr = "root";
$password = "root";
session_start();
$email =  $_SESSION['sess_email'];

try {
    $conn = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
	$fname = $lname = $city = "";
	$patientid = null;
	$sql = 'SELECT email,LastName,FirstName,PatientID,City FROM patients';
	foreach ($conn->query($sql) as $row) 
	{
        if($row['email']==$email)
		{
			$fname = $row['FirstName'];
			$lname = $row['LastName'];
			$city = $row['City'];
			$patientid = $row['PatientID'];
		}
	}
	//echo $power_animal;
	$_SESSION["sess_lname"] = $lname;
	$_SESSION["sess_fname"] =  $fname;
	$_SESSION['sess_city'] = $city;
	$_SESSION["sess_patientID"] = $patientid;
	
	/*$sql="SELECT * FROM appointments JOIN doctors on doctors.DoctorID = appointments.DoctorID"; 
	$result = mysqli_query($conn,$sql);
	$patientid = "3";
*/
	$sql="SELECT * FROM appointments JOIN patients ON appointments.PatientID = patients.PatientID JOIN doctors on doctors.DoctorID = appointments.DoctorID WHERE patients.PatientID = '" . $_SESSION["sess_patientID"] . "'"; 
	$result = mysqli_query($conn,$sql);

	$i = 1;
	while($row = mysqli_fetch_array($result))
	{
	
	//if($patientid == $row['PatientID']){
	
	echo "<div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br>";
	echo "<img src=\"images/appt.jpg\" alt=\"Avatar\" class=\"w3-left w3-margin-right\" style=\"width:40px\">";
	echo "<p><strong>Date : </strong>" . "<h7 id = 'dateApp" . $i . "'>" . $row['Date'] . "</h7>" . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	echo "<strong>Time : </strong>" . "<h7 id = 'timeApp" . $i . "'>" . $row['TimeID'] . "</h7>" . "</p>";
	echo "<hr class=\"w3-clear\">";
	
	echo "<p><strong>Doctor Name : </strong>" . $row['FirstName'] . " " . $row['LastName']; 
	echo "<p><strong>Specialization : </strong>" . $row['Specialization'] . "<br>";
	echo "<strong>Phone : </strong>" . $row['PhoneNumber'] . "<br>"; 
	echo "<strong>Address : </strong>" . $row['Address'] . ", " . $row['City'] . ", " . $row['State'] . " " . $row['Zipcode'] . "</p>"; 
    
	echo "<p id = 'drID" . $i . "'hidden>" . $row['DoctorID'] . "</p>";

	echo "<button id = 'cancelAppointButton". $i . "' onclick =\"cancelAppointment('" . $i . "')\" class=\"w3-btn w3-theme-d2 w3-margin-bottom w3-right\">Cancel Appointment</button>";
	$i = $i + 1;
	echo "</div>";
	
	//}
	
}
	
mysqli_close($conn);
session_write_close();


}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
?>

