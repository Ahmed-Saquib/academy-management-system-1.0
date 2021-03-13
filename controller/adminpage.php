<?php
session_start();
if(!isset($_SESSION['uid'])){
	if(isset($_COOKIE['uid'])) {
		$postUserID=$_COOKIE['uid'];
		$conn=mysqli_connect("localhost","root","","school");
		// Check connection
		if (mysqli_connect_errno()){
		//echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
   

		$sqlUser="SELECT studentpass,username from account where studentid='$postUserID'";
		$result=mysqli_query($conn,$sqlUser); 
		if (mysqli_connect_errno()){
			echo "Failed to retrieve data: " . mysqli_connect_error();
		}
		while($row=mysqli_fetch_array($result)){
			$postUserPass=$row['studentpass'];
			$postUserName=$row['username'];
		}
		
		$_SESSION['uid']=$postUserID;
		$_SESSION['uname']=$postUserName;
		$_SESSION['password']=$postUserPass;
	}
	else{
		header('location:signin.php');
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/css/Styles1.css">
<link rel="stylesheet" href="../view/css/header.css">
<link rel="stylesheet" href="../view/css/menu.css">
</head>
<?php
$n=$_SESSION['uid'];
$m=$_SESSION['uname'];
?>

<body>


 
<?php include '../view/header.php';?>
 
<?php include '../view/adminmenu.php';?>
      
       

</body>
</html>