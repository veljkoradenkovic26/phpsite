<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 6/7/2018
 * Time: 11:31 PM
 */
include("../../connection.php");
if(isset($_REQUEST['Edit'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $upit="UPDATE navigation SET name=:name where id=:id";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":id",$id);
    $stmt->bindParam("name",$name);
    try{
        $stmt->execute();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}