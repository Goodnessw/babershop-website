<?php
 ob_start();
 session_start();

 //Page Title
 $pageTitle = 'Edit';

    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

	$result = $con->prepare("SELECT * FROM barber_admin WHERE admin_id= :admin_id");
	$result->bindParam(':admin_id', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="Design/css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
    <style>
	.col-md-6{
		margin-left: 500px;
	}
</style>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Edit Admin User</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
<form action="edit.php" method="POST">
<h4 class="text-success">Edit here...</h4>
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>"  />
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" />
				</div>
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" class="form-control" name="full_name" value="<?php echo $row['full_name']; ?>"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password"  value="<?php echo passthru($row['password']);?>" required/>
				</div>
<input type="submit" value="Save" />
</form>
</div>
	</div>
</body>
</html>
<?php
	}
   
        
		//Include Footer
		include 'Includes/templates/footer.php';
?>

