$(function(){
  // si on clique sur un des boutons du menu, ça vérifie si on a modifier les cases à cocher
  $('.delete').click(function(event){
    event.preventDefault();
    var lien = $(this).attr('name');
    console.log("coucou: "+$(this).attr('name'));

          $.confirm({
              title: 'Attention !',
              content: "Voulez-vous vraiment supprimer ce protocole de soins",
              type: 'green',
              icon: 'fa fa-warning',
              theme: 'supervan',
              buttons: {
                confirmer: function () {
                  if(typeof(lien) !== 'undefined') window.location = lien;
                },
                annuler: function () {
                },

              }
          });
  })
})
