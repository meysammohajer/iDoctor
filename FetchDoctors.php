<?php	
  
$spec = $day = $logedin = "";
if(isset ($_GET['specialization'])) {$spec = $_GET['specialization'];}
if(isset ($_GET['day'])) {$day = $_GET['day'];}
if(isset ($_GET['logedin'])) {$logedin = $_GET['logedin'];}

//echo "spec = " . $spec;
//echo "day = " . $day;

$con = mysqli_connect('localhost','root','root','idoctor'); 
if (!$con) { die('Could not connect: ' . mysqli_error($con)); } 

if(empty($spec) and empty($day))
{
$sql="SELECT * FROM doctors"; 
$result = mysqli_query($con,$sql);
}

else if(!empty($spec) and empty($day))
{
$sql="SELECT * FROM doctors where Specialization ='" . $spec . "'";
$result = mysqli_query($con,$sql);
}

else if(!empty($day) and empty($spec))
{
$sql="SELECT DISTINCT DoctorID, FirstName,LastName,Specialization,OfficeHoursFrom, OfficeHoursTo, PhoneNumber, Email, Address,City, State, Zipcode, AvailableDays
  FROM doctors JOIN timeslots on doctors.DoctorID = timeslots.DoctorID where day_of_week ='" . $day . "'";
$result = mysqli_query($con,$sql);
}

else if(!empty($day) and !empty($spec))
{
$sql="SELECT DISTINCT DoctorID, FirstName,LastName,Specialization,OfficeHoursFrom, OfficeHoursTo, PhoneNumber, Email, Address,City, State, Zipcode, AvailableDays
 FROM doctors JOIN timeslots on doctors.DoctorID = timeslots.DoctorID where day_of_week ='" . $day . "' and Specialization ='" . $spec . "'"; 
$result = mysqli_query($con,$sql);
}

//echo "<div class='row'> 
//<div class='col-sm-10'>";
$i = 1;
while($row = mysqli_fetch_array($result)) 
{
	
echo "<div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br>";
echo "<img src=\"images/avatar3.png\" alt=\"Avatar\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:40px\">";
if($logedin != "false")
{
echo "<button id = 'favicon". $i . "' onclick=\"addToFavorites('" . $i . "')\" class='w3-btn w3-theme w3-right'>Add to Favourites</button>";
}
echo "<p><strong>Doctor Name : </strong>" . $row['FirstName'] . " " . $row['LastName'] ; 
echo "<hr class=\"w3-clear\">";
echo "<p><strong>Specialization : </strong>" . $row['Specialization'] . "</p>";
echo "<p><strong>Available Days : </strong>" . "<h7 id = 'avlDays" . $i . "'>" . $row['AvailableDays'] . "</h7></p>";
echo "<p><strong>Office Hours : </strong>" . $row['OfficeHoursFrom'] . " - " . $row['OfficeHoursTo'] . "</p>";

echo "<p><strong>Phone : </strong>" . $row['PhoneNumber'] . "<br>"; 
echo "<strong>Email : </strong>" . "<h7 id = 'doctorEmail" . $i . "'>" . $row['Email'] . "</h7><br>";
echo "<strong>Address : </strong>" . $row['Address'] . ", " . $row['City'] . ", " . $row['State'] . " " . $row['Zipcode'] . "</p>"; 
 
if($logedin != "false")
{

echo "<div class=\"w3-btn w3-theme-d1 w3-margin-bottom w3-left-align\"><i class=\"fa fa-circle-o-notch fa-fw w3-margin-right\"></i>Date : 
		<input type=\"text\" class = 'date' onclick=\"getAvailableDays('" . $i . "')\" id='datepicker". $i . "'>
	  </div>";

echo "&nbsp";
echo "<div   class=\"w3-btn w3-theme-d1 w3-margin-bottom w3-left-align\"><i class=\"fa fa-circle-o-notch fa-fw w3-margin-right\"></i>Time : 
			<select id='timepicker" . $i . "'>
			<option value=\"\">No Selection</option>
			<option value=\"9:00\">9:00</option>
			<option value=\"9:30\">9:30</option>
			<option value=\"10:00\">10:00</option>
			<option value=\"10:30\">10:30</option>
			<option value=\"11:00\">11:00</option>
			<option value=\"11:30\">11:30</option>
			<option value=\"12:00\">12:00</option>
			<option value=\"12:30\">12:30</option>
			<option value=\"13:00\">13:00</option>
			<option value=\"13:30\">13:30</option>
			<option value=\"14:00\">14:00</option>
			<option value=\"14:30\">14:30</option>
			<option value=\"15:00\">15:00</option>
			<option value=\"15:30\">15:30</option>
			<option value=\"16:00\">16:00</option>
			<option value=\"16:30\">16:30</option>
			<option value=\"17:00\">17:00</option>
			<option value=\"17:30\">17:30</option>
			<option value=\"18:00\">18:00</option>
			<option value=\"18:30\">18:30</option>
			<option value=\"19:00\">19:00</option>

			</select>
		</div>";

echo "&nbsp";

echo "<p id = 'drID" . $i . "'hidden>" . $row['DoctorID'] . "</p>";

echo "<button id = 'makeAppointButton". $i . "' onclick =\"addAppointment('" . $i . "')\" class=\"w3-btn w3-theme-d2 w3-margin-bottom w3-right\">Make Appointment</button>";

$i = $i + 1;
}
echo "</div>";
} 
//echo "</div> </div>";

mysqli_close($con);


?>