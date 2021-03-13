
<?php

class Utility{  
	public function check(){
		
		if($_SESSION['uid']==''){
			echo("test1-". isset($_SESSION['uid']));
		
			if($_COOKIE['uid']!='') {
				echo ("test2-".isset($_COOKIE['uid']));
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
				return true;
			}else{
				return false;   
			}
		}else{
			return true;
		}
		
	}
}
?>