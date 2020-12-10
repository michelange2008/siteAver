var visite = 22.88;
var deplacement = 8.55;
var ps_bv = 2.39 + 0.12 + 0.12;
var ps_pr_025 = 1.32 + 0.12 + 0.12;
var ps_pr_26 = ps_pr_025 - 0.10;
var ps_pc = 2.13;
var colis = 4.95;

$("#nombre").on('click', function() {

  $(this).val('');

  $(".prix").empty();

  $('.espece').removeClass('assombri').addClass('noiretblanc');

})

$(".espece").on('click', function() {

  if($("#nombre").val() !== '') {

    var id = $(this).attr('id');

    $('.espece').removeClass('assombri').addClass('noiretblanc');

    $(this).addClass('assombri').removeClass('noiretblanc');

    var nombre = $("#nombre").val();

    $(".prix").empty();

    $("#ht").append( ht(calcul(nombre, id)) );

    $("#tva").append( tva( calcul(nombre, id) ) );

    $("#ttc").append( ttc( calcul(nombre, id)) );

  }

})


function calcul(nombre, espece_id) {

  var calcul = 10;

  if (espece_id == "bv") {

    calcul = visite + deplacement + nombre * (ps_bv) + colis;

  } else if (espece_id == "pr") {

    if(nombre > 25) {

      calcul = visite + deplacement + 25 * ps_pr_025 + (nombre-25) * ps_pr_26 + colis;

    } else {

      calcul = visite + deplacement + nombre * ps_pr_025 + colis;

    }


  } else {

    calcul = visite + deplacement + nombre * (ps_pc) + colis;

  }

  return calcul;

}

function ht(calcul) {

   return calcul.toFixed(2);

}

function tva(calcul) {

   return (Math.round(calcul * 0.2*100)/100).toFixed(2);

}

function ttc(calcul) {

  return (Math.round(calcul * 1.2*100)/100).toFixed(2);

}
