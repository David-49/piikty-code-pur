<?php session_start(); ?>
<?php include('BDD/PDO/connection_bdd.php'); ?>
<?php
  $erreurIns = "";
if (isset($_POST['buttonCo'])) {
    function valid_donnees($donnees)
    {
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }

    $dateNaissance = valid_donnees($_POST['dateNaissance']);
    $dateActu = date('d/m/Y');

    var_dump($dateNaissance, $dateActu);

    function age($date)
    {
        $age = date('Y') - date('Y', strtotime($date));
        if (date('md') < date('md', strtotime($date))) {
            return $age - 1;
        }
        return $age;
    }

    echo age($dateNaissance);

    // Calcule l'âge à partir d'une date de naissance jj/mm/aaaa
    // function ageNaissance($date_naissance)
    // {
    //     $am = explode('-', $date_naissance);
    //     $an = explode('/', date('Y/m/d'));
    //     if (($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0]))) {
    //         return $an[2] - $am[2];
    //     }
    //     return $an[2] - $am[2] - 1;
    // }
    //
    // echo ageNaissance($dateNaissance);
}
