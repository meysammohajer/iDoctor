
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

	$_SESSION["sess_lname"] = $lname;
	$_SESSION["sess_fname"] =  $fname;
	$_SESSION['sess_city'] = $city;
	$_SESSION["sess_patientID"] = $patientid;
	
mysqli_close($conn);
session_write_close();
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

<!--************** Date ****************** -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

	function getAvailableDays(id)
	{
		
		$days = document.getElementById('avlDays' + id).innerHTML;
		var da = $days;
		$('#avl').text($days);
		//$(function() {$('#datepicker' + id).datepicker({beforeShowDay: checkAvailable});});
		$(function() {
        $('#datepicker' + id).datepicker(
        { dateFormat: 'yy-mm-dd', minDate: new Date('2016-12-02'), beforeShowDay: function(date) {
            var day = date.getDay();
			var pieces = da.split(',');//explode(',', $days);
			var daynums = new Array();

			if (pieces.includes("Monday")){daynums.push("1");}
			if (pieces.includes("Tuesday")){daynums.push("2");}
			if (pieces.includes("Wednesday")){daynums.push("3");}
			if (pieces.includes("Thursday")){daynums.push("4");}
			if (pieces.includes("Friday")){daynums.push("5");}
			if (pieces.includes("Saturday")){daynums.push("6");}
			if (pieces.includes("Sunday")){daynums.push("0");}	
			
			if(daynums.length == 1)
			{	if (day == daynums[0]) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
			if(daynums.length == 2)
			{	if (day == daynums[0] || day == daynums[1]) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
			if(daynums.length == 3)
			{	if (day == daynums[0] || day == daynums[1] || day == daynums[2]) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
			if(daynums.length == 4)
			{	if (day == daynums[0] || day == daynums[1]  || day == daynums[2]  || day == daynums[3] ) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
			if(daynums.length == 5)
			{	if (day == daynums[0] || day == daynums[1]  || day == daynums[2]  || day == daynums[3]  || day == daynums[4] ) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
			if(daynums.length == 6)
			{	if (day == daynums[0]) 
				{
                return [true, "", "somecssclass"]
				} else {
                return [false, "", "someothercssclass"]
				}
			}
		
		
		} 
        });
    });
	}



  </script>
<!--***********End Date************-->


<!-- AJAX CALL -->
	
	<script> function ShowAllDoctors(){ 
	//{ if (str=="") { document.getElementById("result").innerHTML=""; return; } 
	if (window.XMLHttpRequest) 
	{// code for IE7+, Firefox, Chrome, Opera, Safari 
	xmlhttp=new XMLHttpRequest(); } 
	else {// code for IE6, IE5 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); } 
	xmlhttp.onreadystatechange=function() 
	{ if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{ document.getElementById("result").innerHTML=xmlhttp.responseText; } } 
	//xmlhttp.open("GET","babynames.php?year="+str,true); 
	xmlhttp.open("GET","FetchDoctors.php?logedin=true",true);
	//xmlhttp.onload = function(){$( function() {
    //$( ".date" ).datepicker({dateFormat: 'yy-mm-dd', minDate: new Date('2016-12-02') });
	//});}
	xmlhttp.send(); } 
	</script>
	
	
	
	<script> function ShowFilteredDoctors(spec, day){ 
	//{ if (str=="") { document.getElementById("result").innerHTML=""; return; } 
	if (window.XMLHttpRequest) 
	{// code for IE7+, Firefox, Chrome, Opera, Safari 
	xmlhttp=new XMLHttpRequest(); } 
	else {// code for IE6, IE5 
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); } 
	xmlhttp.onreadystatechange=function() 
	{ if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{ document.getElementById("result").innerHTML=xmlhttp.responseText; } } 
	//xmlhttp.open("GET","babynames.php?year="+str,true);
    xmlhttp.open("GET","FetchDoctors.php?logedin=true&specialization="+spec+"&day="+day,true);
	//xmlhttp.onload = function(){$( function() {
    //$( ".date" ).datepicker({dateFormat: 'yy-mm-dd', minDate: new Date('2016-12-02')});
	//});}
    //if(spec == "" && day == "") { xmlhttp.open("GET","FetchFilterDoctors.php",true);}
	//if(spec != "" && day != "") { xmlhttp.open("GET","FetchFilterDoctors.php?specialization="+spec+"&day="+day,true);} 
	//if(spec != "" && day == "") { xmlhttp.open("GET","FetchFilterDoctors.php?specialization="+spec,true);}
	//if(spec == "" && day != "") { xmlhttp.open("GET","FetchFilterDoctors.php?day="+day,true);}
	xmlhttp.send(); } 
	</script>
	<!-- End of AJAX Call -->
	
	<!--SEARCH-->
	<script> function ShowFiltered(){ 
		
		var x = document.getElementById("frm1");
		var text = "";
        text = x.elements[0].value;
	if (window.XMLHttpRequest) 
	{
	xmlhttp=new XMLHttpRequest(); } 
	else {
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); } 
	xmlhttp.onreadystatechange=function() 
	{ if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{ document.getElementById("result").innerHTML=xmlhttp.responseText; } } 
    xmlhttp.open("GET","search.php?searchkey="+text+"&logedin=false",true);
	xmlhttp.send(); } 
	</script>
</head>	
	


<body class="w3-theme-l5" onload = "ShowAllDoctors()" style="background-image:url(images/Dr3.jpg); background-repeat:no-repeat; background-size:cover">

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="welcome.php" class="w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>iDoctor</a></li>
  <li class="w3-hide-small"><a href="appointments.php" class="w3-padding-large w3-hover-white" title="Appointments">Appointments</a></li>
  <li class="w3-hide-small"><a href="favorites.php" class="w3-padding-large w3-hover-white" title="Favourites">Favorites</a></li>
  <li class="w3-hide-small w3-dropdown-hover w3-right">
    <a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="images/avatar3.png" class="w3-circle" style="height:25px;width:25px" alt="Avatar"></a>   
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
		<!--<a href="#">Account</a>-->
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
			<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> City: <strong><?php echo $_SESSION['sess_city'] ?></strong></p>
			<!--Debug
			<h4 id="mydate">Date</h4>
			<h4 id="mytime">Time</h4>
			<h4 id="myemail">Email</h4>
			<h4 id="avl">days</h4>-->
			

        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white"> 
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
		      </div>
</div>	
		<div>
		<button onclick = "ShowFilteredDoctors(document.getElementById('dropDownSpec').value, document.getElementById('dropDownDay').value)" class="w3-btn-block w3-theme-l2 w3-center">Filter Results</button>
        </div>
			
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
              <form id="frm1" action="form_action.asp" >
			<input type="text" name="fname" value="" class="w3-border w3-padding" style="width: 100%; border-radius: 4px">
			</form>
			<button onclick= "ShowFiltered()" class="w3-btn w3-theme w3-right"></i>Search</button>
            </div>
          </div>
        </div>
      </div>
      
	  
	  <div id = "result">
  </div>
	  <!--
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
		  <button id = "favicon" onclick="hidefunc('favicon')" class="w3-btn w3-theme w3-right">Add to Favourites</button>
        <h7>Doctor Name</h7><br>
        <hr class="w3-clear">
        <p>
		Specialization: ENT <br><br>
		Office Location 123 West Avenue, Dallas-75080 <br>
		Phone: 123456789 <br>
		Email: abc@gmail.com
		</p>
		<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Day : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
				<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Time : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom">Make Appointment</button> 
      </div>
     
	       <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
		<button id = "favicon2" onclick="hidefunc('favicon2')" class="w3-btn w3-theme w3-right">Add to Favourites</button>
        <h7>Doctor Name</h7><br>
        <hr class="w3-clear">
        <p>
		Specialization: ENT <br><br>
		Office Location 123 West Avenue, Dallas-75080 <br>
		Phone: 123456789 <br>
		Email: abc@gmail.com
		</p>
		<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Day : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
				<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Time : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom">Make Appointment</button> 
      </div>
	  
	        <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40px">
		<button id = "favicon3" onclick="hidefunc('favicon3')" class="w3-btn w3-theme w3-right">Add to Favourites</button>
        <h7>Doctor Name</h7><br>
        <hr class="w3-clear">
        <p>
		Specialization: ENT <br><br>
		Office Location 123 West Avenue, Dallas-75080 <br>
		Phone: 123456789 <br>
		Email: abc@gmail.com
		</p>
		<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Day : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
				<div id="dropDownMenu"  class="w3-btn w3-theme-d1 w3-margin-bottom w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Time : 
			<select>
			<option value="No Selection">No Selection</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednesday">Wednesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
			<option value="Dental">Dental</option>
			</select>
		</div>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom">Make Appointment</button> 
      </div>
      -->
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
	<!--
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Upcoming Appointment:</strong></p>
          <p>Doctor Name</p>
          <p>Friday 15:00</p>
          <p><button class="w3-btn w3-btn-block w3-theme-l4">Info</button></p>
        </div>
      </div>-->
      <br>
      
     <!-- Use for cancel appointment<div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>-->
      
	  <!--
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
	  <img src="images/forest.jpg" alt="Avatar" style="width:50%"><br>
        <p>ADS</p>
      </div>
      <br>
      
	      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
	  <img src="images/lights.jpg" alt="Avatar" style="width:50%"><br>
        <p>ADS</p>
      </div>
      -->
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
  <p id="ptnID" hidden><?php echo $_SESSION['sess_patientID'] ?></p>
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

		

	/*function getAvailableDays(id)
	{
		$days = document.getElementById('avlDays' + id).innerHTML;
		$('#avl').text($days);
		$( "#datepicker" + id).datepicker({beforeShowDay: DisableMonday});
	}*/


	function addAppointment(id)
{
	$apntDate = document.getElementById('datepicker' + id).value;//style.visibility = "hidden";
	$apntTimeID = document.getElementById('timepicker' + id).value;//style.visibility = "hidden";
	$doctorEmail = document.getElementById('doctorEmail' + id).innerHTML;
	$patientID = document.getElementById('ptnID').innerHTML;
	//$('#mydate').text($apntDate);
	//$('#mytime').text($apntTimeID);
	//$('#myemail').text($doctorEmail);
	//$('#myid').text($patientID);	
	
	if($apntDate == "" || $apntTimeID == "")
	{
		alert("Please Select Date and Time");
	}
	else
	{
	var url = 'checkout.php?' + 'date=' + $apntDate + '&timeID=' + $apntTimeID + '&doctorEmail=' + $doctorEmail + '&patientID=' + $patientID;
	var form = $('<form action="' + url + '" method="post">' +
	'<input type="text" name="api_url" />' +
	'</form>');
	$('body').append(form);
	form.submit();	
		
		
	//$.post("makeAppoitment.php", {date: $apntDate , timeID: $apntTimeID , doctorEmail: $doctorEmail, patientID: $patientID})
	  //.done(function(data) {
    //alert('Directory created: ' + data);
	//header("Location: checkout.php");
	//window.location.replace("checkout.php");
  //});
	}
}



function addToFavorites(id)
{
	$doctorID = document.getElementById('drID' + id).innerHTML;
	$patientID = document.getElementById('ptnID').innerHTML;
	if($doctorID == "" || $patientID == "")
	{
		alert("Something is not correct for cancelling the appointment !");
	}
	
	else
	{
	
	$.get("add_to_fav.php", {pat_id: $patientID , doc_id: $doctorID})	 
	 .done(function(data) {
		alert(data);
  	    //window.location.replace("welcome.php");
  })
  .fail(function() {
	  alert('Error in adding to Favorites !');
	  //window.location.replace("appointments.php");
	  });
		
	}
}
	


</script>

</body>
</html> 
