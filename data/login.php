<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/14/2018
 * Time: 1:24 AM
 */
session_start();
include ('../connection.php');
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $upit="select *,role.id as rId from users INNER JOIN roles on users.id_role = roles.id where email = '$email' and password = '$password'";
    $result=$conn->query($upit);
    $rezultat=$result->fetchAll();
    if(count($rezultat)>0){

           $_SESSION['uloga']=$rezultat->name;
           $_SESSION['id']=$rezultat->id;
           header("Location: index.php");
    header("Location: index.php");
    }else{
        echo "nema";
    }
}