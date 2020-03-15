$(function(){
    $('#userClick').click(function() {
      $('#calqueBlanc').toggle();
      $('#myPopup').toggle(10);
    });

    $('#connexion').click(function() {
      $('#myPopup').toggle(10);
       $('#blocConnexion').toggle(10);
    });

    $('#inscription').click(function() {
      $('#myPopup').toggle(10);
      $('#blocInscription').toggle(10);
    });

    $('#closeConnect').click(function() {
        $('#calqueBlanc').toggle();
      $('#blocConnexion').toggle(10);
    });

    $('#closeInscription').click(function() {
        $('#calqueBlanc').toggle();
      $('#blocInscription').toggle(10);
    });



    // $('#boutonConnexion').click(function() {
    //
    //     $.ajax({
    //         url : 'connexion.php',
    //         type : 'POST',
    //         data : {
    //           nom : $('#mail').val(),
    //           mdp : $('#mdp').val(),
    //         },
    //         dataType : 'json',
    //         success : function(resultat){
    //
    //           if (resultat == "OK") {
    //             window.location.href='index.html';
    //             alert("Vous êtes connectés")
    //           }
    //           else {
    //             $('.formConnexion').append("<p class='phraseErreur'>Identifiant incorrect</p>");
    //             $('#mail').addClass('rougeErreur');
    //             $('#mdp').addClass('rougeErreur');
    //           }
    //         },
    //         error: function(resultat){
    //               alert(resultat)
    //             }
    //
    //     })
    //     return false;
    // });

});
