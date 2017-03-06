<?php
session_start();

$date = $timeID = $doctorEmail = $patientID = $city = "";
if(isset ($_GET['date'])) {$date = $_GET['date'];}
if(isset ($_GET['timeID'])) {$timeID = $_GET['timeID'];}
if(isset ($_GET['doctorEmail'])) {$doctorEmail = $_GET['doctorEmail'];}
if(isset ($_GET['patientID'])) {$patientID = $_GET['patientID'];}

//echo $timeID;
try 
	{
    $conn = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());

	$sql = "SELECT * FROM doctors";
	foreach ($conn->query($sql) as $row) 
	{
        if($row['Email']== $doctorEmail)
		{
			$doctorID = $row['DoctorID'];
			$_SESSION["sess_doctorFname"] = $row['FirstName'];
			$_SESSION["sess_doctorLname"] = $row['LastName'];
			$_SESSION["sess_doctorAddress"] = $row['Address'] . ", " . $row['City'] . ", " .$row['State'] . " " .$row['Zipcode'];
			$_SESSION["sess_doctorPhone"] = $row['PhoneNumber'];
			$_SESSION["sess_doctorEmail"] = $row['Email'];

		}
	}
	$_SESSION["sess_doctorID"] = $doctorID;
	//$_SESSION["sess_doctorFname"] = $drFname;
	//$_SESSION["sess_doctorLname"] = $drLname;
    $_SESSION["sess_date"] = $date;
	$_SESSION["sess_timeID"] = $timeID;
	$_SESSION["sess_patientID"] = $patientID;
	
	//echo "Success\n";
	
mysqli_close($conn);
//session_write_close();

	//header("Location: checkout.php");

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>




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

<!-- AJAX CALL -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<!-- End of AJAX Call -->
</head>	
	


<body class="w3-theme-l5" style="background-image:url(images/Dr3.jpg); background-repeat:no-repeat; background-size:cover">

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="welcome.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>iDoctor</a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Appointments">Appointments</a></li>
  <li class="w3-hide-small"><a href="favorites.php" class="w3-padding-large w3-hover-white" title="Favourites">Favorites</a></li>
  <li class="w3-hide-small w3-dropdown-hover w3-right">
    <a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="images/avatar3.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>    
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
		<a href="#">Account</a>
		<a href="home.html">Sign out</a>
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
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
			<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Name: <strong><?php echo $_SESSION['sess_fname'] . " " . $_SESSION['sess_lname']; ?></strong></p>
			<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> City: <strong><?php echo $_SESSION['sess_city']?></strong></p>
			<!--Debug
			<h4 id="mydate">Date</h4>
			<h4 id="mytime">Time</h4>
			<h4 id="myDrId">Email</h4>
			<h4 id="myid">ID</h4>
			-->
			
		</div>
      </div>
      <br>
      
      <!-- Accordion -->
			
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
  
        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
        <strong>CONFIRM APPOINTMENT</strong><br>
        <hr class="w3-clear">
        <p>
		Doctor Name: <strong><?php echo $_SESSION['sess_doctorFname'] . " " . $_SESSION['sess_doctorLname']; ?></strong><br>
		Patient Name: <strong><?php echo $_SESSION['sess_fname'] . " " . $_SESSION['sess_lname']; ?></strong><br>
		Date: <strong><?php echo $_SESSION['sess_date'] ?></strong><br>
		Time: <strong><?php echo $_SESSION['sess_timeID'] ?></strong><br>
		 <br><br>
		 <strong>Doctor Details</strong> <br>
		Address: <?php echo $_SESSION['sess_doctorAddress'] ?> <br>
		Phone: <?php echo $_SESSION['sess_doctorPhone'] ?>  <br>
		Email: <?php echo $_SESSION['sess_doctorEmail'] ?> 
		</p>
		           <div class="w3-half">
              <button onclick = "insertAppointmentToDatabase()" class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button onclick = "goToHome()" class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
			
			<!--<div class="w3-half">
              <p id="errorTime" style="visibility:hidden">This Time Has Been Taken, Try Another Time</p>
            </div>
			-->	

      </div>
      <br>
      
	  
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      
      <br>
      
     
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

<footer class="w3-container w3-theme-d5">
  <p>Copyright 2016. All Rights Reserved</p>
  <p id="selectDate" hidden><?php echo $_SESSION['sess_date'] ?></p>
  <p id="selectTime" hidden><?php echo $_SESSION['sess_timeID'] ?></p>
  <p id="selectDrID" hidden><?php echo $_SESSION["sess_doctorID"] ?></p>
  <p id="selectPatientID" hidden><?php echo $_SESSION['sess_patientID'] ?></p>
  
</footer>
 
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


function insertAppointmentToDatabase()
{
	$apntDate = document.getElementById('selectDate').innerHTML;
	$apntTimeID = document.getElementById('selectTime').innerHTML;
	$doctorID = document.getElementById('selectDrID').innerHTML;
	$patientID = document.getElementById('selectPatientID').innerHTML;
	//$('#mydate').text($apntDate);
	//$('#mytime').text($apntTimeID);
	//$('#myDrId').text($doctorID);
	//$('#myid').text($patientID);	
	//$.get("makeAppoitment.php", {date: <?php echo $_SESSION['sess_date'] ?> , timeID: <?php echo $_SESSION['sess_timeID'] ?> , doctorID: <?php echo $_SESSION["sess_doctorID"] ?>,  patientID: <?php echo $_SESSION["sess_patientID"] ?>})
	$.get("makeAppoitment.php", {date: $apntDate , timeID: $apntTimeID , doctorID: $doctorID, patientID: $patientID})	 
	 .done(function(data) {
		alert(data);
  	    window.location.replace("welcome.php");
  })
  .fail(function() {
	  alert('This Time Has Been Taken, Try Another Time !');
	  window.location.replace("welcome.php");
	  });

}


function goToHome() {
window.location.replace("welcome.php");		
}

</script>

</body>
</html> 