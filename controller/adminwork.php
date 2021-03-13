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
}else{
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

<body>
 
<?php  $n=$_SESSION['uid'];
      $m=$_SESSION['uname'];
      include '../view/header.php';?>
 
<?php include '../view/adminmenu.php';?>
      
      <div>
            <form method="post" action="insert.php">
                  <label for="studentid ">Student ID </label>
                  <input type="text" id="studentid" name="studentid" placeholder="Student ID " required><br>

                  <label for="username">Student Name</label>
                  <input type="text" id="username" name="username" placeholder="Student Name"required><br>
                  
                  <label for="studentpass">Student Password </label>
                  <input type="text" id="studentpass" name="studentpass" placeholder="Student Password "required><br>

                  <label for="phonenum">Phone Number</label>
                  <input type="text" id="phonenum" name="phonenum" placeholder="Phone Number"required><br>
                  </select>
                  
                  <input type="submit" value="Submit">
            </form>
      </div>

</body>
</html>