<?php
    $id=$_GET["x"];
    // Check connection
    $conn=mysqli_connect("localhost","root","","school");

    if (mysqli_connect_errno()){
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn,"DELETE FROM result WHERE ID='$id'");
    header("location:../controller/adminshow2.php");
?>