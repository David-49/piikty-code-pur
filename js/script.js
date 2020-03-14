jQuery(function(){
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

    // $('#calqueBlanc').click(function() {
    //   $('#myPopup').toggle(10);
    //   $('#calqueBlanc').toggle(10);
    // });

});
