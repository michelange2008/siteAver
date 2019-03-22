$(function() {
  $('.modifie').on('click', function() {
    var note_id = $(this).attr('id').split('_')[1];
    var troupeau_id = $('.troupeau_id').attr('id');
    $.confirm({
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
                  url: '../../../../aver/visites/bsa/ajoutNote',
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
  });

  $('.supprime').on('click', function() {
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
        $('#ligne_'+note_id).fadeToggle();
      },
      error: function (e) {
            console.log(e.responseText);
      }
    });

  });
  $('.ajoute').on('click', function() {
    var troupeau_id = $('.troupeau_id').attr('id');
    var modifier =($('table tr').find('td').eq(2).html());
    var supprimer =($('table tr').find('td').eq(3).html());
    $.confirm({
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
                    console.log(data.note_id);
                    supprimer.replace(new RegExp('[0-9]+', 'gm'), data.note_id);
                    modifier.replace(new RegExp('[0-9]+', 'gm'), data.note_id);
                    var date = new Date();
                    $('table').append('<tr><td>'+
                      data.date+
                      '</td><td>'+
                      data.texte+
                      '</td><td>'+
                      modifier+
                      '</td><td>'+
                      supprimer+
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
