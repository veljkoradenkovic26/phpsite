<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/13/2018
 * Time: 12:41 AM
 */
include('connection.php');
include('views/commponents/header.php');
include ('views/commponents/banner.php');
if(isset($_GET['page'])){
    $page=$_GET['page'];
    switch ($page){
        case "Team":
            include('views/commponents/team.php');
            break;
        case "Schedule":
            include('views/commponents/schedule.php');
            break;
        case "Classes":
            include('views/commponents/classes.php');
            break;
        case "Login/Register":
            include('views/commponents/loginRegister.php');
            break;
        case "About":
            include('views/commponents/about.php');
            break;
    }
}else{
    include('views/commponents/classes.php');
}

include('views/commponents/footer.php');