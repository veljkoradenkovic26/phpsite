<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/13/2018
 * Time: 3:29 PM
 */
try{
    $conn= new PDO('mysql:host=localhost;dbname=id6239395_fitness', 'root', "");
}catch (PDOException $e){
    echo "Greska prilikom konekcije".$e->getMessage();
}