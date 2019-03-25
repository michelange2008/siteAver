$(function() {
  var lien_troupeau = $('#lien_troupeau').html();
  // Met le focus sur le champs de recherche au démarrage
  $('#chercher_eleveur').focus().val('');
  // Affiche en fonction de ce qui est taper dans le champs de recherche
  $('#chercher_eleveur').on('keyup', function(ev) {
    var saisie = ($.trim($(this).val()).toUpperCase());
    if(saisie.length > 2) {
      if(!saisie) {
        $('ak_liste_eleveurs').html('vide');
      } else {
          $.getJSON('antikor/recherche/'+saisie, function(data) {
              var i = 0;
              $.each(data, function(eleveur, troupeaux) {
                i++;
              })
              if(i == 0) {
                $('.ak_liste_eleveurs').html('');
              } else if(i > 1) {
                $('.ak_liste_eleveurs').html('<h3 style="text-align: center; margin: 50px 0">il y a '+i+' éleveurs</h3>');
              } else {
                $.each(data, function(eleveur, troupeaux) {
                  $('.ak_liste_eleveurs').html(
                      "<div class=fiche_eleveur>"
                      +"<h4>"+eleveur+" ("+troupeaux[0].ede+")</h4>"
                      +"</div><div class=''>"
                    );
                  var tp = ""
                  $.each(troupeaux, function(clef, troupeau) {
                    if(tp != troupeau.abbreviation) {
                      tp = troupeau.abbreviation
                      var image = "public/medias/icones/ruban/"+troupeau.abbreviation+".svg";
                      var lien = lien_troupeau+"/"+troupeau.id;
                      $('.ak_liste_eleveurs').append(
                        '<div class="ak-troupeau d-flex flex-row"><div class="ak-icone"><a href ="'+lien+'" class="espece">'
                        +'<img src = "'+image+'"></a></div>'
                        +'<div class="ak-infos d-flex flex-column justify-content-around"><p>Dernier BSA: '+troupeau.date_bsa+'</p>'
                        +'<p>VSO à faire: '+troupeau.annee_vso+'</div>'
                        +'</div>'
                      );
                    }
                  });
                  $('.ak_liste_eleveurs').append('</div>');
                });
              }
          });
        }
    } else {
      $('.ak_liste_eleveurs').html('');
    }
  })
});
