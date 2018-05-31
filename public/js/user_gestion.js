$(function(){
  $('#mdp1').focus(function(){
    $('#mdp1').attr('class', 'form-control');
    $('#mdp1').attr('placeholder', 'Retapez votre mot de passe');

  })
  $('#mdp2').blur(function(){
    if( $('#mdp1').val() != $('#mdp2').val()) {
      $('#mdp2').val("");
      $('#mdp1').val("");
      $('#mdp1').attr('placeholder', 'Les mots de passe ne concordent pas !');
      $('#mdp1').attr('class', 'form-control bg-danger text-white');
    } else {
      $('#mdp1').attr('class', 'form-control border border-success');
      $('#mdp2').attr('class', 'form-control bgborder border-success');
    }
  })

    // Supprime les nom, email et numéros EDE des éleveurs ayant double troupeau
  function elimine_doublons()
  {
    var nom_eleveur;
    $('.nom_eleveur').each(function()
    {
    var troupeau_id = '.'+$(this).attr('id');
      if($(this).html() === nom_eleveur) {
          $(this).addClass('invisible');
        $(troupeau_id).addClass('invisible');
      }
      nom_eleveur = $(this).html();
    })
  }
  // Trie les éleveurs par ordre alphabétique
 // $('#listeEleveurs').tablesorter({ sortList: [[0,0]]});
    $('#listeEleveurs').DataTable({
        "language":
                {
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    }
},
        paging: false,
        fixedHeader: true,
        responsive: true,
            columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 },
        { responsivePriority: 3, targets: 2},
        { responsivePriority: 4, targets: -2},
        { responsivePriority: 5, targets: 3}

            ]
    });

  // Affiche les éleveurs selon l'espece
  $('.espece').on("click", function(){
      $('.invisible').each(function(){
          $(this).removeClass('invisible');
      });
      var espece = $(this).attr('id');
      $('.ligne_eleveur').each(function(){
          $(this).removeClass('non_affiche');
          if($(this).attr('name') !== espece) $(this).toggleClass('non_affiche');
      })
  })
          
  // Affiche tous les éleveurs
  $('#tous').on("click", function(){
      $('.ligne_eleveur').each(function(){
          $(this).removeClass('non_affiche');
       })
   })
})
