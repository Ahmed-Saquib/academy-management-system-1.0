
<?php
if(!isset($_COOKIE['uid'])) {
session_start();
if(!isset($_SESSION['uid'])){
      header('location:../controller/signin.php');
}
}

$studentIdValidityMsg="";
$studentNameValidityMsg="";
$studentPassValidityMsg="";
$studentPhoneValidityMsg="";
if( isset($_POST['studentid']) )
{
      $studentid = filter_input(INPUT_POST, 'studentid');
      $username = filter_input(INPUT_POST, 'username');
      $studentpass = filter_input(INPUT_POST, 'studentpass');
      $phonenum = filter_input(INPUT_POST, 'phonenum');
      $hStudentId=filter_input(INPUT_POST, 'hStudentId');
      $validPost=true;
      
      if ($studentid==""){ 
            $validPost=false;
            $studentIdValidityMsg="Student Id cannot be empty";
      }
      if ($username==""){ 
            $validPost=false;
            $studentNameValidityMsg="Student username cannot be empty";
      }
      if ($studentpass==""){ 
            $validPost=false;
            $studentPassValidityMsg="Student password cannot be empty";
      }
      if ($phonenum==""){ 
            $validPost=false;
            $studentPhoneValidityMsg="Student phone cannot be empty";
      }
      if($validPost)
      {
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
                  $sql = "UPDATE account set studentid='$studentid',username='$username',studentpass='$studentpass',phonenum='$phonenum' where id=$hStudentId";
                  if ($conn->query($sql)){
                        header("Location:../controller/adminshow.php");
                  }
                  else{
                        echo "Error: ". $sql ."". $conn->error;
                  }
                  $conn->close();
            }
      }
      
                  
}
else
{
      $id=$_GET["x"];
      $conn=mysqli_connect("localhost","root","","school");
      // Check connection
      if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql ="SELECT * FROM account WHERE ID='$id'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
            while($row = $result->fetch_assoc()) {
                  $hStudentId=$row['id']; 
                  $studentid=$row['studentid']; 
                  $username=$row['username'];
                  $studentpass=$row['studentpass'];
                  $phonenum=$row['phonenum'];
            }
      } 
      else {
            echo "0 results";
      }
      $conn->close();
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
 
<?php include '../view/header.php';?>
 

      <div>
            <form method="post" action="edit.php">
                  <label for="studentid ">Student ID </label>
                  <input type="text" id="studentid" name="studentid" value="<?php echo($studentid); ?>"><br>
                  <div style="color:red" ><?php echo($studentIdValidityMsg); ?></div>

                  <label for="username">Student Name</label>
                  <input type="text" id="username" name="username" value="<?php echo($username); ?>"><br>
                  <div style="color:red"><?php echo($studentNameValidityMsg); ?> </div>

                  <label for="studentpass">Student Pass</label>
                  <input type="text" id="studentpass" name="studentpass" value="<?php echo($studentpass); ?>"><br>
                  <div style="color:red"><?php echo($studentPassValidityMsg); ?> </div>

                  <label for="phonenum">Phone Number</label>
                  <input type="text" id="phonenum" name="phonenum" value="<?php echo($phonenum); ?>"><br>
                  <div style="color:red"><?php echo($studentPhoneValidityMsg); ?> </div>
                  

                  <input type="hidden" name="hStudentId" value="<?php echo($hStudentId); ?>" />
                  
                  <input type="submit" value="Submit">
            </form>
      </div>

</body>
</html>