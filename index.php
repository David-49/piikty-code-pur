<?php include('header.php') ?>


<div class="cadreImage"><img src="img/banniere_accueil.jpg">
    <div class="calque"></div>

    <div class="blocDesc">
        <h1  class="titrePageHome">Créez, publiez, ayez de la visibilité.</h1>
        <p class="descSite">Grâce à <span>PIIKTI</span>, offrez vous gratuitement
            de la visibilité sur vos créations</p>
        <a href="#" class="lienDesc">A propos de nous</a>
    </div>

</div>


<div class="blocImageAccueil">



    <div class="blocImagecadre"><img src="img/tendances.jpg" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(17); ?>" class="titreImage">tendances</a>
    </div>

    <div class="blocImagecadre"><img src="img/produit.jpg" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(101); ?>" class="titreImage">Produits</a>
    </div>

    <div class="blocImagecadre"><img src="img/createurs.jpg" alt=""><div class="calqueNoir"></div>
    <a href="<?php echo get_permalink(21); ?>" class="titreImage">Les créateurs</a>
    </div>

</div>




<?php include('footer.php') ?>
