$(function () {
  $('#inputvelees').on('change', function() {
    $('#vachevelees').html("<strong>"+$(this).val() + " vaches vélées en 1 an</strong>")
    $(this).val("")
  })
  $('.alertes').on('change', function() {
    var alerte_id = $(this).attr('id');
    console.log(alerte_id);
  })
})
