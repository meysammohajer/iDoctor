<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "idoctor";
session_start();
$email =  $_SESSION['sess_email'];
$connection = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET['submit'])) {
$id = $_GET['did'];
$name = $_GET['dname'];
$lname = $_GET['dlname'];
$specs = $_GET['dspecialization'];
$hrsfrm = $_GET['dhrsfrom'];
$hrsto = $_GET['dhrsto'];
$mobile = $_GET['dmobile'];
$email = $_GET['demail'];
$address = $_GET['daddress'];
$city = $_GET['dcity'];
$state = $_GET['dstate'];
$zip = $_GET['dzipcode'];
	$mon = $_GET["cbox1"];
	$tue = $_GET["cbox2"];
	$wed = $_GET["cbox3"];
	$thur = $_GET["cbox4"];
	$fri = $_GET["cbox5"];
	$sat = $_GET["cbox6"];
	$sun = $_GET["cbox7"];
	
	$avldays = "";
	$firstOne = 0;
			if($mon == "Monday") {if($firstOne == 0){ $avldays .= "Monday"; $firstOne +=1; } else{$avldays .= ",Monday";}}
			if($tue == "Tuesday"){if($firstOne == 0){$avldays .= "Tuesday";$firstOne +=1; } else{$avldays .= ",Tuesday";}}
			if($wed == "Wednesday") {if($firstOne == 0){$avldays .= "Wednesday";$firstOne +=1; } else{$avldays .= ",Wednesday";}}
			if($thur == "Thursday"){if($firstOne == 0){$avldays .= "Thursday";$firstOne +=1; }else{$avldays .= ",Thursday";}}
			if($fri == "Friday") {if($firstOne == 0){$avldays .= "Friday";$firstOne +=1; }else{$avldays .= ",Friday";}}
			if($sat == "Saturday"){if($firstOne == 0){$avldays .= "Saturday";$firstOne +=1; }else{$avldays .= ",Saturday";}}
			if($sun == "Sunday"){if($firstOne == 0){$avldays .= "Sunday";$firstOne +=1; }else{$avldays .= ",Sunday";}}
			
			
$sql1 = "UPDATE doctors SET DoctorID='$id',FirstName='$name',LastName='$lname',Specialization='$specs',OfficeHoursFrom='$hrsfrm',OfficeHoursTo='$hrsto',PhoneNumber='$mobile',Email='$email',Address='$address',City='$city',State='$state',Zipcode='$zip' , AvailableDays = '$avldays' WHERE Email='$email'";
$query = $connection->query($sql1);


	$sqldel = "DELETE FROM timeslots WHERE DoctorID='$id'";
	$query = $connection->query($sqldel);

			if($mon == "Monday") {addTimeSlot($id, $mon, $hrsfrm, $hrsto);}
			if($tue == "Tuesday"){addTimeSlot($id, $tue, $hrsfrm, $hrsto);}
			if($wed == "Wednesday") {addTimeSlot($id, $wed, $hrsfrm, $hrsto);}
			if($thur == "Thursday"){addTimeSlot($id, $thur, $hrsfrm, $hrsto);}
			if($fri == "Friday") {addTimeSlot($id, $fri, $hrsfrm, $hrsto);}
			if($sat == "Saturday"){addTimeSlot($id, $sat, $hrsfrm, $hrsto);}
			if($sun == "Sunday"){addTimeSlot($id, $sun, $hrsfrm, $hrsto);}
	


header("Location: admin.php");
//DoctorID='$id',FirstName='$name',LastName='$lname',Specialization='$specs',OfficeHoursFrom='$hrsfrm',OfficeHoursTo='$hrsto',PhoneNumber='$mobile',Email='$email',Address='$address',City='$city',State='$state',Zipcode='$zip'", $connection);
}
mysqli_close($connection);






function addTimeSlot($doctorId, $day, $hourFrom, $hourTo)
{
	    //echo $day;
		$con = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
	    $getHourIdfrom = "SELECT id From hourid WHERE time = '" . $hourFrom . "'";
		$qur3 = $con->query($getHourIdfrom);
		if(! $qur3 )
		{
			die('Could not enter data1: ' . mysqli_error());
		}
		foreach ($qur3 as $row) 
		{
			$idhourfrom = $row['id'];
		}	

		 $getHourIdto = "SELECT id From hourid WHERE time = '" . $hourTo . "'";
		$qur4 = $con->query($getHourIdto);
		if(! $qur4 )
		{
			die('Could not enter data2: ' . mysqli_error());
		}
		foreach ($qur4 as $row) 
		{
			$idhourto = $row['id'];
		}
		
		for ($i = $idhourfrom  ; $i < $idhourto ; $i++) 	
		{
		
		$timeGet = "SELECT time From hourid WHERE id = '" . $i . "'";
		$qur5 = $con->query($timeGet);
		if(! $qur5 )
		{
			die('Could not enter data3: ' . mysqli_error());
		}
		foreach ($qur5 as $row) 
		{
			$time = $row['time'];
		}
		
			$insertTimes = "INSERT INTO timeslots".
					  "(id, DoctorID,day_of_week,slot_time,slot_date)".
					  "VALUES ".
					  "('','$doctorId','$day','$time','')";
					  
			/*$insertTimes = "INSERT INTO timeslots".
					  "(id,DoctorID,day_of_week,slot_time,slot_date,status)".
					  "VALUES ".
					  "('','2','Monday','11:30','','')";*/
					  
		$qurTime = $con->query($insertTimes);
		if(! $qurTime )
		{
			die('Could not enter data4: ' . mysqli_error());
		}
		
		
		}
		
		mysqli_close($con);

} 
?>