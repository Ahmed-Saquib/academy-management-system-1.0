<?php
if (!empty($_POST)){   
    $uid=$_POST['uid'];
    $password=$_POST['password'];
    $uname=$_POST["uname"];
    
    $conn=mysqli_connect("localhost","root","","school");
    // Check connection
    if (mysqli_connect_errno()){
        //echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
   

    $sqlUser="SELECT * from account where studentid='$uid'&& studentpass='$password'";
    $result=mysqli_query($conn,$sqlUser); 
    if (mysqli_connect_errno()){
        echo "Failed to retrieve data: " . mysqli_connect_error();
    }
    $num=mysqli_num_rows($result);
    if($num==1){
            setcookie('uid',$uid, time() + (86400 * 30), "/");   
            session_start();
            $_SESSION['uid']=$uid;
            $_SESSION['uname']=$uname;
            $_SESSION['password']=$password;
            
            while($row=mysqli_fetch_array($result)){
                if($row['usertype']==1){
                    echo "<script>window.location.href = '../controller/show.php';</script>";
                }else{
                    echo "<script>window.location.href = '../controller/adminpage.php';</script>";
                 }
             }
        
        //header('loctaion: show.php');
            }else{
        
        header('location:../controller/signin.php');
        }
}


?>