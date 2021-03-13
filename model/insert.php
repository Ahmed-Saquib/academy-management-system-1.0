<?php
$studentid = filter_input(INPUT_POST, 'studentid');
$username = filter_input(INPUT_POST, 'username');
$studentpass = filter_input(INPUT_POST, 'studentpass');
$phonenum = filter_input(INPUT_POST, 'phonenum');

			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "school";
			$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
			if (mysqli_connect_error()){
				die('Connect Error ('. mysqli_connect_errno() .') '
			. mysqli_connect_error());
			}
			else{
				$sql = "INSERT INTO account (studentid,username,studentpass,phonenum)
				values ('$studentid','$username','$studentpass','$phonenum')";
				if ($conn->query($sql)){
					header("Location:../controller/adminshow.php");
				}
				else{
					echo "Error: ". $sql ."". $conn->error;
				}
				$conn->close();
			}

?>