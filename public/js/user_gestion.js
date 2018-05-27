$(function(){
  $('#mdp1').focus(function(){
    $('#mdp1').attr('class', 'form-control');
    $('#mdp1').attr('placeholder', 'Retapez votre mot de passe');

  })
  $('#mdp2').blur(function(){
    if( $('#mdp1').val() != $('#mdp2').val()) {
      $('#mdp2').val("");
      $('#mdp1').val("");
      $('#mdp1').attr('placeholder', 'Les mots de passe ne concordent pas !');
      $('#mdp1').attr('class', 'form-control bg-danger text-white');
    } else {
      $('#mdp1').attr('class', 'form-control border border-success');
      $('#mdp2').attr('class', 'form-control bgborder border-success');
    }
  })
  
  $('#listeEleveurs').tablesorter({ sortList: [[0,0]]});
  
  var nom_eleveur;
  $('.nom_eleveur').each(function()
  {
    var troupeau_id = '.'+$(this).attr('id');
    if($(this).html() === nom_eleveur) {
        $(this).toggleClass('invisible');
        $(troupeau_id).toggleClass('invisible');
    }
    nom_eleveur = $(this).html();
  }) 
})
