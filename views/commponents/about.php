
<?php
include ('connection.php');
$upit="SELECT *,odgovor.id as odgid FROM pitanje INNER JOIN odgovor on pitanje.id = odgovor.id_pitanja where pitanje.id = 1";
try{
    $stmt=$conn->query($upit);
    $anketa=$stmt->fetchAll();
}catch (PDOException $ex){
    echo $ex->getMessage();
}
?>
<div class="col-lg-offset-4">
    <img src="images/veljko1.jpg" width="500">
    <h4>Ja sam Veljko Radenković i rođen sam 1996. godine, u Gornjem Milanovcu.</h4>
    <h4>Zavrsio sam Ekonomsko-trgovačku školu "Knjaz Miloš".</h4>
        <h4>Živim u Beogrdu gde studiram Visoku ICT školu. Trenutno sam treca godina.</h4>
    <table id="anketa">
        <th>Koji trening vam se najvise svidja?</th>
        <?php foreach($anketa as $a):?>
            <tr><td><?php echo $a['tekst_odgovora']?></td><td><input type="radio" data-id_pitanja="<?php echo $a['id']?>" class="odgovor" value="<?php echo $a['odgid']?>" name="odgovor"></td></tr>
        <?php endforeach;?>
        <?php if(isset($_SESSION['id'])):?>
            <tr><td><input type="button" class="btn btn-primary" id="glasaj" value="glasaj"></td></tr>
        <?php else:?>
            <tr><td><?php echo "Morate se prvo ulogovati"?></td></tr>
        <?php endif;?>
    </table>
</div>


