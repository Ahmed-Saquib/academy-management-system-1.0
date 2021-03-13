<?php
$studentid = filter_input(INPUT_POST, 'studentid');
$username = filter_input(INPUT_POST, 'username');
$semester = filter_input(INPUT_POST, 'semester');
$credit = filter_input(INPUT_POST, 'credit');
$grade = filter_input(INPUT_POST, 'grade');
$gpoint = filter_input(INPUT_POST, 'gpoint');

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
				$sql = "INSERT INTO result(studentid,username,semester,credit,grade,gpoint)
				values ('$studentid','$username','$semester','$credit','$grade','$gpoint')";
				if ($conn->query($sql)){
					header("Location:../controller/adminshow2.php");
					
				}
				else{
					echo "Error: ". $sql ."". $conn->error;
				}
				$conn->close();
			}

?>