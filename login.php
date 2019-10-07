<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/14/2018
 * Time: 1:24 AM
 */
session_start();
include ('connection.php');
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $upit="select *,users.id as uId from users INNER JOIN roles on users.id_role = roles.id where email = '$email' and password = '$password'";
    $result=$conn->query($upit);
    $rezultat=$result->fetchAll();
    if(count($rezultat)>0){
       foreach($rezultat as $r){
           $_SESSION['uloga']=$r['name'];
           $_SESSION['id']=$r['uId'];
       }
        header("Location: index.php");
    }else{
        header('Location:'.$_SERVER['HTTP_REFERER']);
        $_SESSION['greska']="Ne postoji korisnik sa takvim mailom ili sifrom";
    }
}