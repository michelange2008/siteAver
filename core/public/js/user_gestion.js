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
      $('#avertissement').addClass('non_affiche');
      $('.ligne_eleveur').each(function(){
          $(this).removeClass('non_affiche');
       })
   })

   // Par défaut au démarrage les anciennes prophylos et vso ne sont pas modifiables
   $(function(){
       modification = false;
       desactiveCase();
   })
   // Permet de basculer les anciennes prophylo et vso de madifiable à pas modifiable et vice versa
    $('#bascule').on("click", function(){
       if($(this).attr('name') === 'desactive'){
           activeCase();
       }
       else{
           desactiveCase();
       }
   });

    // Rend les prophylos et vso non modifiables
   function desactiveCase(){
       var num_dern_col = $('#titres').children().length;
       $('.colonne').each(function(){
           if($(this).attr('class') !==  $(this).parent().children().last().attr('class')) {
               $(this).children('input').attr('disabled', 'true');
           }
       })
       $('#bascule').removeClass('btn-outline-danger');
       $('#bascule').attr('name', 'desactive');
       $('#bascule').addClass('btn-outline-info');
       $('#estInactive').children().attr('value', 0);
   }
   //Rend les prophylos
    function activeCase(){
       $('.colonne').each(function(){
               $(this).children('input').removeAttr('disabled');
       });
       $('#bascule').addClass('btn-outline-danger');
       $('#bascule').removeAttr('name', 'desactive');
       $('#bascule').removeClass('btn-outline-info');
       $('#estInactive').children().attr('value', 1);
   }

    // Si on clique sur une case à cocher le bouton de maj s'active
    $(':checkbox').on('click', function(){
           $('#maj').removeAttr('disabled').removeClass('btn-secondary').addClass('btn-success');
           modification = true;
    });
    // si on clique sur enregistrer ça passe modification à false
    $('#maj').on('click', function(){
        modification = false;
    });
    // si on clique sur un des boutons du menu, ça vérifie si on a modifier les cases à cocher
    $('.btn-alert').on('click', function(e){
        var lien = $(this).attr('href');
        e.preventDefault();
        if(modification){
            $.alert({
                title: 'Attention !',
                content: "Il faut d'abord enregistrer les modifications ?",
                type: 'green',
                icon: 'fa fa-warning',
                theme: 'supervan',
                autoClose: 'enregistrer|4000',
            });
        } else {
            if(typeof(lien) !== 'undefined') window.location = lien;
        }
    })

    // Affichage par groupe dans VSO
    $('.icone_espece').on('click', function(){
        var groupe = $(this).attr('id');
        if(groupe !== 'TS')
        {
            $('tbody').children().each(function(){
                $(this).removeClass('non_affiche');
                if($(this).attr('name') !== groupe)
                {
                    $(this).addClass('non_affiche');
                }
            })
        }else{
            $('tbody').children().removeClass('non_affiche');
        }
    })
// PAGE LISTE ELEVEURS ///////////////////////////////////////////////
      // Affiche les éleveurs dont on n'est pas vet San
      $('#eleveurs_non_vét_san').on('click', function(){
        $('#avertissement').removeClass('non_affiche');
        $('.vetsan').each(function(){
          $(this).parent().removeClass('non_affiche');
          if($(this).attr('name') == 1){
            $(this).parent().toggleClass('non_affiche');
          }
        })
      })
      // Affiche les éleveurs dont on doit faire la prophylo
      $('#prophylo').on('click', function(){
        $('#avertissement').removeClass('non_affiche');
        $('.prophylo').each(function(){
          $(this).parent().removeClass('non_affiche');
          if($(this).children().attr('name')!= 1){
            $(this).parent().toggleClass('non_affiche');
          }
        })
      })
      //  Affiche les vso à faire
      $('#vso').on('click', function(){
          $('#avertissement').removeClass('non_affiche');
          $('.vso').each(function(){
            $(this).parent().removeClass('non_affiche');
            if($(this).children().attr('name')!= 1){
              $(this).parent().toggleClass('non_affiche');
            }
          })
      })
      //  Affiche les BSA importants à faire
      $('#bsa_important').on('click', function(){
        console.log('toto');
          $('#avertissement').removeClass('non_affiche');
          $('.bsaimportant').each(function(){
            $(this).parent().removeClass('non_affiche');
            if($(this).attr('name')!= 1){
              $(this).parent().toggleClass('non_affiche');
            }
          })
      })
      //  Affiche les BSA non faits
      $('#bsa_non_faits').on('click', function(){
          $('#avertissement').removeClass('non_affiche');
          $('.bsa-date').each(function(){
            $(this).parent().removeClass('non_affiche');
            if(!$(this).hasClass('bsa-absent')){
              $(this).parent().toggleClass('non_affiche');
            }
          })
      })
      //  Affiche les BSA en retard
      $('#bsa_en_retard').on('click', function(){
          $('#avertissement').removeClass('non_affiche');
          $('.bsa-date').each(function(){
            $(this).parent().removeClass('non_affiche');
            if(!$(this).hasClass('bsa-retard')){
              $(this).parent().toggleClass('non_affiche');
            }
          })
      })
      //  Affiche les BSA faits
      $('#bsa_faits').on('click', function(){
          $('#avertissement').removeClass('non_affiche');
          $('.bsa-date').each(function(){
            $(this).parent().removeClass('non_affiche');
            if(!$(this).hasClass('bsa-ok')){
              $(this).parent().toggleClass('non_affiche');
            }
          })
      })

      $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
      }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
      });
})
