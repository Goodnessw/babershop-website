<?php
// configuration
include('connect.php');

// new data

$username = $_POST['username'];
$email = $_POST['email'];
$full_name = $_POST['full_name'];
$password = sha1($_POST['password']);
$id = $_POST['memids'];
// query
$sql = "UPDATE barber_admin 
        SET email=?, username=?, full_name=?, password=?
		WHERE admin_id=?";
$q = $con->prepare($sql);
$q->execute(array($email,$username,$full_name,$password,$id));
header("location: profile.php");


?>