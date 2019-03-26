$(function() {
  $('.modifie').on('click', function() {
    var note_id = $(this).attr('id').split('_')[1];
    var troupeau_id = $('.troupeau_id').attr('id');
    var cellule_modifier = $('table #ligne_'+note_id).find('td').eq(2);
    var modifier = $('table #ligne_'+note_id).find('td').eq(2).html().replace('modifie.svg', 'modifie_gris.svg');
    var cellule_texte = $('table #ligne_'+note_id).find('td').eq(1);
    $.confirm({
      type: 'green',
      theme: 'dark',
      title: 'Modifier la note',
      columnClass : 'col-sm-10 col-md-8 col-xl-6',
      content: function () {
          var self = this;
          return $.ajax({
              url: '../../../../aver/troupeau/note/'+note_id,
              dataType: 'json',
              method: 'get'
          }).done(function (response) {
              self.setContent('' +
              '<form action="" class="formName">' +
              '<div class="form-group">' +
              '<label>Ecrire ici:</label>' +
              '<input type="textarea" placeholder="remarque" class="name form-control" value="'+response.texte+'" required />' +
              '</div>' +
              '</form>');
          }).fail(function(){
              self.setContent('Something went wrong.');
          });
      },
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
                    url: '../../../../aver/troupeau/note/modifie',
                    data: {
                      'note_id' : note_id,
                      'texte' : note,
                    },
                    dataType: 'JSON',
                    success: function (data) {
                      console.log(data.title);
                      cellule_texte.html(note);
                      cellule_modifier.html(modifier);
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
  });

  $('.supprime').on('click', function() {
    var nb_notes = $('#notes tr').length - 1;
    console.log(nb_notes);
    var note_id = $(this).attr('id').split('_')[1];
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $.ajax({
      type: 'GET',
      url: '../../../../aver/troupeau/note/supprime/'+note_id,
      data: {
        'note_id' : note_id,
      },
      dataType: 'JSON',
      success: function () {
        $('#ligne_'+note_id).remove();

        if($('#notes tr').length - 1 == 0){
          $('.ajouter_note').removeClass('invisible');
        }

      },
      error: function (e) {
            console.log(e.responseText);
      }
    });

  });

  $('.ajoute').on('click', function() {
    var troupeau_id = $('.troupeau_id').attr('id');
    var modifier ='<img id="modifie_21" class="pdf_ps curseur modifie" src="http://localhost/siteAver/public/medias/icones/modifie.svg" alt="Modifier">';
    var supprimer ='<img id="supprime_21" class="pdf_ps curseur supprime" src="http://localhost/siteAver/public/medias/icones/moins.svg" alt="SUpprimer">';
    $.confirm({
      type: 'green',
      theme: 'dark',
      title: 'Ajouter une note',
      columnClass : 'col-sm-10 col-md-8 col-xl-6',
      content: '' +
      '<form action="" class="formName">' +
      '<div class="form-group">' +
      '<label>Ecrire ici:</label>' +
      '<input type="textarea" placeholder="remarque" class="name form-control" required />' +
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
                    url: '../../../../aver/visites/bsa/ajoutNote',
                    data: {
                      'troupeau_id' : troupeau_id,
                      'note' : note,
                    },
                    dataType: 'JSON',
                    success: function (data) {
                      $('.ajouter_note').addClass('invisible');
                      var options = { year: 'numeric', month: 'long', day: 'numeric' };
                      var date = new Date();
                      console.log(date);
                      $('table').append('<tr><td>'+
                        date.toLocaleDateString('fr-FR', options)+
                        '</td><td>'+
                        data.texte+
                        '</td><td>'+
                        modifier.replace(new RegExp('[0-9]+', 'gm'), data.note_id)+
                        '</td><td>'+
                        supprimer.replace(new RegExp('[0-9]+', 'gm'), data.note_id).replace('moins', 'moins_gris')+
                        '</td></tr>')
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
  });

})
