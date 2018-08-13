$(function(){
  // $(".bsa-date").on('change', function(){
  //   var date_bsa = $(this).children().val();
  //   var troupeau_id = $(this).attr('id');
   var token = $('input[name=_token]').val();
  $('#ajax').on('click', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type: 'POST',
        url: '../aver/essai/ajax',
        data: {

          'nom' : 'michel'
        },

        dataType: 'JSON',

        success: function (data) {

       $('#reponse').empty();
       $('#reponse').append('mon nom est ' + data.nom);

          },
          error: function (e) {
              console.log(e.responseText);
          }
    });
  });
})
