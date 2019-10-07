<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/23/2018
 * Time: 6:27 PM
 */
$upit="Select * from team";
$team=$conn->query($upit);
if(isset($_REQUEST['submit'])){
    $name=$_REQUEST['name'];
    $type=$_REQUEST['type'];
    $text=$_REQUEST['text'];
    $target_dir = "images/";
    $target_file=$_FILES["image"]["tmp_name"];
    $src=time().$_FILES['image']['name'];
    $odrediste=$target_dir.time().($_FILES["image"]["name"]);
    if(move_uploaded_file($target_file,$odrediste)){
       $upitslika="INSERT INTO images(src,alt)values(:src,'aaaa')";
       $stmt=$conn->prepare($upitslika);
       $stmt->bindParam(":src",$odrediste);
       try{
           $stmt->execute();
           $poslednji=$conn->lastInsertId();
           $upitTeamInsert="INSERT INTO team(name,type,text,id_image)values(:name,:type,:text,:id_image)";
           $stmtt=$conn->prepare($upitTeamInsert);
           $stmtt->bindParam(":name",$name);
           $stmtt->bindParam(":type",$type);
           $stmtt->bindParam(":text",$text);
           $stmtt->bindParam(":id_image",$poslednji);
            $stmtt->execute();
            header("Location:".$_SERVER['HTTP_REFERER']);

       }catch(PDOException $ex){
           echo $ex->getMessage();
       }
    }
}
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Text</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($team as $t):?>
        <tr>
            <th scope="row"><?php echo $t['id']?></th>
            <td><?php echo $t['name']?></td>
            <td><?php echo $t['type']?></td>
            <td><?php echo $t['text']?></td>
            <td><?php echo $t['id_image']?></td>
            <td><a href="#" class="users" data-table="team" data-id="<?php echo $t['id']?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $t['id']?>&&table=team">Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<div class="col-lg-4 col-lg-offset-4" id="forma" >
    <form method="post" action="admin.php?page=team" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <input name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Text</label>
            <input name="text" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Text">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Image">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script>
    $('.users').click(function(){
        event.preventDefault();
        var that=$(this);
        var table=that.data('table');
        var id=that.data('id');

        $.ajax({
            url:'views/adminPanel/get.php',
            method:'post',
            dataType:'JSON',
            data:{
                id:id,
                table:table
            },
            success:function(data){
                var forma = ""
                $.each(data,function(index,d){
                    forma += `<form method="post" action="views/adminPanel/teamEdit.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="hidden" name="id" value="${d.id}">
        <input name="name" value="${d.name}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Type</label>
        <input name="type" value="${d.type}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Text</label>
        <input name="text" value="${d.text}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Text">
    </div>
   <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input name="image" type="file" class="form-control" id="exampleInputPassword1" placeholder="Image">
        </div>
    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
</form>`
                });
                $('#forma').html(forma);
            }

        });
    });
</script>

