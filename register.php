<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/16/2018
 * Time: 4:59 PM
 */
include ("connection.php");
if(isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = addslashes($_POST['email']);
    $password = $_POST['password'];
    $regfname="/^[A-Z]{1}[a-z]{2,20}$/";
    $reglname="/^[A-Z]{1}[a-z]{2,20}$/";
    $rePassword="/\w{5,19}/";
    $wrong=[];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($wrong, "Email is in invalid format");
    }
    if(!preg_match($regfname, $fname)){
        array_push($wrong, "First name is invalid format");
    }
    if(!preg_match($reglname, $lname)){
        array_push($wrong, "Last name is invalid format");
    }
    if(!preg_match($rePassword, $password)){
        array_push($wrong, "Password is in invalid format, must be between 5 and 21 caracters, onlu cab have [A-z] and numbers");
    }
    if(count($wrong) == 0){
        $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        if ($query->rowcount() == 0)
        {
            try{
                $query=$conn->prepare("INSERT INTO users(id_role,first_name, last_name, email, password)VALUES(2, ?, ?, ? ,?)");
                $query->execute(array($fname, $lname,$email, md5($password)));
                header('Location:index.php?page=Login/Register');

            }catch(PDOException $ex){

                header('Location:index.php?page=Login/Register?message=$wrong');
            }
        }
        else {
            header('Location:index.php?page=Login/Register?message=$wrong');
        }


}
    session_start();
    $_SESSION['greske']=$wrong;
    header('Location:'.$_SERVER['HTTP_REFERER']);

}