<?php get_header(); ?>

<?php
$picture_ID = get_field('banniere');// On récupère cette fois l'ID
$url = wp_get_attachment_image_src($picture_ID, 'post-thumbnail');
?>
<div class="cadreImage"><img src="<?php echo $url[0]; ?>" class="image-banniere">
    <div class="calque"></div>

    <div class="blocDesc">
        <h1  class="titrePageHome"><?php echo get_bloginfo('description'); ?></h1>
        <p class="descSite">Grâce à <span>PIIKTI</span>, offrez vous gratuitement
            de la visibilité sur vos créations</p>
        <a href="#" class="lienDesc">A propos de nous</a>
    </div>

</div>


<div class="blocImageAccueil">

    <?php
    $picture_ID = get_field('tendances');// On récupère cette fois l'ID
    $url = wp_get_attachment_image_src($picture_ID, 'post-thumbnail');
    ?>

    <div class="blocImagecadre"><img src="<?php echo $url[0]; ?>" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(17); ?>" class="titreImage"><?php echo get_the_title(17); ?></a>
    </div>

    <?php
    $picture_ID = get_field('produit');// On récupère cette fois l'ID
    $url = wp_get_attachment_image_src($picture_ID, 'post-thumbnail');
    ?>

    <div class="blocImagecadre"><img src="<?php echo $url[0]; ?>" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(101); ?>" class="titreImage"><?php echo get_the_title(101); ?></a>
    </div>

    <?php
    $picture_ID = get_field('createurs');// On récupère cette fois l'ID
    $url = wp_get_attachment_image_src($picture_ID, 'post-thumbnail');
    ?>

    <div class="blocImagecadre"><img src="<?php echo $url[0]; ?>" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(21); ?>" class="titreImage"><?php echo get_the_title(21); ?>S</a>
    </div>

</div>




<?php get_footer(); ?>
