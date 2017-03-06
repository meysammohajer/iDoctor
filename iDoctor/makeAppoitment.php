<?php

$date = $timeID = $doctorID = $patientID = "";
if(isset ($_GET['date'])) {$date = $_GET['date'];}
if(isset ($_GET['timeID'])) {$timeID = $_GET['timeID'];}
if(isset ($_GET['doctorID'])) {$doctorID = $_GET['doctorID'];}
if(isset ($_GET['patientID'])) {$patientID = $_GET['patientID'];}


try 
	{
    $conn = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());

	//For Checking if Timeslot is taken	
	        $timestamp = strtotime($date);
			$day = date('l', $timestamp);
			//echo $day;
			//var_dump($day);
			
			
		
		//echo  $doctorID . " " . $timeID . " " . $day . " " . $date;
	$getDateSlot = "SELECT * FROM timeslots WHERE DoctorID = '" . $doctorID . "' AND  slot_time = '" . $timeID . "' AND day_of_week = '" . $day . "'";
    //$getDateSlot = "SELECT * FROM timeslots WHERE DoctorID = '$doctorID' AND  slot_time = '$timeID' AND day_of_week = '$day'";

	$result1 = $conn->query($getDateSlot);

	//if (mysqli_num_rows($result)==0) 
	if(mysqli_num_rows($result1) == 0)
	{ 
		echo "There is No Appintment At This Time !" ; 
	}
	
	else
	{
		$count = 0;
			while($row = $result1->fetch_assoc()) 
		{
			//echo "ehile";
			if($row['slot_date'] == $date)
			{
				$count = $count +1;
			}
		}
			
			if($count == 0)
			{
				$addAppoitment = "INSERT INTO appointments ( PatientID, DoctorID, Date, TimeID )
                       VALUES
                       ('$patientID', '$doctorID', '$date', '$timeID')";
				$result = $conn->query($addAppoitment);
	
				if(! $result )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				//$addTimeSlot = "UPDATE timeslots SET slot_date ='$date' WHERE DoctorID = '" . $doctorID . "' and  slot_time = '" . $timeID . "' and day_of_week = '" . $day . "'";
				$addTimeSlot = "INSERT INTO timeslots (id, DoctorID, day_of_week, slot_time, slot_date)
					VALUES ('', '$doctorID', '$day', '$timeID', '$date')";
                       
				$result2 = $conn->query($addTimeSlot);
	
			if(! $result2 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				echo "You Successfully Made The Appointment.\n";
			}
			
			else
			{
				echo "This Time Has Been Taken.\n";
			}
			
	}
		
		/*
	while($row = $result1->fetch_assoc()) 
		{
			//echo "ehile";
			if($row['slot_date'] == '0000-00-00')
			{
				$addAppoitment = "INSERT INTO appointments ( PatientID, DoctorID, Date, TimeID )
                       VALUES
                       ('$patientID', '$doctorID', '$date', '$timeID')";
				$result = $conn->query($addAppoitment);
	
				if(! $result )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				$addTimeSlot = "UPDATE timeslots SET slot_date ='$date' WHERE DoctorID = '" . $doctorID . "' and  slot_time = '" . $timeID . "' and day_of_week = '" . $day . "'";
                       
				$result2 = $conn->query($addTimeSlot);
	
			if(! $result2 )
				{
					die('Could not enter data: ' . mysql_error());
				}
				
				echo "You Successfully Made The Appointment.\n";
			}
			
			else
			{
				echo "This Time Has Been Taken.\n";
			}
			
		}
	//For Adding to TimeSlots
	
	
	}*/
	
	mysqli_close($conn);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>