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


    //Personnalisation pour la page paramètre
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader1 = new FileReader();

            reader1.onload = function (e) {
                $('#img').attr('src', e.target.result);
            }

            reader1.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInpt").change(function(){
        readURL1(this);
    });

    //Personnalisation pour la page ajout produit
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photoProduit').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInptProduit").change(function(){
        readURL(this);
    });

    //Personnalisation pour la page paramètre
    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".input-file" ),
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");

    if (button) {
        button.addEventListener( "keydown", function( event ) {
            if ( event.keyCode == 13 || event.keyCode == 32 ) {
                fileInput.focus();
            }
        });
        button.addEventListener( "click", function( event ) {
            fileInput.focus();
            return false;
        });
    }


    //Personnalisation pour la page ajout produit
    document.querySelector("html").classList.add('js');

    var fileInput  = document.querySelector( ".inputProduitPhoto" ),
        button     = document.querySelector( ".labelProduitPhoto" ),
        the_return = document.querySelector(".file-return");

    if (button) {
        button.addEventListener( "keydown", function( event ) {
            if ( event.keyCode == 13 || event.keyCode == 32 ) {
                fileInput.focus();
            }
        });
        button.addEventListener( "click", function( event ) {
            fileInput.focus();
            return false;
        });
    }

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
