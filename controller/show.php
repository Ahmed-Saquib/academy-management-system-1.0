<?php

session_start();
include '../model/utility.php';
$Util = new Utility();

if($Util->check() == false) {
	header('location:signin.php');
}


?>
<html>
<head>
<link rel="stylesheet" href="../view/css/Styles2.css">
<link rel="stylesheet" href="../view/css/header.css">
<link rel="stylesheet" href="../view/css/menu.css">

</head>

<?php
	$n=$_SESSION['uid'];
	$m=$_SESSION['uname'];
	$conn=mysqli_connect("localhost","root","","school");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($conn,"SELECT * FROM account where studentid='$n'");		 
?>

<body>
<?php include '../view/header.php';?>

	
<?php include '../view/studentmenu.php';?>
 
		<div class="content-data">
			<table border='2'>
			  <tr>
			
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Student Password</th>
					<th>Phone Number</th>
					<th>Edit</th>
					
			  </tr>
			 
			<?php
		   
			   while($row = mysqli_fetch_array($result))
				{
					$rowId=$row['id'];
					$studentId=$row['studentid']; 
					$username=$row['username'];
					$studentpass=$row['studentpass'];
					$phoneNumber=$row['phonenum'];
					
			?>
				
				<tr>
					<td> <?php echo($studentId); ?></td>
					<td><?php echo($username); ?></td>
					<td><?php echo($studentpass); ?></td>
					<td><?php echo($phoneNumber); ?></td>
					<td><a href="../model/edit3.php?x=<?php echo($rowId); ?>">🟨</a></td>
					
				</tr>
				
			
			<?php 
		    } ?>
		   
			</table>
				
		</div>
	</div>
	<?php
    $n=$_SESSION['uid'];
	$conn=mysqli_connect("localhost","root","","school");
	// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"SELECT semester,credit,grade,gpoint FROM result where studentid='$n' ");		 
?>


 
		<div class="content-data">
			<table border='2'>
			  <tr>
			
					 
					 
					<th>Semester Name</th>
					<th>Course Credit</th>
					<th>Grade</th>
					<th>Grade Point</th>
                    
			  </tr>
			 
			<?php
		   
			   while($row = mysqli_fetch_array($result))
				{
					
					 
					$semester=$row['semester'];
					$credit=$row['credit'];
                    $grade=$row['grade'];
                    $gpoint=$row['gpoint'];
					
			?>
				
				<tr>
					 
					 
					<td><?php echo($semester); ?></td>
					<td><?php echo($credit); ?></td>
                    <td><?php echo($grade); ?></td>
                    <td><?php echo($gpoint); ?></td>
					
				</tr>
				
			
			<?php 
		    } ?>
		   
			</table>
				
		</div>
	</div>
	
</body>
</html>