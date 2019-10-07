<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/24/2018
 * Time: 2:20 AM
 */
include ('connection.php');
$table=$_REQUEST['table'];
$id=$_REQUEST['id'];
$stmt=$conn->prepare("Delete from $table where id = :id");
$stmt->bindParam('id',$id);
try{
$stmt->execute();
header("Location:".$_SERVER['HTTP_REFERER']);
}
catch(PDOException $ex){
    echo $ex;
}