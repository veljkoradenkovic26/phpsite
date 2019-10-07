<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/23/2018
 * Time: 6:14 PM
 */
$upit="select  *,users.id as uId from users INNER JOIN roles on users.id_role = roles.id";
$users=$conn->query($upit);
if(isset($_REQUEST['submit'])){
    $fname=$_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $role=$_REQUEST['role'];
$stmt = $conn->prepare ("INSERT INTO users (first_name, last_name,email,password,id_role) VALUES (:fname, :lname,:email,:password,:id_role)");
$stmt -> bindParam(':fname', $fname);
$stmt -> bindParam(':lname', $lname);
$stmt -> bindParam(':email', $email);
$stmt -> bindParam(':password', $password);
$stmt -> bindParam(':id_role', $role);
try {
    $stmt->execute();
    header("Location:".$_SERVER['HTTP_REFERER']);
}catch(PDOException $ex){
    echo $ex->getMessage();
}
}
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Role</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $u):?>
    <tr>
        <th scope="row"><?php echo $u['uId']?></th>
        <td><?php echo $u['first_name']?></td>
        <td><?php echo $u['last_name']?></td>
        <td><?php echo $u['email']?></td>
        <td><?php echo $u['password']?></td>
        <td><?php echo $u['name']?></td>
        <td><a href="#" class="users" data-table="users" data-id="<?php echo $u['uId']?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $u['uId']?>&&table=users">Delete</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<div class="col-lg-4 col-lg-offset-4" id="forma">
<form method="post" action="admin.php?page=users">
    <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label form="ExampleInputRole">Role</label>
        <select name="role">
            <option value="1">Admin</option>
            <option value="2">User</option>
        </select>
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
                    forma += `<form method="post" action="views/adminPanel/usersEdit.php">
    <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="hidden" name="id" value="${d.id}">
        <input name="fname" value="${d.first_name}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input name="lname" value="${d.last_name}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" value="${d.email}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label form="ExampleInputRole">Role</label>
        <select name="role">
            <option value="0">Izaberite</option>
            <option value="1">Admin</option>
            <option value="2">User</option>
        </select>
    </div>
    <button type="submit" name="Edit" class="btn btn-primary">Edit</button>
</form>`
               });
               $('#forma').html(forma);
           }
       });
    });
</script>