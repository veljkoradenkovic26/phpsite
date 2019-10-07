<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/24/2018
 * Time: 2:37 AM
 */
include ('../../connection.php');
include('../../data/json.php');
$table=$_REQUEST['table'];
$id=$_REQUEST['id'];
$stmt=$conn->prepare("SELECT * from $table where id = :id");
$stmt->bindParam('id',$id);
$stmt->execute();
$niz=$stmt->fetchAll();
returnJson($niz);