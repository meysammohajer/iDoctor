<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="jquery-1.9.1.min.js"></script>
	<script src="valid_admin.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
	.ok, .info, .error {
		padding: 0px 2px;
	}

	.ok {
		background: #cfc;
		border: 2px solid #9c9;
	}

	.info {
		background: #ffc;
		border: 2px solid #cc9;
	}

	.error {
		background: #fcc;
		border: 2px solid #c99;
	}
</style>
</head>
<body class="w3-theme-l5" style="background-image:url(images/Dr3.jpg); background-repeat:no-repeat; background-size:cover" >

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="admin.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>iDoctor</a></li>
  <li class="w3-hide-small"><a href="all_appointments.html" class="w3-padding-large w3-hover-white" title="Appointments">All Appointments</a></li>
  <!--<li class="w3-hide-small"><a href="favorites.php" class="w3-padding-large w3-hover-white" title="Favourites">Favorites</a></li>-->
  <li class="w3-hide-small w3-dropdown-hover w3-right">
    <a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="images/avatar3.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>    
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
		<a href="home.html">SignOut</a>
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
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <!--<div class="w3-accordion w3-white"> 
		  <button class="w3-btn-block w3-theme-l1 w3-left-align">Filter Doctors</button>
		  <div class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Specialization :
			<select class="w3-right" id="dropDownSpec">
			<option value=""></option>
			<option value="General">General</option>
			<option value="ENT">ENT</option>
			<option value="Paedtric">Paedtric</option>
			<option value="Orthopaedic">Orthopaedic</option>
			<option value="Oncologist">Oncologist</option>
			<option value="Heart">Heart</option>
			<option value="NeuroSurgeon">Neurosurgeon</option>
			<option value="Dentist">Dentist</option>
			</select>
		</div>
		<div class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Day : 
			<select class="w3-right" id="dropDownDay">
			<option value=""></option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			</select>
		</div>
		      </div>-->			
</div>	

		<!--<div>
		<button onclick = "ShowFilteredDoctors(document.getElementById('dropDownSpec').value, document.getElementById('dropDownDay').value)" class="w3-btn-block w3-theme-l2 w3-center">Filter Results</button>
        </div>-->
		<br>
		
		<br>
<!--<div class="w3-card-2 w3-round">
	<div class="w3-accordion w3-white">
		<button type="button" onclick="location.href = 'add_doc.html';" class="w3-btn-block w3-theme-12 w3-center">Add a Doctor</button>
	</div>
</div>	-->	
      <br>
      
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
  <div class="w3-container w3-card-2 w3-white w3-round w3-margin">
  
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "idoctor";

$connection = new mysqli($servername, $username, $password, $dbname);
$email_id = "";
if(isset ($_GET['drEmail'])) {$email_id = $_GET['drEmail'];}
session_start();
$_SESSION['sess_email'] = $email_id;
session_write_close();

$sql = "SELECT * FROM doctors WHERE Email='$email_id'";
$query1 = $connection->query($sql);
while ($row1 = $query1->fetch_assoc()) {
echo "<form class='form' action='up_doc.php' method='get' >";
echo "<h2>Update Doctor info:</h2><br>";
echo"<input class='input' type='hidden' name='did' value='{$row1['DoctorID']}' />";
echo "<br />";
echo"First Name:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dname' value='{$row1['FirstName']}' />";
echo "<br />";
echo"Last Name:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dlname' value='{$row1['LastName']}' />";
echo "<br />";
echo"Specialization:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dspecialization' value='{$row1['Specialization']}' />";
echo "<br />";
echo"Office hours from:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dhrsfrom' value='{$row1['OfficeHoursFrom']}' />";
echo "<br />";
echo"Office hours to:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dhrsto' value='{$row1['OfficeHoursTo']}' />";
echo "<br />";
echo"Phone Number:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dmobile' value='{$row1['PhoneNumber']}' />";
echo "<br />";
echo"Email:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='demail' value='{$row1['Email']}' />";
echo "<br />";
echo "Address:<input type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;'name='daddress' value='{$row1['Address']}'; />";
echo "<br />";
echo"City:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dcity' value='{$row1['City']}' />";
echo "<br />";
echo"State:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dstate' value='{$row1['State']}' />";
echo "<br />";
echo"Zip Code:<input class='input' type='text' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='dzipcode' value='{$row1['Zipcode']}' />";
echo "<br />";
echo "Available Days: <br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox1' value='Monday'/>Monday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox2' value='Tuesday'/>Tuesday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox3' value='Wednesday'/>Wednesday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox4' value='Thursday'/>Thursday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox5' value='Friday'/>Friday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox6' value='Saturday'/>Saturday<br>";
echo "<input type='checkbox' style='font-weight: normal;' name='cbox7' value='Sunday'/>Sunday<br>";
echo "<br />";
echo "<input class='submit' type='submit' style=' width: 100%; padding: 12px 20px; border: 1px solid #ccc; border-radius: 4px;' name='submit' value='update' />";
echo "</form>";
}
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
	      </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
</div>
<footer class="w3-container w3-theme-d5">
  <p>Copyright 2016. All Rights Reserved</p>
</footer>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysqli_close($connection);
?>
</body>
</html>