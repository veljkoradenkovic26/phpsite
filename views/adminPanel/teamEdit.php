<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 6/8/2018
 * Time: 3:18 AM
 */
include('../../connection.php');
if(isset($_REQUEST['Edit'])){
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $type=$_REQUEST['type'];
    $text=$_REQUEST['text'];
    $tmp_file=$_FILES['image']['tmp_name'];
    if($tmp_file==""){
        $upit1="UPDATE team SET name=:name,type=:type,text=:text where id=:id";
        $stmt=$conn->prepare($upit1);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":text",$text);
        $stmt->bindParam(":type",$type);
        $stmt->execute();
        header("Location:".$_SERVER['HTTP_REFERER']);
    }else{
        $id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
        $text=$_REQUEST['text'];
        $destinacija='../../images/'.time().$_FILES['image']['name'];
        $putanja='images/'.time().$_FILES['image']['name'];
        if(move_uploaded_file($tmp_file,$destinacija)){
            $upitSlika="INSERT INTO images(src,alt)values(:src,'aaaa')";
            $stmtSlika=$conn->prepare($upitSlika);
            $stmtSlika->bindParam(":src",$putanja);
            try{
                $stmtSlika->execute();
                $id_image=$conn->lastInsertId();
                $upit2="UPDATE team SET name=:name,type=:type,text=:text,id_image=:id_image where id=:id";
                $stmt2=$conn->prepare($upit2);
                $stmt2->bindParam(":id",$id);
                $stmt2->bindParam(":name",$name);
                $stmt2->bindParam(":text",$text);
                $stmt2->bindParam(":id_image",$id_image);
                $stmt2->bindParam(":type",$type);
                $stmt2->execute();
                header("Location:".$_SERVER['HTTP_REFERER']);
            }catch (PDOException $ex){
                echo $ex->getMessage();
            }
        }
    }
}