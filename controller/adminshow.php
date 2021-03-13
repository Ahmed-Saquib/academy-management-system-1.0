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
	if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$yresult = mysqli_query($conn,"SELECT id FROM account where usertype=0");
	
	while($row1 = mysqli_fetch_array($yresult)){
		$Id=$row1['id'];
				
	}
				
	if(isset($_GET['page'])){
		$page= $_GET['page'];
	}else{
         $page=1;
	}
	$num_per_page=05;
	$start_from=($page-1)*05;
	
	$result = mysqli_query($conn,"SELECT * FROM account limit $start_from,$num_per_page ");		 
?>

<body>
<?php include '../view/header.php';?>

	
<?php include '../view/adminmenu.php';?>
 
		<div class="content-data">
			<table border='2'>
			  <tr>
			
					<th>Serial Number</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Student Password</th>
					<th>Phone Number</th>
					<th>Edit</th>
					<th>Remove</th>
					<th>Add Result</th>
					
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
					<td> <?php echo($rowId); ?></td>
					<td> <?php echo($studentId); ?></td>
					<td><?php echo($username); ?></td>
					<td><?php echo($studentpass); ?></td>
					<td><?php echo($phoneNumber); ?></td>
					<td><a href="../model/edit.php?x=<?php echo($rowId); ?>">🟨</a></td>
					<td><a href="../model/del.php?x=<?php echo($rowId); ?> "onclick='return checkdelete()'>🟥</a></td>
					<td><a href="submitresult.php?x=<?php echo($rowId); ?>">🟩</a></td>
				</tr>
				
			
				<?php 
				} ?>
					<tr>
						<td style="background-color:black" colspan="8">
							<?php
							$xresult = mysqli_query($conn,"SELECT * FROM account  ");		 
							$total_record= mysqli_num_rows($xresult);
							$total_page= ceil($total_record/$num_per_page);
							for($i=1;$i<$total_page;$i++){
								echo'<span style="padding-right:10px"><a href="adminshow.php?page='.$i.'">'.$i.'</a></span>';
								                                
							} 
						

						?> 
					</td>
				</tr>
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



