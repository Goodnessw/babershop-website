<?php
    ob_start();
	session_start();

	 //Page Title
	 $pageTitle = 'Settings';

	if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
	{
		include 'connect.php';
		include 'Includes/functions/functions.php'; 
		include 'Includes/templates/header.php';

//Getting website settings

    $stmt_web_settings = $con->prepare("SELECT * FROM website_settings");
    $stmt_web_settings->execute();
    $web_settings = $stmt_web_settings->fetchAll();

    $barber_name = "";
    $barber_email = "";
    $barber_address = "";
    $barber_phonenumber = "";
    $opening_hours = "";
	$admin_email = "";

    foreach ($web_settings as $option)
    {
        if($option['option_name'] == 'barber_name')
        {
            $barber_name = $option['option_value'];
        }

        elseif($option['option_name'] == 'barber_email')
        {
            $barber_email = $option['option_value'];
        }

        elseif($option['option_name'] == 'barber_phonenumber')
        {
            $barber_phonenumber = $option['option_value'];
        }
        elseif($option['option_name'] == 'barber_address')
        {
            $barber_address = $option['option_value'];
        }
        elseif($option['option_name'] == 'opening_hours')
        {
            $opening_hours = $option['option_value'];
        }
		elseif($option['option_name'] == 'admin_email')
        {
            $admin_email = $option['option_value'];
        }
    }
		

        ?>
<div class="card">
            	<div class="card-header">
                	Website Settings
           		</div>
                <div class="card-body">
            		<form method="POST" class="website_settings_form" action="website-settings.php">
                   		<div class="panel-">
                        	<div class="panel-header-X">
                                <div class="main-title">
                                    Settings
                                </div>
                            </div>
                            <div class="save-header-X" style="background-color:lightblue; padding:10px;width:90%; margin-bottom: 10px;">
                                <div style="display:flex">
                                    <div class="icon">
                                        <i class="fa fa-sliders-h"></i>
                                    </div>
                                    <div class="title-container">Website details</div>
                                </div>
                            </div>
                            <div class="panel-body-X">

<div class="form-group">
<table border="1" cellspacing="20" cellpadding="20"  style="width:1000px; height:200px;">

<tbody>
<?php
		include('connect.php');
		$result = $con->prepare("SELECT * FROM website_settings ORDER BY option_id");
		$result->execute();
		
	?>
	<tr>
		<td>Barber Name</td>
		<td> <?php echo $barber_name; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '1' ?>"> edit </a></td>
	</tr>
	<tr>
		<td>Barber Email</td>
		<td> <?php echo $barber_email; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '2' ?>"> edit </a></td>
	</tr>
	<tr>
		<td>Admin Email</td>
		<td> <?php echo $admin_email; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '3' ?>"> edit </a></td>
	</tr>
	<tr>
		<td>Barber Phonenumber</td>
		<td> <?php echo $barber_phonenumber; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '4' ?>"> edit </a></td>
	</tr>
	<tr>
		<td>Barber Adress</td>
		<td> <?php echo $barber_address; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '5' ?>"> edit </a></td>
	</tr>
	<tr>
		<td>Opening Hours</td>
		<td> <?php echo $opening_hours; ?></td>
		<td><a href="website-setting-form.php?id=<?php echo '6' ?>"> edit </a></td>
	</tr>
	<?php
		};  
	?></div>
</tbody>
</table>
<?php  include 'Includes/templates/footer.php'; ?>