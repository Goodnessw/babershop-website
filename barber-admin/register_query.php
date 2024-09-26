<?php
	session_start();
	require_once 'connect.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['username'] != "" || $_POST['email'] != "" || $_POST['fullname'] != "" || $_POST['password'] != "" || $_POST['cpassword'] != ""){
			try{
				$user_id = $_POST['user_id'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$fullname = $_POST['fullname'];
				
				$password = sha1($_POST['password']);
				$cpassword = sha1($_POST['cpassword']);
				if($password == $cpassword){
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `barber_admin` VALUES ('$admin_id', '$username', '$email', '$fullname', '$password')";
				$con->exec($sql);}
			
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$con = null;
			header('location:profile.php');
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
	}

	
	else{
		$_SESSION['message']=array("text"=>"password not matched","alert"=>"info");
			$con = null;
			header('location:profile.php');
	}
	
?>

