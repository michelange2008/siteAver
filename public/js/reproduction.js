var longueur = document.getElementById('ligne').offsetWidth-5;
var jour = longueur/40;

var play = document.querySelector("#play");
var pause = document.querySelector("#pause");
var resume = document.querySelector("#resume");
var reverse = document.querySelector("#reverse");
var restart = document.querySelector("#restart");

TweenLite.set("#speed", {transformOrigin:"50% 100%"});
Draggable.create("#speed", {
  type: "rotation",
  throwProps: true,
  bounds: {
			minRotation: -90,
			maxRotation: 90,
		},
  onDrag: function() {
    var vitesse = Math.sin(this.rotation*Math.PI/180)+2;
    tl.timeScale(vitesse);
  }
})
TweenLite.set("#position", {transformOrigin:"50% 50%"});
var situation = 0;
var neopostion = 0;
Draggable.create("#position", {
  type: "rotation",
  throwProps: true,
  onDrag: function() {
    if(tl.progress() == 1) {
      neoposition = Math.round(this.rotation-situation)/500;
    } else {
      neoposition = tl.progress()+Math.round(this.rotation-situation)/500;
    }
    tl.progress(neoposition);
    situation = this.rotation;
  }
})

var fol = "#fol-dominant";

var tl = new TimelineMax(
  {onUpdate: function () {
    var compteur = document.getElementById("jours");
    compteur.innerHTML = Math.round(40 * tl.progress());
  }},
  {onComplete: function() {tl.restart(); tl.pause();}}
);
tl.pause();
tl.to("#marque", 40, {x:longueur, ease:"Linear.easeOut"})
  .addLabel("depart", 0).addLabel("fol1", 4).addLabel("fol2", 10).addLabel("grossfol",16).addLabel("folgris", 18).addLabel("cache", 20).addLabel("piclh",20).addLabel("ovulation", 21)
  .addLabel("fincache", 22).addLabel("cj", 22).addLabel("fincj", 28).addLabel("fsh", 0).addLabel("chaleurs", 19)
  .fromTo("#petit-ovaire", 2, {scale: 1, repeat:20}, {scale:1.2, transformOrigin:"50% 50%", repeat:20}, "depart" )
  .to("#fsh", 5,{opacity:1}, "depart")
  .to("#lh", 20, {opacity:1}, "depart")
  .fromTo("#fsh", 2, {scale:1, repeat:8}, {scale:1.2, transformOrigin:"50% 50%",  repeat:8}, "fsh")
  .to("#fsh-fleche", 2, {opacity:1, repeat:8, ease: Power2.easeOut}, "fsh")
  .to(".follicule1", 4, {scale:4, transformOrigin:"15% 15%"}, "fol1")
  .to(".follicule1", 2, {scale:1}, "fol2-=2")
  .to(".follicule2", 4, {scale:4, transformOrigin:"15% 15%"}, "fol2")
  .to(".follicule2", 2, {scale:1}, "grossfol-=2")
  .to(".follicule2", 4, {scale:4, transformOrigin:"15% 15%"}, "fol2+=21")
  .to(".follicule2", 2, {scale:1}, "grossfol+=21")
  .to(".follicule3", 2, {scale:4, transformOrigin:"15% 15%"}, "grossfol-=1")
  .to(".follicule3", 1, {scale:1}, "grossfol+=1")
  .to(".follicule3", 2, {scale:4, transformOrigin:"15% 15%"}, "grossfol+=21")
  .to(".follicule3", 1, {scale:1}, "grossfol+=23")
  .to("#explication", 1, {text:"vagues folliculaires", ease:Linear.easeNone}, "depart+=2")
  .to("#explication", 1, {text:{value:"follicule dominant", delimiter:" "}, ease:Linear.easeNone}, "grossfol")
  .to("#explication", 1, {text:{value:"follicule mûr", delimiter:" "}, ease:Linear.easeNone}, "ovulation-=3")
  .to("#explication", 1, {text:"OVULATION", ease:Linear.easeNone}, "ovulation-=1")
  .to("#explication", 1, {text:"formation du corps jaune", ease:Linear.easeNone}, "ovulation+=1")
  .to("#explication", 1, {text:"lyse du corps jaune", ease:Linear.easeNone}, "fincj")
  .to("#explication", 1, {text:"démarrage d'un nouveau cycle", ease:Linear.easeNone}, "fincj+=5")
  .to(fol, 5, {scale:20, transformOrigin:'50% 50%'}, "grossfol")
  .to("#fol-dominant-9", 5, {scale:20, transformOrigin:'50% 50%'}, "grossfol+=21")
  .to("#fsh-fleche", 5, {opacity:0}, "grossfol")
  .to("#estradiol", 10, {opacity:1}, "grossfol")
  .to("#estradiol", 5, {scale:1.5, transformOrigin:"50% 50%"}, "grossfol")
  .to("#cache", 2, {y:-20}, "cache")
  .to(fol, 3, {fill: "#d3d3d3"}, "folgris")
  .to("#lh-fleche", 1, {opacity:1}, "piclh")
  .to("#lh-etoile", 1, {fill:"yellow", scale:3, transformOrigin:"50% 50%"} , "piclh")
  .to("#vache", 2, {fill:"red"}, "chaleurs")
  .to("#lh-fleche", 1, {opacity:0}, "ovulation")
  .to("#vache", 2, {fill:"#b3b3b3"}, "chaleurs+=2")
  .to("#estradiol", 1, {scale:0}, "ovulation")
  .to("#progesterone", 5, {opacity:1, scale:1.5, transformOrigin:"50% 50%"}, "cj")
  .to("#ovule", 6, {y:"+=100", ease:"Power2.easeOut"}, "ovulation")
  .to("#lh-etoile", 1, {scale:0, transformOrigin:"50% 50%"} , "ovulation")
  .to("#cache", 0, {opacity:0}, "fincache")
  .to(fol, 3, {strokeWidth:1, stroke:"#FFD42A"}, "cj")
  .to("#prosta-fleche-1", 2, {opacity:1}, "fincj-=4")
  .to("#prostaglandines", 5, {opacity:1}, "fincj-=3")
  .to("#prosta-fleche-2", 2, {opacity:1}, "fincj-=2")
  .to(fol, 2, {fill: "#FFD42A"}, "fincj")
  .to(fol, 8, {scale:0}, "fincj")
  .to("#prosta-fleche-1", 2, {opacity:0}, "fincj")
  .to("#prostaglandines", 5, {opacity:0}, "fincj+=1")
  .to("#prosta-fleche-2", 2, {opacity:0}, "fincj+=2")
  .to("#progesterone", 5, {opacity:0, scale:0, transformOrigin:"50% 50%"}, "fincj")
  .to("#vagues", 5, {opacity:1}, "depart")
  .to("#vagues", 5, {opacity:0}, "grossfol-=2")
  .to("#dominant", 2, {opacity:1}, "grossfol")
  .to("#dominant", 2, {opacity:0}, "ovulation-=3")
  .to("#mur", 2, {opacity:1}, "ovulation-=3")
  .to("#mur", 2, {opacity:0}, "ovulation");




play.onclick = function() {
  tl.play();
}

pause.onclick = function() {
  tl.pause();
}
//
// resume.onclick = function() {
//   tl.resume();
// }

// reverse.onclick = function() {
//   tl.reverse();
// }

// restart.onclick = function() {
//   tl.restart();
// }

depart.onclick = function() {
  tl.restart();
  tl.pause();
}
