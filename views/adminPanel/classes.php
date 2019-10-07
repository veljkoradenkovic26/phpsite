<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/23/2018
 * Time: 6:32 PM
 */
$upit="select * from classes";
$classes=$conn->query($upit);
if(isset($_REQUEST['submit'])){
    $name=$_REQUEST['name'];
    $text=$_REQUEST['text'];
    $tmp_file=$_FILES['image']['tmp_name'];
    $putanja="images/".time().$_FILES['image']['name'];
    if(move_uploaded_file($tmp_file,$putanja));
    $upitSlikaInsert="INSERT INTO images(src,alt)values(:putanja,'aaaa')";
    $stmt=$conn->prepare($upitSlikaInsert);
    $stmt->bindParam(":putanja",$putanja);
    try{
        $stmt->execute();
        $id_image=$conn->lastInsertId();
        $upitInsertclasses="INSERT INTO classes(name,text,id_image)values(:name,:text,:id_image)";
        $stmtS=$conn->prepare($upitInsertclasses);
        $stmtS->bindParam(":name",$name);
        $stmtS->bindParam(":text",$text);
        $stmtS->bindParam(":id_image",$id_image);
        $stmtS->execute();
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }
}
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Text</th>
        <th scope="col">Image</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($classes as $c):?>
        <tr>
            <th scope="row"><?php echo $c['id']?></th>
            <td><?php echo $c['name']?></td>
            <td><?php echo $c['text']?></td>
            <td><?php echo $c['id_image']?></td>
            <td><a href="#" class="users" data-table="classes" data-id="<?php echo $c['id']?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $c['id']?>&&table=classes">Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<div class="col-lg-4 col-lg-offset-4" id="forma">
    <form method="post" action="admin.php?page=classes" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Text</label>
            <input name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Text">
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
                    forma += `<form method="post" action="views/adminPanel/classesEdit.php" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="hidden" name="id" value="${d.id}">
        <input name="name" value="${d.name}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">TextName</label>
        <input name="text" value="${d.text}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Image">
    </div>
    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
</form>`
                });
                $('#forma').html(forma);
            }

        });
    });
</script>
