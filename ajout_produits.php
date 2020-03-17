<?php include('header.php') ?>

<div class="containerAjoutProduit">
    <h1 class="titreAjoutProduit"><?php echo strtoupper('partager') ?></h1>

    <form class="formAjoutProduit"  method="post">

    <div class="blocGaucheProduit">

        <div class="blocChoixProduit">
            <label for="nom-produit">Nom du produit</label>
            <input type="text" name="nomProduit">
        </div>

        <div class="blocChoixProduit">
            <label for="desc-produit">Description du produit</label>
            <textarea name="descProduit" rows="8" cols="80"></textarea>
        </div>

        <div class="blocChoixProduit">
            <label for="prix-produit">Prix (€)</label>
            <input type="number" name="prixProduit">
        </div>

        <button type="submit" name="buttonProduit" class="boutonProduit"><?php echo strtoupper('publier') ?></button>
    </div>

    <div class="separationVetical"></div>

    <div class="blocDroitProduit">
        <div class="blocChoixProduit  blocCat">
            <label for="cat-produit">Catégorie</label>
            <select class="" name="catProduit">
                <option value="manteaux_blousons">Manteaux/Blousons</option>
                <option value="chemises">Chemises</option>
                <option value="pulls">T-shirts</option>
                <option value="t_shirts">Pantalons</option>
                <option value="">Accessoires</option>
            </select>
        </div>

        <div class="blocChoixProduit blocTailleProduit">
            <label for="taille-produit">Taille</label>
            <div class="blocRadio">
                <p class="containerRadio">
                    <input type="checkbox" name="tailleS" value="" class="radioTaille radioS"/>
                    <label for="taille-S" class="labelRadio label-S"></label>
                </p>
                <!-- <p class="containerRadio">
                    <input type="radio" name="tailleM" value="" class="radioTaille radioM"/>
                    <label for="taille-M" class="labelRadio label-M">Taille M</label>
                </p>
                <p class="containerRadio">
                    <input type="radio" name="tailleL" value="" class="radioTaille radioL"/>
                    <label for="taille-L" class="labelRadio label-L">Taille L</label>
                </p> -->
            </div>
        </div>
    </div>



    </form>
</div>



<?php include('footer.php') ?>
