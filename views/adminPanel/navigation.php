<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/23/2018
 * Time: 6:36 PM
 */
$upit="select * from navigation";
$navigation=$conn->query($upit);
if(isset($_REQUEST['add'])){
    $name=$_REQUEST['name'];
    $upit="INSERT INTO navigation(name)VALUES(:name)";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":name",$name);
    try{
        $stmt->execute();
        header("Location:".$_SERVER['HTTP_REFERER']);
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
    </tr>
    </thead>
    <tbody>
    <?php foreach($navigation as $n):?>
        <tr>
            <th scope="row"><?php echo $n['id']?></th>
            <td><?php echo $n['name']?></td>
            <td><a href="#" class="users" data-table="navigation" data-id="<?php echo $n['id']?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $n['id']?>&&table=navigation">Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</table>
<div class="col-lg-4 col-lg-offset-4" id="forma">
    <form method="post" action="admin.php?page=navigation">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <button type="submit" name="add" class="btn btn-primary">Add</button>
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
                    forma += `<form method="post" action="views/adminPanel/navigationEdit.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="hidden" value="${d.id}" name="id">
        <input name="name" value="${d.name}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    </div>

    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
</form>`;
                });
                $('#forma').html(forma);
            }

        });
    });
</script>
