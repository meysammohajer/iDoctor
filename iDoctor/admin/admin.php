<?php	

echo "Admin";

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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.1.1.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
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
	xmlhttp.open("GET","adminFetchDoctors.php",true); 
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
    xmlhttp.open("GET","adminFetchDoctors.php?specialization="+spec+"&day="+day,true);
    //if(spec == "" && day == "") { xmlhttp.open("GET","FetchFilterDoctors.php",true);}
	//if(spec != "" && day != "") { xmlhttp.open("GET","FetchFilterDoctors.php?specialization="+spec+"&day="+day,true);} 
	//if(spec != "" && day == "") { xmlhttp.open("GET","FetchFilterDoctors.php?specialization="+spec,true);}
	//if(spec == "" && day != "") { xmlhttp.open("GET","FetchFilterDoctors.php?day="+day,true);}
	xmlhttp.send(); } 
	</script>
	<!-- End of AJAX Call -->
	
</head>	
	


<body class="w3-theme-l5" onload="ShowAllDoctors()" style="background-image:url(images/Dr3.jpg); background-repeat:no-repeat; background-size:cover" >

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
		<a href="../home.html">SignOut</a>
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
        -->
					<!--<h4 id="myemaildr">Email</h4>-->

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
		
<div class="w3-card-2 w3-round">
	<div class="w3-accordion w3-white">
		<button type="button" onclick="location.href = 'add_doctor.html';" class="w3-btn-block w3-theme-12 w3-center">Add a Doctor</button>
	</div>
	<br>
		<!--<div class="w3-accordion w3-white">
		<button type="button" onclick="location.href = 'all_appointments.html';" class="w3-btn-block w3-theme-12 w3-center">View Appointments</button>
	</div>-->
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
              <h3> Admin Page</h3>
              <!--<button type="button" class="w3-btn w3-theme w3-right"></i>Search</button> -->
            </div>
          </div>
        </div>
      </div>
      
	  
	  <div id = "result">
  </div>
	  

	       
      </div>
     
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
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


function deleteDoctor(id)
{
	$dr_email = document.getElementById('drEmail' + id).innerHTML;
	//$('#myemaildr').text($dr_email);

	
	$.get("delete_doctor.php", {drEmail: $dr_email})	 
	 .done(function(data) {
		alert(data);
  	    window.location.replace("admin.php");
  })
  .fail(function() {
	  alert('Error in Deleting the doctor !');
	  window.location.replace("admin.php");
	  });

}

function updateDoctor(id)
{
	$dr_email = document.getElementById('drEmail' + id).innerHTML;
	//$('#myemaildr').text($dr_email);

	window.location.replace("update_doctor.php?drEmail=" + $dr_email);
	/*$.get("update_doctor.php", {drEmail: $dr_email})	 
	 .done(function(data) {
		//alert(data);
  	    //window.location.replace("admin.php");
  })
  .fail(function() {
	  alert('Error in Deleting the doctor !');
	  window.location.replace("admin.php");
	  });
*/
}
</script>

</body>
</html> 
