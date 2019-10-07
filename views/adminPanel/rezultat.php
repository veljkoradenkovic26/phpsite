<?php
/**
 * Created by PhpStorm.
 * User: Luke
 * Date: 6/12/2018
 * Time: 2:59 AM
 */
$upit="Select * from rezultat";
$rezultat=$conn->query($upit);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">id_odgovor</th>
        <th scope="col">id_user</th>
        <th scope="col">id_pitanja</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rezultat as $r):?>
        <tr>
            <th scope="row"><?php echo $r['id']?></th>
            <td><?php echo $r['id_odgovor']?></td>
            <td><?php echo $r['id_user']?></td>
            <td><?php echo $r['id_pitanja']?></td>
            <td><a href="delete.php?id=<?php echo $r['id']?>&&table=rezultat">Delete</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>