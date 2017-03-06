
<?PHP

session_start();

$username = $password = $name = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$firstname = $_POST["FirstName"];
	$lastname = $_POST["LastName"];
	$dob = $_POST["DoB"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phone_number = $_POST["PhoneNumber"];
	$address = $_POST["Address"];
	$city = $_POST["City"];
	$state = $_POST["State"];
	$zip = $_POST["Zip"];
	$patient_id = $_POST["PatientID"];
	
	//echo 'before ifempty';
	if(empty($firstname) or empty($lastname) or empty($email) or empty($password) or empty($city) or empty($address) or empty($phone_number) or empty($dob) or empty($state) or empty($zip)) 
	{
		header('Location: signup.html');
		exit;
	}
	
	/*if(!preg_match("/^[a-zA-Z ]*$/",$firstname) or 
	   !preg_match("/^[A-Za-z][A-Za-z0-9]*$/",$lastname) or
	   !preg_match("/^[A-Za-z][A-Za-z0-9]*$/",$email) or //******should work
	   !preg_match("/^.{6,}$/",$password))
	   //Different matches
	{header('Location: signup.html');
		exit;}
	*/
	
	//else
	//{
		$_SESSION['sess_email'] = $email;
		$_SESSION['sess_firstname'] = $firstname;
		$_SESSION['sess_lastname'] = $lastname;
		session_write_close();
		$count = 0;
		$con = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());
		$dupid = 'SELECT email FROM patients';
		
		foreach ($con->query($dupid) as $row) 
		{
			if($row['email']==$email)
			{
					$count = $count+1;
			}
		}
		//$dupid = mysql_query($con);
		if($count == 0)
		{
		$insertData = "INSERT INTO patients".
					  "(PatientID,LastName,FirstName,DoB,email,password,Address,City,State,Zipcode,PhoneNumber) ".
					  "VALUES ".
					  "('$patient_id','$lastname','$firstname', '$dob', '$email', '$password', '$address' , '$city', '$state' , '$zip' , '$phone_number')";
					  
		$qur = $con->query($insertData);
		if(! $qur )
		{
			echo 'hello';
			die('Could not enter data: ' . mysqli_error());
		}
		echo "Entered data successfully\n";
		
		mysqli_close($con);
		header("Location: welcome.php");
		//header("Location: signedin.html");
		}
		else
		{
				header("Location: signup.html");
		}
		

}

?>

	
	