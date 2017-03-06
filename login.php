<?php	
$servername = "localhost";
$userr = "root";
$password = "root";

	session_start();
try {
    //$conn = new PDO("mysql:host=$servername;dbname=appointmentmaster", $userr, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn = new mysqli("localhost", "root", "root", "idoctor") or die(mysqli_error());

      if(empty($_POST['email']) || empty($_POST['password']))
		{
			echo "All fields are mandatory!";
			 header('Location: login.html');
		}     
         
		$email = $_POST['email'];
		$pass = $_POST['password'];
		
		setcookie("email",$email); 
		//setcookie("Name",$Name); 
     
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
				//$email = test_input($_POST['email']);
				//$pass = test_input($_POST['password']);
				$_SESSION['sess_email'] = $email;
				$_SESSION['sess_password'] = $pass;
				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) or strlen($pass) < 6)
				{ 
					 header('Location: login.html');
				}
				
				else
				{
					if($email == 'admin@gmail.com')
					{
						if($pass == 'admin123')
						{
							header('Location: admin/admin.php');
						}
					}
					else
					{
					$sql = 'SELECT email,password FROM patients';
					$result = $conn->query($sql);
					
					$count = 0;
					foreach ($result as $row) 
					{
						if($row['email']==$email)
						{
							$count = $count + 1;
								if($row['password']==$pass)
								{$count = $count + 1;
									$fname = $row['FirstName'];
									$lname = $row['Lastname'];
									$_SESSION['sess_fname'] = $fname;
									$_SESSION['sess_lname'] = $lname;
									header('Location: welcome.php');
									//header('Location: signedin.html');
								}
						}
					}
					
					if($count == 0)
					{
						header('Location: login.html');

					}
					
					if($count == 1)
					{
						header('Location: login.html');

					}
					
					}
				}
				session_write_close();
		}
		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
					mysqli_close($conn);

		}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	

?>