<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Profile';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {

 $do = 'Manage';

if($do == "Manage")
{
    $stmt = $con->prepare("SELECT * FROM barber_admin where admin_id='$id'");
    $stmt->execute();
    $users = $stmt->fetchAll();

?>
    <div class="card">
        <div class="card-header">
            <?php echo $pageTitle; ?>
        </div>
        <div class="card-body">

            <a href="registration.php"><button>Add admin users</button></a>
            <a href="editform.php"><button>Edit Profile</button></a>
            <!-- USERS TABLE -->
            <table class="table table-bordered users-table" border="1" cellspacing="0" >
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($users as $user)
                        {
                            echo "<tr>";
                                echo "<td>";
                                    echo $user['username'];
                                echo "</td>";
                                echo "<td>";
                                    echo $user['email'];
                                echo "</td>";
                                echo "<td>";
                                    echo $user['full_name'];
                                echo "</td>";
                                echo "<td>";
                                    echo $user['password'];
                                echo "</td>";
                            echo "</tr>";
                        }?>

                </tbody>
            </table>  
        </div>
    </div>

    <br>
    <div class=" col-sm-6 col-lg-3">
        <div class="panel panel-navy">
            <div class="panel-heading">
                <div class="row" style="cursor:pointer">
                    <div class="col-sm-3">
                        <i class="fas fa-user fa-4x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="huge"><span><?php echo countItems("admin_id","barber_admin")?></span></div>
                        <div>Total Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>
            
            <?php
    
                    }
        
        //Include Footer
        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }

?>