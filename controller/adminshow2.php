
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
    $result = mysqli_query($conn,"SELECT * FROM result ");		 
?>

<body>
<?php include '../view/header.php';?>
<?php include '../view/adminmenu.php';?>
 
		<div class="content-data">
			<table border='2'>
			  <tr>
			
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Semester Name</th>
					<th>Course Credit</th>
					<th>Grade</th>
					<th>Grade Point</th>
                    <th>Edit</th>
                    <th>Remove</th>
					

			  </tr>
			 
			<?php
		   
			   while($row = mysqli_fetch_array($result))
				{
					$id=$row['id'];
					$studentid=$row['studentid'];
					$username=$row['username']; 
					$semester=$row['semester'];
					$credit=$row['credit'];
                    $grade=$row['grade'];
                    $gpoint=$row['gpoint'];
					
			?>
				
				<tr>
					<td> <?php echo($studentid); ?></td>
					<td><?php echo($username); ?></td>
					<td><?php echo($semester); ?></td>
					<td><?php echo($credit); ?></td>
                    <td><?php echo($grade); ?></td>
                    <td><?php echo($gpoint); ?></td>
					<td><a href="../model/edit2.php?x=<?php echo($id); ?>">🟨</a></td>
					<td><a href="../model/del2.php?x=<?php echo($id); ?> "onclick='return checkdelete()'>🟥</a></td>
					
				</tr>
				
			
			<?php 
		    } ?>
		   
			</table>
				<script>
					function checkdelete(){
						return confirm ('Are you sure want to delete this record ?')

					}
				</script>
		</div>
	</div>
	
</body>
</html>



