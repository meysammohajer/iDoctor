<?php

	$con = mysqli_connect('localhost','root','root','idoctor'); 
	if (!$con) { die('Could not connect: ' . mysqli_error($con)); }
	//$sql="SELECT * FROM doctors"; 
	//$result = mysqli_query($con,$sql);
	//$sql="SELECT * FROM appointments JOIN doctors on doctors.DoctorID = appointments.DoctorID"; 
	/*$sql="SELECT * FROM appointments 
	JOIN doctors ON
		appointments.DoctorID=doctors.DoctorID
	JOIN patients ON
		appointments.PatientID=patients.PatientID";*/
	$sql = 'SELECT appointments.Date as Date, appointments.TimeID as Time, doctors.FirstName AS doctorFN, doctors.LastName AS doctorLN, patients.LastName AS patientLN, patients.FirstName AS patientFN FROM appointments JOIN doctors ON appointments.DoctorID=doctors.DoctorID JOIN patients ON
		appointments.PatientID=patients.PatientID';
	$result = mysqli_query($con,$sql);
	
	$i = 1;
	
	while($row = mysqli_fetch_array($result)){
	//echo "hello";
		
	echo "<div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br>";
    echo "<img src=\"images/avatar3.png\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:40px\">";
	//echo "<button id = \"favicon\" onclick=\"hidefunc('favicon')\" class=\"w3-btn w3-theme w3-right\">Delete</button>";
	//echo "<p><strong>Doctor Name : </strong>" . $row['doctorFN'] . " " . $row['doctorLN']; 
    echo "<h7>" . $row['doctorFN'] . " " . $row['doctorLN'] . "</h7><br>";
    echo "<hr class=\"w3-clear\">";
    echo "<p>";
	echo "Patient Name:" . $row['patientFN'] . " " . $row['patientLN'] . "<br>";
	echo "Date: " . $row['Date'] . "<br>";
	echo "Time: " . $row['Time'] . "<br>";
	echo "</p>";
    echo "</div>";
	$i = $i + 1;
	
}
	
mysqli_close($con);
?>