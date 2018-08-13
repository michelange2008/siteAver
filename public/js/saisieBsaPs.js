$(function(){
  // $(".bsa-date").on('change', function(){
  //   var date_bsa = $(this).children().val();
  //   var troupeau_id = $(this).attr('id');

    $('#ajax').on('change', function(e){
    e.preventDefault();
    
    var cb = $(this).children().val();
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        type: 'POST',
        url: '../aver/essai/ajax',
        data: {

          'cb' : cb
        },

        dataType: 'JSON',

        success: function (temp) {

       $('#reponse').empty();
       $('#reponse').append('mon nom est ' + temp.cb);

          },
          error: function (e) {
              console.log(e.responseText);
          }
    });
  });
})
