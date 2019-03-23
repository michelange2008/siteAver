$(function(){
  // Chargement du preloader avec l'envoi des Mails
  $(".envoi").on('click' , function() {
    $('.loader').toggleClass('invisible');
  })
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // Met le focus sur le champs de recherche au démarrage
  $('#chercher').focus().val('');
  // Affiche en fonction de ce qui est taper dans le champs de recherche
  $('#chercher').on('bind keyup', function(ev) {
    var saisie = ($.trim($(this).val()));
    if(saisie.length > 2) {
      if(!saisie) {
        $('ul>li').show();
      } else {
        $('li').each(function() {
          if($(this).attr('class') == 'ligne' && $(this).attr('id').toLowerCase().indexOf(saisie) == -1) {
              $(this).hide();
          }
        })
      }
    } else {
      $('ul>li').show();
    }
  });
  //////////////////////////////////////////////////////////////////////////
  //Gère la saisie d'une date
  $('.bsaok').on('click', function() {
    var troupeau_id = $(this).attr('id').split('_')[1]; // récupère le numéro de troupeau
    var date_bsa = $('#dateetps_'+troupeau_id).children().val(); // récupère la date saisie
    var icone = $('#icone_'+troupeau_id).attr('src');

    //Vérification que la date est bonne
    if(date_bsa == "") {
      $.alert({
        title: "Attention",
        content: "Vous devez saisir une date valide",
        type: 'red',
      });
      $('#dateetps_'+troupeau_id).focus();
    }
    // Si la date est bonne ...
    else {
      $.ajax({
        type: 'POST',
        url: '../../../aver/visites/bsa/store',
        data: {
          'date_bsa' : date_bsa,
          'troupeau_id' : troupeau_id
        },
        dataType: 'JSON',
        success: function (data) {
          $.alert({
              title: data.title,
              content: data.msg,
          });
          $('#icone_'+troupeau_id).attr('bsa', data.bsa_id).toggleClass('curseur').attr('src', icone.replace('ps_carre_sans_bsa', 'ps_carre'));
          // On modifie le href de l'icone des ps pour pouvoir avoir une redirection en cliquant sur cette icone
          $('#icone_'+troupeau_id).attr('href', $('#icone_'+troupeau_id).attr('href').replace('/0', '/'+data.bsa_id));
          },
        error: function (e) {
              console.log(e.responseText);
          }
      });
    }
  });
  $('.icone_ps').on('click', function() {
    if($(this).attr('bsa') != "")
    {
      window.location.href = $(this).attr('href');
    }

  });
  //////////////////////////////////////////////////////////////////////
  // GERE L AJOUT OU LA SUPPRESSION D UN PROTOCOLE DE SOIN
  $('.cb').on('click', function(){
    var ps_id = $(this).attr('ps');
    var bsa_id = $(this).attr('bsa');
    var cb = $(this).attr('id');
    var icone = $(this).attr('src');
    // Ajout d'un protocole de soin
    if($(this).attr('etat') == 'absent')
    {
      ajoutePs(bsa_id, ps_id);
      $('#cb_'+ps_id).attr('src', icone.replace('plus', 'moins'));
    }
    // Suppression d'un protocole de soin
    else {
      $.confirm({
        theme: 'dark',
        title : "attention",
        content: "vous voulez supprimer un protocole de soin ?",
        type: 'red',
        buttons: {
          oui: function () {
              $('#ps_date_bsa_'+ps_id).html(''); // rend invisible le champ date
              $('#envoi_ps_'+ps_id).toggleClass('invisible'); //applique le nouveau nom de l'icone
              $('#cb_'+ps_id).attr('src', icone.replace('moins', 'plus'));
              supprime_ps(bsa_id, ps_id); // methode ajax pour supprimer l'association dans la bdd

          },
          non: function () {
              $('#'+cb).prop('checked', true);
          }
        }
      });
    }
  })

  function ajoutePs(bsa_id, ps_id) {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $.ajax({
      type: 'POST',
      url: '../../../../../aver/visites/bsa/attribuePs',
      data: {
        'ps_id' : ps_id,
        'bsa_id' : bsa_id,

      },
      dataType: 'JSON',
      success: function (data) {
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var date = new Date(data.bsa_date).toLocaleDateString('fr-FR', options);
        $('#ps_date_bsa_'+ps_id).html('<p>'+date+'</p>');
        $('#envoi_ps_'+ps_id).toggleClass('invisible');
        $('#cb_'+ps_id).attr('etat', 'present');
      },
      error: function (e) {
            console.log(e.responseText);
      }
    });
  }

  $('.vso-date').on('input', function(){
    var troupeau_id = $(this).attr('id').split('_')[1];
  });

  function supprime_ps(bsa_id, ps_id) {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
      type: 'POST',
      url: '../../../../../aver/visites/bsa/enlevePs',
      data: {
        'ps_id' : ps_id,
        'bsa_id' : bsa_id,

      },
      dataType: 'JSON',
      success: function (data) {
        $('#cb_'+ps_id).attr('etat', 'absent');
        },
      error: function (e) {
            console.log(e.responseText);
        }
    });
  }
// Effacer un bsa particulier (page aver/troupeau/bsa et vue fichiers/bsa)
  $(".delete_bsa").on('click', function() {
    var bsa_id = $(this).attr('id').split('_')[1];
    $.confirm({
      theme: 'dark',
      title : "attention",
      content: "vous voulez supprimer un bilan sanitaire ?",
      type: 'red',
      buttons: {
        oui: function () {
            supprime_bsa(bsa_id); // methode ajax pour supprimer l'association dans la bdd

        },
        non: function () {
        }
      }
    });
  });

  function supprime_bsa(bsa_id) {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
      type: 'POST',
      url: '../../../../aver/visites/bsa/enleveBsa',
      data: {
        'bsa_id' : bsa_id,

      },
      dataType: 'JSON',
      success: function (data) {
        $('#carte_'+data.msg).fadeToggle();
      },
      error: function (e) {
            console.log(e.responseText);
      }
    });
  }
  $('.vsook').on('click', function() {
    var troupeau_id = $(this).attr('id').split('_')[1];
    var date_vso = $('#vso_'+troupeau_id).children().val();

    $.ajax({
      type: 'POST',
      url: '../../../aver/visites/vso/store',
      data: {
        'troupeau_id' : troupeau_id,
        'date_vso' : date_vso
      },
      dataType: 'JSON',
      success: function (data) {
        $.alert({
          theme: 'dark',
          title : "Génial",
          content: "vous avez ajouté une nouvelle visite",
          type: 'green',
        })
      },
      error: function (e) {
            console.log(e.responseText);
      }
    });
  })

  ////////////////////////////////////////////////////////////////////
  // Saisie d'une note
  $('.icone-remarque').on('click', function() {
    var troupeau_id = $(this).attr('id').split('_')[1];

    $.confirm({
    title: 'Ajouter une note',
    columnClass : 'col-sm-10 col-md-8 col-xl-6',
    content: '' +
    '<form action="" class="formName">' +
    '<div class="form-group">' +
    '<label>Ecrire ici:</label>' +
    '<input type="text" placeholder="remarque" class="name form-control" required />' +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Enregistrer',
            btnClass: 'btn-blue',
            action: function () {
                var note = this.$content.find('.name').val();
                if(!note){
                    $.alert('vous voulez annuler ?');
                    return true;
                }
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                $.ajax({
                  type: 'POST',
                  url: '../../../aver/visites/bsa/ajoutNote',
                  data: {
                    'troupeau_id' : troupeau_id,
                    'note' : note,
                  },
                  dataType: 'JSON',
                  success: function (data) {
                    console.log(data.title);
                    },
                  error: function (e) {
                        console.log(e.responseText);
                    }
                });
            }
        },
        cancel: function () {
            //close
        },
    },
    onContentReady: function () {
        // bind to events
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
        });
    }
});
  })
})
