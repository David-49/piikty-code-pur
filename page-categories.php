<?php session_start(); ?>
<?php include('header.php') ?>


<div class="banniereCreateurs">
    <img src="img/banniere.jpg" class="image-banniere-createurs">
    <div class="calque"></div>

    <h1  class="titrePageCreateurs">Produits</h1>
</div>

<div class="produitCategorie">
    <div class="blocPhotoCategorie">



        <a href="page-produit.php?cat=homme" class="blocImagecadre">
            <img src="img/categorie_homme.jpg" alt="photo désignant la catégorie homme">
            <p class="titreImage">HOMME</p>
            <div class="calqueNoir"></div>

        </a>

        <a href="page-produit.php?cat=femme" class="blocImagecadre">
            <img src="img/categorie_femme.jpg" alt="photo désignant la catégorie femme">
            <p class="titreImage">FEMME</p>
            <div class="calqueNoir"></div>

        </a>

    </div>
</div>



<?php include('footer.php') ?>
