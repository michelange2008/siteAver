$(function() {
  $(".ball").on('click mouseover', function() {
    $(".tech-sousmenu").fadeOut(0);
    var sousmenu = "#sousmenu_"+$(this).attr('id').split('_')[1];
    $(sousmenu).fadeIn();
  });

  $("#fleche-droite").on('click', function() {
    $("#tech-menu").fadeToggle();
    var opacite = $('.tech-container-texte').css('opacity');
    var op = (opacite == 1) ? 0.5 : 1;
    $('.tech-container-texte')
    .animate({
      opacity: op,
    }, 'slow')
    .toggleClass('flou');
    $(".tech-container").toggleClass('gris');
    $("body").toggleClass('gris');

  })
  $('.fermer').on('click', function() {
    $('#fleche-droite').trigger('click');
  })
})
