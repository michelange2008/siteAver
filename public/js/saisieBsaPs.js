$(function(){
  $(".bsa-date").on('input', function(){
    var date_bsa = $(this).children().val();
    var troupeau_id = $(this).attr('id').split('_')[1];
    var route = $('#ouvreps_'+troupeau_id).attr('href');
    var bsa_id = $('#ouvreps_'+troupeau_id).attr('bsa');
    var src_icone = $('#icone_'+troupeau_id).attr('src');
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

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
          console.log(bsa_id+' - '+ data.bsa_id);
          $('#ouvreps_'+troupeau_id).attr('href', route.replace(bsa_id, data.bsa_id));
          $('#ouvreps_'+troupeau_id).attr('bsa', data.bsa_id);
          $('#ouvreps_'+troupeau_id).removeClass('lien-inactif');
          $('#icone_'+troupeau_id).attr('src', src_icone.replace('ps_carre_sans_bsa', 'ps_carre'));
          $('#icone_'+troupeau_id).attr('title', "Ajouter un protocole de soin" );
          },
        error: function (e) {
              console.log(e.responseText);
          }
    });
  });

  $('.cb').on('click', function(){
    var ps_id = $(this).attr('name');
    var troupeau_id = $('#troupeau_id').attr('name');
    var bsa_id = $('#bsa_id').attr('name');

    if($(this).is(':checked'))
    {
    $('#'+ps_id).removeClass('invisible');
    }
    else {
      $('#'+ps_id).addClass('invisible');
    }
  })
  $('.date_ps').on('input', function(){
    var ps_id = $(this).attr('id');
    var troupeau_id = $('#troupeau_id').attr('name');
    var bsa_id = $('#bsa_id').attr('name');

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
        $.alert({
            title: data.title,
            content: data.msg,
        });
        // $('#ouvreps_'+troupeau_id).attr('href', route.replace(bsa_id, data.bsa_id));
        },
      error: function (e) {
            console.log(e.responseText);
        }
    });
  })

  $('.vso-date').on('input', function(){
    var troupeau_id = $(this).attr('id').split('_')[1];


  })
})
