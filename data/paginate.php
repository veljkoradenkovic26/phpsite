<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/14/2018
 * Time: 10:54 PM
 */
include('../connection.php');
include("../data/json.php");
$broj=$_POST['broj'];
$limit=($broj*3)-3;
$upit="SELECT * FROM team INNER JOIN images on team.id_image = images.id limit $limit,3 ";
$team=$conn->query($upit);
$obj=$team->fetchAll();
returnJson($obj);