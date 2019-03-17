$(function() {
  // validation de l'email
  $('#validEmailOk').on('click', function(e) {
  var sEmail = $('#email').val();
  // Checking Empty Fields
  if ($.trim(sEmail).length == 0) {
  alerte("N'oubliez-pas d'indiquer l'adresse mail !");
  e.preventDefault();
  }
  else if(!validateEmail(sEmail)){
  alerte("Désolé, mais l'adresse mail n'est pas valide");
  e.preventDefault();
  }
  else {
    // alerte('Super !! on peut continuer');
  }
  });
  // Function that validates email address through a regular expression.
  function validateEmail(sEmail) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (regex.test(sEmail)) {
    return true;
    }
    else {
    return false;
    }
  }
  function alerte(texte) {
    $.alert({
      title: 'Attention !',
      content: texte,
      type: 'red',
    });

  }
})
