<?php
if (isset($_POST['submit'])){
      $uid=$_POST["uid"];
      $uname=$_POST["uname"];
      $password=$_POST["password"];
      

}else{
      
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
             $n=$_SESSION['uid'];
      $conn=mysqli_connect("localhost","root","","school");
      // Check connection
      if (mysqli_connect_errno()){
          //echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
  
      $sqlUser="SELECT usertype from account where studentid='$n'";
      $result=mysqli_query($conn,$sqlUser); 
      if (mysqli_connect_errno()){
          echo "Failed to retrieve data: " . mysqli_connect_error();
      }
      while($row=mysqli_fetch_array($result)){
            if($row['usertype']==1){
                echo "<script>window.location.href = 'show.php';</script>";
            }else{
                echo "<script>window.location.href = 'adminpage.php';</script>";
             }
         }
      }
      }
}
      
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/css/Styles4.css">
<link rel="stylesheet" href="../view/css/header.css">
<link rel="stylesheet" href="../view/css/menu.css">
</head>
<body>
 
<?php 
include '../view/header.php';

?>
 

      
      <div>
            <form method="post" action="../model/validation.php">
                  

                  <label for="uid">Student ID</label>
                  <input type="text" id="name" name="uid" placeholder="ID"required><br>
                  <label for="uname">Student Name</label>
                  <input type="text" id="name" name="uname" placeholder="ID"required><br>
                  <label for="password">Student Password </label>
                  <input type="password" id="password" name="password" placeholder="Password "required><br>

                  
                  <input type="submit" value="Submit">
            </form>
      </div>

</body>
</html>