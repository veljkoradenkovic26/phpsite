<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 5/23/2018
 * Time: 6:43 PM
 */

$upitdays="select * from days";
$days=$conn->query($upitdays);
$upitclasses="select * from classes";
$classes=$conn->query($upitclasses);
$upitteam="Select * from team";
$team=$conn->query($upitteam);
if(isset($_REQUEST['Add'])){
    $time=$_REQUEST['time'];
    $days=$_REQUEST['days'];
    $team=$_REQUEST['team'];
    $classes=$_REQUEST['classes'];
    $upit="INSERT INTO schedule(time,id_day,id_team,id_classes)values(:vreme,:id_day,:id_team,:id_classes)";
    $stmt=$conn->prepare($upit);
    $stmt->bindParam(":vreme",$time);
    $stmt->bindParam(":id_day",$days);
    $stmt->bindParam(":id_team",$team);
    $stmt->bindParam(":id_classes",$classes);
    $stmt->execute();
    
}
$upit="SELECT *,schedule.id as sId,classes.name as classesName,days.name as dayName,team.name as teamName FROM schedule INNER JOIN days on schedule.id_day = days.id INNER JOIN classes on schedule.id_classes = classes.id INNER JOIN team on schedule.id_team = team.id INNER JOIN images on classes.id_image = images.id";
$schedule=$conn->query($upit);
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Time</th>
        <th scope="col">Day</th>
        <th scope="col">Classes</th>
        <th scope="col">Team</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($schedule as $s):?>
        <tr>
            <th scope="row"><?php echo $s['sId']?></th>
            <td><?php echo $s['time']?></td>
            <td><?php echo $s['dayName']?></td>
            <td><?php echo $s['classesName']?></td>
            <td><?php echo $s['teamName']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<div class="col-lg-4 col-lg-offset-4" id="forma">
    <form method="post" action="admin.php?page=schedule">
        <div class="form-group">
            <label for="exampleInputEmail1">Time</label>
            <input name="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Time">
        </div>
        <div class="form-group">
        <select name="days">
            <?php foreach($days as $d):?>
            <option value="<?php echo $d['id'];?>"><?php echo $d['name'];?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="form-group">
            <select name="classes">
                <?php foreach($classes as $c):?>
                    <option value="<?php echo $c['id'];?>"><?php echo $c['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <select name="team">
                <?php foreach($team as $t):?>
                    <option value="<?php echo $t['id'];?>"><?php echo $t['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit" name="Add" class="btn btn-primary">Submit</button>
    </form>
