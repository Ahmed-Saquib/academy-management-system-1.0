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
<?php
    
    $conn=mysqli_connect("localhost","root","","school");
	// Check connection
	if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
   
      $id=$_GET["x"];
        
        $result = mysqli_query($conn,"SELECT studentid,username FROM account where id='$id'");
        
       while($row = mysqli_fetch_array($result)){
            $selectedid =$row['studentid'];
            $selectedidname=$row['username'];
            
    }

    	
     	 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/css/Styles5.css">
<link rel="stylesheet" href="../view/css/header.css">
<link rel="stylesheet" href="../view/css/menu.css">
<link rel="stylesheet" href="../view/css/studentresultheader.css">
</head>

<body>
 
<?php
$n=$_SESSION['uid'];
$m=$_SESSION['uname'];
 include '../view/header.php';?>
<?php include '../view/adminmenu.php';?>
<?php include '../view/studentresultheader.php';?>

      
      <div>
            <form method="post" action="../model/insert2.php">
                  
                  <input type="hidden"  name="studentid" value='<?php echo $selectedid; ?>'><br>
                  <input type="hidden"  name="username" value='<?php echo $selectedidname; ?>'><br>
                  
                  <label for="semester">Semester</label>
                  <input type="text" id="semester" name="semester" placeholder="Semester"required><br>

                  <label for="credit">Course Credit</label>
                  <input type="text" id="credit" name="credit" placeholder="Course Credit"required><br>
                  
                  <label for="grade">Grade</label>
                  <input type="text" id="grade" name="grade" placeholder="Grade"required><br>

                  <label for="gpoint">Grade Point</label>
                  <input type="text" id="gpoint" name="gpoint" placeholder="Grade Point"required><br>
                  
                  <input type="submit" value="Submit">
            </form>
      </div>

</body>
</html>