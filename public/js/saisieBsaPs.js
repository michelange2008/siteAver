$(function(){
  $(".bsa-date").on('input', function(){
    var date_bsa = $(this).children().val();
    var troupeau_id = $(this).attr('id');
    var route = $('#ouvreps_'+troupeau_id).attr('href');
    var bsa_id = $('#ouvreps_'+troupeau_id).attr('bsa');
    // $('#ajax').on('change', function(e){
    // e.preventDefault();
    //
    // var cb = ($('input[name = cb]').is(':checked')) ? 1 : 0;
    //
    // console.log(cb);
    // var nom = $('#nom').html();
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
          console.log(bsa_id+" - "+data.bsa_id);
          console.log(route);
          route.replace(bsa_id, data.bsa_id);
          console.log(route);
          // $('#ouvreps_'+troupeau_id).attr('href', "route('bsa.ps', ["+troupeau_id+", "+data.bsa_id+"])");
          },
        error: function (e) {
              console.log(e.responseText);
          }
    });
  });
})
