<?php
 ob_start();
 session_start();

 //Page Title
 $pageTitle = 'Settings';

    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

	$id = $_GET['id'];
	$result = $con->prepare("SELECT * FROM website_settings WHERE option_id= :option_id");
	$result->bindParam(':option_id', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
		<h3 class="text-primary">Edit Website Setting</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
<form action="web-set.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<div><?php echo $row['option_name']; ?></div>
				</div>
				<div class="form-group">

					<input type="text" class="form-control" name="option_value" value="<?php echo $row['option_value']; ?>" />
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

