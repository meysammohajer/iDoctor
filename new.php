<html>
<head>
<title>iDoctor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>

	
</head>	

<body class="w3-theme-l5" style="background-image:url(images/Dr3.jpg); background-repeat:no-repeat; background-size:cover" >

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="home.html" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>iDoctor</a></li>
  <!--<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Appointments">Appointments</a></li>
  <li class="w3-hide-small"><a href="favorites.php" class="w3-padding-large w3-hover-white" title="Favourites">Favorites</a></li>-->
  <li class="w3-hide-small w3-dropdown-hover w3-right">
    <a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="images/avatar3.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>    
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
		<a href="login.html">Login</a>
		<a href="signup.html">Sign Up</a>
    </div>
  </li>
 </ul>
</div>



<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center"><strong>iDoctor</strong></h4>
         <!--<p class="w3-center"><img src="images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>-->
         <p class="w3-center"><img src="images/Dr.jpg" style="height:200px;width:300px"></p>

		 <!--<hr>
			<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Name: <strong><?php echo $_SESSION['sess_fname']; ?></strong></p>
			<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> City: </p>
        --></div>
      </div>
      <br>
      
  
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
     <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <p contenteditable="true" class="w3-border w3-padding"></p>
              <button type="button" class="w3-btn w3-theme"></i>Search</button> 
            </div>
          </div>
        </div>
      </div>
      
	  	  <div id = "result">
  </div>
	  

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function hidefunc(id) {
	document.getElementById(id).style.visibility = "hidden";
		
}
</script>
<?php	

$spec = $day = $logedin = "";
if(isset ($_GET['specialization'])) {$spec = $_GET['specialization'];}
if(isset ($_GET['day'])) {$day = $_GET['day'];}
if(isset ($_GET['logedin'])) {$logedin = $_GET['logedin'];}

if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  //we give the value of the starting row to 0 because nothing was found in URL
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}

//echo "spec = " . $spec;
//echo "day = " . $day;

$con = mysqli_connect('localhost','root','root','idoctor'); 
if (!$con) { die('Could not connect: ' . mysqli_error($con)); } 

if(empty($spec) and empty($day))
{
$sql="SELECT * FROM doctors LIMIT " . $startrow . ", 3"; 
$result = mysqli_query($con,$sql);
}

else if(!empty($spec) and empty($day))
{
$sql="SELECT * FROM doctors where Specialization ='" . $spec . "'";
$result = mysqli_query($con,$sql);
}

else if(!empty($day) and empty($spec))
{
$sql="SELECT DISTINCT FirstName,LastName,Specialization,OfficeHoursFrom, OfficeHoursTo, PhoneNumber, Email, Address,City, State, Zipcode, AvailableDays
  FROM doctors JOIN timeslots on doctors.DoctorID = timeslots.DoctorID where day_of_week ='" . $day . "'";
$result = mysqli_query($con,$sql);
}

else if(!empty($day) and !empty($spec))
{
$sql="SELECT DISTINCT FirstName,LastName,Specialization,OfficeHoursFrom, OfficeHoursTo, PhoneNumber, Email, Address,City, State, Zipcode, AvailableDays
 FROM doctors JOIN timeslots on doctors.DoctorID = timeslots.DoctorID where day_of_week ='" . $day . "' and Specialization ='" . $spec . "'"; 
$result = mysqli_query($con,$sql);
}



//echo '<a href="'.$_SERVER['home1.html'].'?logedin=false&startrow='.($startrow+3).'">Next</a>';


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
echo "<p><strong>Available Days : </strong>" . $row['AvailableDays'] . "</p>";
echo "<p><strong>Office Hours : </strong>" . $row['OfficeHoursFrom'] . " - " . $row['OfficeHoursTo'] . "</p>";

echo "<p><strong>Phone : </strong>" . $row['PhoneNumber'] . "<br>"; 
echo "<strong>Email : </strong>" . "<h7 id = 'doctorEmail" . $i . "'>" . $row['Email'] . "</h7><br>";
echo "<strong>Address : </strong>" . $row['Address'] . ", " . $row['City'] . ", " . $row['State'] . " " . $row['Zipcode'] . "</p>"; 
 


if($logedin != "false")
{

echo "<div class=\"w3-btn w3-theme-d1 w3-margin-bottom w3-left-align\"><i class=\"fa fa-circle-o-notch fa-fw w3-margin-right\"></i>Date : 
		<input type=\"text\" class = 'date' id='datepicker". $i . "'>
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

echo "<button id = 'makeAppointButton". $i . "' onclick =\"addAppointment('" . $i . "')\" class=\"w3-btn w3-theme-d2 w3-margin-bottom w3-right\">Make Appointment</button>";

$i = $i + 1;
}
echo "</div>";
} 
echo '<a href="'.$_SERVER['PHP_SELF'].'?logedin=false&startrow='.($startrow+3).'">Next</a>'; 
echo "&nbsp";
$prev = $startrow - 3;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?logedin=false&startrow='.$prev.'">Previous</a>';
//echo "</div> </div>";

mysqli_close($con);


?>
<div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <!--<p><strong>Upcoming Appointment:</strong></p>
          <p>Doctor Name</p>
          <p>Friday 15:00</p>
          <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
        --></div>
      </div>
      <br>
      
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

<footer class="w3-container w3-theme-d5">
  <p>Copyright 2016. All Rights Reserved</p>
</footer>
</body>
</html>