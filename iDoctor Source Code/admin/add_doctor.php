
<?PHP

session_start();

$username = $password = $name = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$firstname = $_POST["FirstName"];
	$lastname = $_POST["LastName"];
	$specialization = $_POST["Specialization"];
	$email = $_POST["email"];
	$offhours = $_POST["offhours"];
	$phone_number = $_POST["PhoneNumber"];
	$address = $_POST["Address"];
	$city = $_POST["City"];
	$state = $_POST["State"];
	$zip = $_POST["Zip"];
	$doctor_id = $_POST["DoctorID"];
	$mon = $_POST["cbox1"];
	$tue = $_POST["cbox2"];
	$wed = $_POST["cbox3"];
	$thur = $_POST["cbox4"];
	$fri = $_POST["cbox5"];
	$sat = $_POST["cbox6"];
	$sun = $_POST["cbox7"];
	
	//echo $mon;
	
	//echo 'before ifempty';
	/*if(empty($mon))
	{header('Location: add_doctor1');}*/
	$daychecked = (empty($mon) and empty($tue) and empty($wed) and empty($thur) and empty($fri) and empty($sat) and empty($sun));
	$avldays = "";
	$firstOne = 0;
			if($mon == "Monday") {if($firstOne == 0){ $avldays .= "Monday"; $firstOne +=1; } else{$avldays .= ",Monday";}}
			if($tue == "Tuesday"){if($firstOne == 0){$avldays .= "Tuesday";$firstOne +=1; } else{$avldays .= ",Tuesday";}}
			if($wed == "Wednesday") {if($firstOne == 0){$avldays .= "Wednesday";$firstOne +=1; } else{$avldays .= ",Wednesday";}}
			if($thur == "Thursday"){if($firstOne == 0){$avldays .= "Thursday";$firstOne +=1; }else{$avldays .= ",Thursday";}}
			if($fri == "Friday") {if($firstOne == 0){$avldays .= "Friday";$firstOne +=1; }else{$avldays .= ",Friday";}}
			if($sat == "Saturday"){if($firstOne == 0){$avldays .= "Saturday";$firstOne +=1; }else{$avldays .= ",Saturday";}}
			if($sun == "Sunday"){if($firstOne == 0){$avldays .= "Sunday";$firstOne +=1; }else{$avldays .= ",Sunday";}}
			
	if($daychecked or empty($firstname) or empty($lastname) or empty($email) or empty($offhours) or empty($city) or empty($address) or empty($phone_number) or empty($specialization) or empty($state) or empty($zip)) 
	{
		header('Location: add_doctor.html');
		exit;
	}
		
		if(strpos($offhours , '-') !== false)
		{
			list($offhrsfrom , $offhrsto) = explode("-" , $offhours);
	//	}
		//else
		//{
			//header('Location: add_doctor.html');
		//}
		//$offhrsfrom = $offpar[0];
		//$offhrsto = $offpar[1];
		//echo 'split';

	
	//else
	//{
		$_SESSION['sess_email'] = $email;
		$_SESSION['sess_firstname'] = $firstname;
		$_SESSION['sess_lastname'] = $lastname;
		session_write_close();
		$count = 0;
		$con = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
		$dupid = 'SELECT email FROM doctors';
		
		foreach ($con->query($dupid) as $row) 
		{
			if($row['email']==$email)
			{
					$count = $count+1;
			}
		}

		if($count == 0)
		{
		$insertData = "INSERT INTO doctors".
					  "(DoctorID,FirstName,LastName,Specialization,OfficeHoursFrom,OfficeHoursTo,PhoneNumber,Email,Address,City,State,Zipcode, AvailableDays) ".
					  "VALUES ".
					  "('$doctor_id','$firstname','$lastname', '$specialization', '$offhrsfrom' , '$offhrsto' , '$phone_number' , '$email', '$address' , '$city', '$state' , '$zip', '$avldays')";
					  
		$qur = $con->query($insertData);
		if(! $qur )
		{
			die('Could not enter data: ' . mysqli_error());
		}
		
		//Get generated Doctor ID for the new Doctor
		$getDrID = "SELECT DoctorID From doctors WHERE Email = '" . $email . "'";
		$qur2 = $con->query($getDrID);
		if(! $qur2 )
		{
			die('Could not enter data: ' . mysqli_error());
		}
		foreach ($qur2 as $row) 
		{
			$drID = $row['DoctorID'];
		}		
		
		
			if($mon == "Monday") {addTimeSlot($drID, $mon, $offhrsfrom, $offhrsto);}
			if($tue == "Tuesday"){addTimeSlot($drID, $tue, $offhrsfrom, $offhrsto);}
			if($wed == "Wednesday") {addTimeSlot($drID, $wed, $offhrsfrom, $offhrsto);}
			if($thur == "Thursday"){addTimeSlot($drID, $thur, $offhrsfrom, $offhrsto);}
			if($fri == "Friday") {addTimeSlot($drID, $fri, $offhrsfrom, $offhrsto);}
			if($sat == "Saturday"){addTimeSlot($drID, $sat, $offhrsfrom, $offhrsto);}
			if($sun == "Sunday"){addTimeSlot($drID, $sun, $offhrsfrom, $offhrsto);}
		
		
		echo "Entered data successfully\n";
		
		mysqli_close($con);
		header("Location: admin.php");
		//header("Location: signedin.html");
		}
		else
		{
				header("Location: add_doctor.html");
		}
		}
		else
		{
			header('Location: add_doctor.html');
		}
		

}

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

	
	