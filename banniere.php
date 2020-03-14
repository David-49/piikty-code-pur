<?php
$picture_ID = get_field('banniere');// On récupère cette fois l'ID
$url = wp_get_attachment_image_src($picture_ID, 'post-thumbnail');
?>

<div class="banniereCreateurs"><img src="<?php echo $url[0]; ?>" class="image-banniere-createurs">
    <div class="calque"></div>

    <h1  class="titrePageCreateurs"><?php the_title(); ?></h1>

</div>
