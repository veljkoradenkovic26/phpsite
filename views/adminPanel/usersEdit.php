<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 6/6/2018
 * Time: 5:34 PM
 */
include ('../../connection.php');
if(isset($_POST['Edit'])){
    $id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$uloga=$_POST['role'];
if($password==""&&$uloga==0){
    $sql="UPDATE users SET first_name=:fname,last_name=:lname,email=:email where id=:id";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->bindParam(":fname",$fname);
    $stmt->bindParam(":lname",$lname);
    $stmt->bindParam(":email",$email);
    try{
        $stmt->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}else{
    if($password!="" && uloga!=0){
        $sql="UPDATE users SET first_name=:fname,last_name=:lname,email=:email,id_role=:uloga,password=:password where id=:id";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":uloga",$uloga);
        $stmt->bindParam(":password",md5($password));
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":fname",$fname);
        $stmt->bindParam(":lname",$lname);
        $stmt->bindParam(":email",$email);
        try{
            $stmt->execute();

        }catch (PDOException $ex){
            echo $ex->getMessage();
        }

    }
    if($password!=""){
        $sql="UPDATE users SET first_name=:fname,last_name=:lname,email=:email,password=:password where id=:id";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":password",md5($password));
        $stmt->bindParam(":fname",$fname);
        $stmt->bindParam(":lname",$lname);
        $stmt->bindParam(":email",$email);
        try{
            $stmt->execute();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }if($uloga!=0){
        $sql="UPDATE users SET first_name=:fname,last_name=:lname,email=:email,id_role=:uloga where id=:id";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":uloga",$uloga);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":fname",$fname);
        $stmt->bindParam(":lname",$lname);
        $stmt->bindParam(":email",$email);
        try{
            $stmt->execute();
            header("Location:".$_SERVER['HTTP_REFERER']);
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
}
}
