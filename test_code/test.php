<?php session_start(); ?>
<?php include('BDD/PDO/connection_bdd.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>


        <div class='blocProduit'>
                <div  class='blocPhotoProduit'>
                    <img src='../img/tendances.jpg' alt='photo dun produit' class='photoProduitAffichage'>
                </div>
                <div class='inFoProduit'>
                    <div class='blocNomProduit'>
                        <p>Salut comment ça va ?</p>
                    </div>
                    <div class='infotarif'>
                        <p class='prixProduit'>33 €</p>
                        <a href='page-profile.php?idCrea=".$ligne -> id_createurs."' class='createursProduit'>David Dognin</a>
                    </div>
                </div>
            </div>
    </body>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


</html>
