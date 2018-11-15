$(function() {
  // Permet de permuter les préparations au cas par cas
  $('.preparation').on('click', function() {
    var num = $(this).attr('id').split('_')[1];
    var cb = "#cb_"+num;
    $(cb).val(Math.abs($(cb).val() - 1)); // Passe les cases cochée à la valeur 0 si elles valent 1 et vice-versa
    $(this).toggleClass('preparation-oui');
    $(this).toggleClass('preparation-non');

  })
  // Permet passer toutes les préparations en mode à faire et case à cocher 1
  function afficheTout()
  {
    $('.preparation').each(function() {
      $(this).removeClass('preparation-non');
      $(this).addClass('preparation-oui');
      var num = $(this).attr('id').split('_')[1];
      var cb = "#cb_"+num;
      $(cb).val(1); // Passe les cases cochée à la valeur 1

    });
  }
  // Toutes les préparations sont à faire
  $('#tous').on('click', function() {
    afficheTout();
  });
  // Déselectionner toutes les Préparations
  $('#aucune').on('click', function() {
    $('.preparation').each(function() {
      $(this).addClass('preparation-non');
      $(this).removeClass('preparation-oui');
      var num = $(this).attr('id').split('_')[1];
      var cb = "#cb_"+num;
      $(cb).val(0); // Passe les cases cochée à la valeur 0

    });

  });
  // Préparations selon le choix de la formation
  $('.choix').on('click',function() {
    afficheTout();
    var nom_id = $(this).attr('id');
    $('.preparation').each(function() {
      if($(this).attr('class').indexOf(nom_id) === -1)
      {
        $(this).addClass('preparation-non');
        $(this).removeClass('preparation-oui');
        var num = $(this).attr('id').split('_')[1];
        var cb = "#cb_"+num;
        console.log(cb);
        $(cb).val(0); // Passe les cases à la valeur 0
      }
      else {
        var num = $(this).attr('id').split('_')[1];
        var cb = "#cb_"+num;
        $(cb).val(1); // Passe les cases à la valeur 1
      }

    })
  });

  $('.produit-a-preparer').on('click', function() {
    $(this).toggleClass('produit-fait');
  })

})
