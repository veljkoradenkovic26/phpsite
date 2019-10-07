<?php
$upit="select * from days";
$days=$conn->query($upit);
?>
<?php
$upit="SELECT *,classes.name as classesName,team.name as teamName FROM schedule INNER JOIN days on schedule.id_day = days.id INNER JOIN classes on schedule.id_classes = classes.id INNER JOIN team on schedule.id_team = team.id INNER JOIN images on classes.id_image = images.id where days.name = 'Monday'";
$schedule=$conn->query($upit);
?>
<div id="fh5co-schedule-section" class="fh5co-lightgray-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading-section text-center animate-box">
                    <h2>Class Schedule</h2>
                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="schedule">
                    <?php foreach($days as $d):?>
                    <li><a href="#" class="day" data-id="<?= $d['id']?>" data-sched="saturday"><?php echo $d['name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="row text-center">

                <div class="col-md-12 schedule-container" id="schedule">

                        <?php foreach($schedule as $s):?>
                        <div class="col-md-3 col-sm-6">
                            <div class="program program-schedule">
                                <img src="<?php echo $s['src']?>" alt="Cycling">
                                <small><?php echo $s['time']?></small>
                                <h3><?php echo $s['classesName']?></h3>
                                <span><?php echo $s['teamName']?></span>
                            </div>
                        </div>
                        <?php endforeach;?>

                    <!-- END sched-content -->


                    <!-- END sched-content -->
                </div>


            </div>
        </div>
    </div>
</div>
