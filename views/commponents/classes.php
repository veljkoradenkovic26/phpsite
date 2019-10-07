<?php
$upit="SELECT * FROM classes INNER JOIN images on classes.id_image = images.id";
$classes=$conn->query($upit);

?>
<div id="fh5co-programs-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading-section text-center animate-box">
                    <h2>Our Programs</h2>
                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <?php foreach($classes as $c):?>
            <div class="col-md-4 col-sm-6">
                <div class="program animate-box">
                    <img src="<?php echo $c['src']?>" alt="<?php echo $c['alt']?>">
                    <h3><?php echo $c['name']?></h3>
                    <p><?php echo $c['text']?> </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>