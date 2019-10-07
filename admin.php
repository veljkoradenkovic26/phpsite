<?php
session_start();
include('connection.php');
$admin='';
?>
<?php if(isset($_SESSION['uloga'])):?>
<?php if($_SESSION['uloga']=='admin'):?>

<!-- Bootstrap  -->
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<!-- Main container -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin.php?page=users">Users</a></li>
                <li><a href="admin.php?page=team">Team</a></li>
                <li><a href="admin.php?page=schedule">Schedule</a></li>
                <li><a href="admin.php?page=navigation">Navigation</a></li>
                <li><a href="admin.php?page=days">Days</a></li>
                <li><a href="admin.php?page=classes">Classes</a></li>
                <li><a href="admin.php?page=pitanja">Pitanja</a></li>
                <li><a href="admin.php?page=odgovori">Odgovori</a></li>
                <li><a href="admin.php?page=rezultat">Rezultat</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php
if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
    switch ($page){
        case "users" :
            include("views/adminPanel/users.php");
            break;
        case "team" :
            include("views/adminPanel/team.php");
            break;
        case "classes" :
            include("views/adminPanel/classes.php");
            break;
        case "days" :
            include("views/adminPanel/days.php");
            break;
        case "navigation" :
            include("views/adminPanel/navigation.php");
            break;
        case "schedule" :
            include("views/adminPanel/schedule.php");
            break;
        case "pitanja" :
            include("views/adminPanel/pitanja.php");
            break;
        case "odgovori" :
            include("views/adminPanel/odgovori.php");
            break;
        case "rezultat" :
            include("views/adminPanel/rezultat.php");
            break;
    }
}

?>


</body>

</html>
<?php endif;?>
<?php else:;?>
<?php header("Location:index.php");?>
<?php endif;?>

