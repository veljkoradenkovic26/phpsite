<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 6/7/2018
 * Time: 11:15 PM
 */
include ('../../connection.php');
if(isset($_REQUEST['Edit'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $upit="UPDATE days SET name=:name where id=:id";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":id",$id);
    $res=$stmt->execute();
    if($res){
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}