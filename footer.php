<footer class="footer">
    <div class="langue">
        <img src="<?php echo get_template_directory_uri(); ?>/img/france.svg"  alt="logo langue française" class="drapeau">
        <img src="<?php echo get_template_directory_uri(); ?>/img/uk.svg"  alt="logo langue française" class="drapeau">
        <img src="<?php echo get_template_directory_uri(); ?>/img/spain.svg"  alt="logo langue française" class="drapeau">
    </div>

    <div class="ligneSeparation"></div>

    <div class="moyenPaiement">
        <h3 class="titreH3">Moyens de paiement</h3>
        <p class="descMoyen">Moyens de paiement sécurisés</p>
        <div class="logoPaiement">
            <img src="<?php echo get_template_directory_uri(); ?>/img/visa1.svg" alt="Logo mode de paiement (visa)" class="paiement visa">
            <img src="<?php echo get_template_directory_uri(); ?>/img/paypal1.svg" alt="Logo mode de paiement (paypal)" class="paiement paypal">
            <img src="<?php echo get_template_directory_uri(); ?>/img/mastercard1.svg" alt="Logo mode de paiement (mastercard)" class="paiement mastercard">
        </div>
    </div>

    <div class="ligneSeparation"></div>

    <div class="moyenLivraison">
        <h3 class="titreH3">Moyen de livraison</h3>
        <p class="descMoyen">Livraison rapide</p>
        <img src="<?php echo get_template_directory_uri(); ?>/img/fedex.svg" alt="logo de moyen de livraison (Fedex)" class="logoFedex">
        <p class="descLivraison p1-descLivraison ">Qualité de service certifiée</p>
        <p class="descLivraison p2-descLivraison">Qualité des produits prouvés</p>
    </div>

    <div class="ligneSeparation"></div>

    <div class="menu-footer">
        <?php wp_nav_menu(array( 'theme_location' => 'footer',
        'container' => 'ul',
        'menu_class' => 'site__footer__menu', )); ?>
    </div>

    <div class="ligneSeparation"></div>

    <div class="moyenContact">
        <h3 class="titreH3">Contactez-nous</h3>
        <p class="descMoyen">Email, réseaux sociaux</p>
        <div class="blocMail">
            <p class="mailSite">Piikti.contact@gmail.com</p>
            <img src="<?php echo get_template_directory_uri(); ?>/img/mail.svg" class="logoMail">
        </div>
        <div class="logoRS">
            <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociaux">
            <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociaux">
            <img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.svg" alt="Logo" alt="logo réseaux sociaux" class="reseauSociaux">
        </div>

    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>
