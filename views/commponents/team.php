<?php
$upit="SELECT * FROM team INNER JOIN images on team.id_image = images.id limit 3 ";
$team=$conn->query($upit);
$broj=$conn->query("SELECT * FROM team");
$broj=$broj->rowCount()/3;
$broj=ceil($broj);
echo $broj;
?>
<div id="fh5co-team-section" class="fh5co-lightgray-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading-section text-center animate-box">
                    <h2>Meet Our Trainers</h2>
                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="team" id="team">
        <?php foreach($team as $t):?>
            <div class="col-md-4 col-sm-6">
                <div class="team-section-grid animate-box" style="background-image: url('<?php echo $t['src'];?>');">
                    <div class="overlay-section">
                        <div class="desc">
                            <h3><?php echo $t['name']?></h3>
                            <span><?php echo $t['type']?></span>
                            <p><?php echo $t['text']?></p>
                            <p class="fh5co-social-icons">
                                <a href="#"><i class="icon-twitter-with-circle"></i></a>
                                <a href="#"><i class="icon-facebook-with-circle"></i></a>
                                <a href="#"><i class="icon-instagram-with-circle"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            </div>
            <ul class="pagination modal-2 col-lg-offset-6">
                <?php for($i=1;$i<=$broj;$i++):?>
                    <li class="paginacija" data-broj="<?php echo $i?>"> <a href="#"><?php echo $i?></a></li>
                <?php endfor;?>
            </ul><br>
        </div>
    </div>

</div>
