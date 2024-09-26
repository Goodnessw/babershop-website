<?php 
	session_start();

	//Check If user is already logged in
	if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
	{
        //Page Title
        $pageTitle = 'Register';

        //Includes
        include 'connect.php';
        include 'Includes/functions/functions.php'; 
        include 'Includes/templates/header.php';

?>
<style>
	.col-md-6{
		margin-left: 500px;
	}
</style>
	
	<div class="col-md-6 well">
		<h3 class="text-primary">Add Admin User</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="register_query.php" method="POST">	
				<h4 class="text-success">Add here...</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username"  />
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" class="form-control" name="fullname" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="cpassword" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="register">Add User</button>
				</div>
			</form>
		</div>
	</div>


<?php
        
		//Include Footer
		include 'Includes/templates/footer.php';
	}
	else
    {
    	header('Location: profile.php');
        exit();
    }

?>