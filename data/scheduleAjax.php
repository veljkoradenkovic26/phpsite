<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/13/2018
 * Time: 11:51 PM
 */
include('../connection.php');
include("../data/json.php");
$id=$_POST['id'];
$upit="SELECT *,classes.name as classesName,team.name as teamName FROM schedule INNER JOIN days on schedule.id_day = days.id INNER JOIN classes on schedule.id_classes = classes.id INNER JOIN team on schedule.id_team = team.id INNER JOIN images on classes.id_image = images.id where days.id = $id";
$result = $conn->query($upit);
$objects = $result->fetchAll();
returnJson($objects);