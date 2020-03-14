<?php
/*
    Template name: Profil
*/
?>

<?php get_header(); ?>

<?php

if (!empty($_GET['user_id'])) {
    $get_id = htmlspecialchars($_GET['user_id']);

    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query(array(
        'role' => 'Créateurs',
        'orderby' => 'display_name'
    ));

    // Get the results
    $createurs = $wp_user_query->get_results();

    // Looping createurs
    if (!empty($createurs)) {
        $user_info = get_userdata($get_id); ?>
        <div class='cadreProfil'>
            <div class='cadrePhotoProfil'>
        <?php
        mt_profile_img(
            $get_id,
            array(
                'size' => 'large',
                'attr' => array( 'alt' => 'photo de profil des créateurs', 'class' => 'photoCreateursProfil' ),
                'echo' => true,
            )
        ); ?>
            </div>
            <div class="blocRouge">
                <div class='blocinfoCreateursProfil'>

                    <p class='nomCreateursProfil'><?php echo $user_info->first_name." ".strtoupper($user_info->last_name); ?></p>

                    <p class='ageCreateursProfil'><?php echo $user_info->age; ?> ans</p>
                    <p class="nbProduitCreateur">4 création(s) mises en ligne</p>
                    <p class="emailCreateur"><?php echo $user_info->user_email; ?></p>
                    <div class="logoRSProfil">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociauxProfil">
                    </div>
                </div>
            </div>

            <div class="blocDescription">
                <p class="descProfil"><?php echo $user_info->description; ?></p>
            </div>

        </div>


<div class="mesProduits">
    <h2 class="titreProduit">Mes Produits</h2>
</div>

<div class="espaceCommentaire">
    <h2 class="titreEspaceCom">Laisser un commentaire à <?php echo  $user_info->first_name." ".strtoupper($user_info->last_name); ?> ?</h2>
    <?php get_template_part('comments') ?>
</div>

<?php
//on ferme les conditions ouverte en début de page
    }
}
?>


<?php get_footer(); ?>
