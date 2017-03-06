<?PHP

$pat_id = $doc_id = "";
if(isset ($_GET['pat_id'])) {$pat_id = $_GET['pat_id'];}
if(isset ($_GET['doc_id'])) {$doc_id = $_GET['doc_id'];}

$con = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
$sel = "SELECT DoctorID FROM favorites WHERE PatientID = '" . $pat_id . "'";
		$count = 0;
		foreach ($con->query($sel) as $row) 
		{
				if($row['DoctorID']==$doc_id)
				{
					$count = $count + 1;
				}
		}
				if($count == 0)
				{
					$insertData = "INSERT INTO favorites".
					  "(PatientID,DoctorID) ".
					  "VALUES ".
					  "('$pat_id','$doc_id')";
					  $qur = $con->query($insertData);
					echo 'Succesfully Added To Favorites.';
				}
				
				else
				{
				echo 'Selected Doctor Is Already In Favorites';

				}
		
		mysqli_close($con);
?>