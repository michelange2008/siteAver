$(function() {
  $("#fleche-droite").on('click', function() {
    $("#para-menu").fadeToggle();
    var opacite = $('.para-container-texte').css('opacity');
    var op = (opacite == 1) ? 0.5 : 1;
    $('.para-container-texte')
    .animate({
      opacity: op,
    }, 'slow')
    .toggleClass('flou');
    $(".para-container").toggleClass('gris');
  })
  $('.fermer').on('click', function() {
    $('#fleche-droite').trigger('click');
  })
})
