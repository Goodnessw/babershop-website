<?php
// configuration
include('connect.php');

// new data
$option_value = $_POST['option_value'];
$id = $_POST['memids'];
// query
$sql = "UPDATE website_settings 
        SET  option_value=?
		WHERE option_id=?";
$q = $con->prepare($sql);
$q->execute(array($option_value,$id));
header("location: website-settings.php");


?>