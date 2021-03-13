
<?php
if(!isset($_COOKIE['uid'])) {
session_start();
if(!isset($_SESSION['uid'])){
      header('location:../controller/signin.php');
}
}

$studentsemesterValidityMsg="";
$studentcourseValidityMsg="";
$studentgradeValidityMsg="";
$studentgpointValidityMsg="";
if( isset($_POST['semester']) )
{
      $semester = filter_input(INPUT_POST, 'semester');
      $credit = filter_input(INPUT_POST, 'credit');
      $grade = filter_input(INPUT_POST, 'grade');
      $gpoint = filter_input(INPUT_POST, 'gpoint');
      $hStudentId=filter_input(INPUT_POST, 'hStudentId');
      $validPost=true;
      
      if ($semester==""){ 
            $validPost=false;
            $studentsemesterValidityMsg="Student Semester cannot be empty";
      }
      if ($credit==""){ 
            $validPost=false;
            $studentcourseValidityMsg="Student Course cannot be empty";
      }
      if ($grade==""){ 
            $validPost=false;
            $studentgradeValidityMsg="Student Grade cannot be empty";
      }
      if ($gpoint==""){ 
            $validPost=false;
            $studentgpointValidityMsg="Student Grade Point cannot be empty";
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
                  $sql = "UPDATE result set semester='$semester',credit='$credit',grade='$grade',gpoint='$gpoint' where id=$hStudentId";
                  if ($conn->query($sql)){
                        header("Location:../controller/adminshow2.php");
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
      $sql ="SELECT * FROM result WHERE id='$id'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
            while($row = $result->fetch_assoc()) {
                  $hStudentId=$row['id']; 
                  $semester=$row['semester']; 
                  $credit=$row['credit'];
                  $grade=$row['grade'];
                  $gpoint=$row['gpoint'];
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
            <form method="post" action="edit2.php">
                  <label for="semester ">Semester</label>
                  <input type="text" id="semester" name="semester" value="<?php echo($semester); ?>"><br>
                  <div style="color:red" ><?php echo($studentsemesterValidityMsg); ?></div>

                  <label for="credit">Course Credit</label>
                  <input type="text" id="credit" name="credit" value="<?php echo($credit); ?>"><br>
                  <div style="color:red"><?php echo($studentcourseValidityMsg); ?> </div>

                  <label for="grade">Grade</label>
                  <input type="text" id="grade" name="grade" value="<?php echo($grade); ?>"><br>
                  <div style="color:red"><?php echo($studentgradeValidityMsg); ?> </div>

                  <label for="gpoint">Grade Point</label>
                  <input type="text" id="gpoint" name="gpoint" value="<?php echo($gpoint); ?>"><br>
                  <div style="color:red"><?php echo($studentgpointValidityMsg); ?> </div>
                  

                  <input type="hidden" name="hStudentId" value="<?php echo($hStudentId); ?>" />
                  
                  <input type="submit" value="Submit">
            </form>
      </div>

</body>
</html>