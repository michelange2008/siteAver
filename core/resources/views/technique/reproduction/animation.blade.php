<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>animation</title>
    <link rel="stylesheet" href="{{asset('public/css/reproduction.css')}}">

</head>
<body>
  <div class="container">
    <div id="barre-titre">
      <a href="{{route('technique.index')}}" title="retour"><img class="retour" src="{{URL::asset(config('fichiers.technique'))}}/reproduction/retour.svg" alt="retour"></a>
      <h1>Le cycle ovarien de la vache<span class="detail"> (après vélage et sans fécondation)</span></h1>
      <div class="logos">
        <div class="cc"></div>
        <div class="antikor"></div>
      </div>
    </div>

    <nav id="menu">
      <button id="depart" class="control" title="Retour à J0"><div class="depart"></div> </button>
      <button id="pause" class="control" title="Mettre en pause l'animation"><div class="pause"></div></button>
      <button id="play" class="control" title="Démarrer l'animation"><div class="play"></div></button>
      <div id="timeline">
        <div id="ligne">
          <?php for ($i=0; $i < 40 ; $i++) {
            echo "<div class='jour'></div>";
          } ?>
        </div>
        <div id="marque"></div>
      </div>
    </nav>
    <div class="animation">
      <div id="moniteur">
        <div class="moniteur-item compteur">
          <div id="jours" class="compteur-chiffres">
            <p style="margin:0">0</p>
          </div>
          <p class="moniteur-texte">nombre de jours</p>
        </div>
        <div class="moniteur-item">
          <div class="bouton bouton-rond" title="Tournez le bouton pour faire avancer ou reculer l'animation">
            <div id="position" class="roller"></div>
          </div>
          <p class="moniteur-texte">progression</p>
        </div>
        <div class="moniteur-item">
          <!-- <div class="bouton bouton-demi" title="Déplacez l'aiguille pour accélérer ou ralentir l'animation"> -->
            <div id="speed" class="aiguille"></div>
            <div class="base-aiguille"></div>
          <!-- </div> -->
          <p class="moniteur-texte">vitesse</p>
        </div>

      </div>
      <div class="organe">
        <div class="container-texte">
          <p class="texte" id="explication">-</p>
        </div>
        <svg
           viewBox="0 0 210 90"
           height="110mm"
           width="210mm">
          <defs
             id="defs2">
            <linearGradient
               inkscape:collect="always"
               id="linearGradient24846">
              <stop
                 style="stop-color:#aa4400;stop-opacity:1;"
                 offset="0"
                 id="stop24842" />
              <stop
                 style="stop-color:#aa4400;stop-opacity:0;"
                 offset="1"
                 id="stop24844" />
            </linearGradient>
            <linearGradient
               inkscape:collect="always"
               id="linearGradient24828">
              <stop
                 style="stop-color:#d45500;stop-opacity:1"
                 offset="0"
                 id="stop24824" />
              <stop
                 style="stop-color:#aa4400;stop-opacity:0;"
                 offset="1"
                 id="stop24826" />
            </linearGradient>
            <marker
               inkscape:stockid="Arrow2Send"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow2Send"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 id="path4639"
                 style="fill:#008000;fill-opacity:1;fill-rule:evenodd;stroke:#008000;stroke-width:0.625;stroke-linejoin:round;stroke-opacity:1"
                 d="M 8.7185878,4.0337352 -2.2072895,0.01601326 8.7185884,-4.0017078 c -1.7454984,2.3720609 -1.7354408,5.6174519 -6e-7,8.035443 z"
                 transform="matrix(-0.3,0,0,-0.3,0.69,0)"
                 inkscape:connector-curvature="0" />
            </marker>
            <marker
               inkscape:stockid="Arrow1Mend"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow1Mend"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 id="path4615"
                 d="M 0,0 5,-5 -12.5,0 5,5 Z"
                 style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:1.00000003pt;stroke-opacity:1"
                 transform="matrix(-0.4,0,0,-0.4,-4,0)"
                 inkscape:connector-curvature="0" />
            </marker>
            <marker
               inkscape:stockid="Arrow1Lend"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow1Lend"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 id="path4609"
                 d="M 0,0 5,-5 -12.5,0 5,5 Z"
                 style="fill:#000000;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:1.00000003pt;stroke-opacity:1"
                 transform="matrix(-0.8,0,0,-0.8,-10,0)"
                 inkscape:connector-curvature="0" />
            </marker>
            <marker
               inkscape:stockid="Arrow2Send"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow2Send-9"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 inkscape:connector-curvature="0"
                 id="path4639-6"
                 style="fill:#0000ff;fill-opacity:1;fill-rule:evenodd;stroke:#0000ff;stroke-width:0.625;stroke-linejoin:round;stroke-opacity:1"
                 d="M 8.7185878,4.0337352 -2.2072895,0.01601326 8.7185884,-4.0017078 c -1.7454984,2.3720609 -1.7354408,5.6174519 -6e-7,8.035443 z"
                 transform="matrix(-0.3,0,0,-0.3,0.69,0)" />
            </marker>
            <marker
               inkscape:stockid="Arrow2Send"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow2Send-4"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 inkscape:connector-curvature="0"
                 id="path4639-1"
                 style="fill:#0000ff;fill-opacity:1;fill-rule:evenodd;stroke:#0000ff;stroke-width:0.625;stroke-linejoin:round;stroke-opacity:1"
                 d="M 8.7185878,4.0337352 -2.2072895,0.01601326 8.7185884,-4.0017078 c -1.7454984,2.3720609 -1.7354408,5.6174519 -6e-7,8.035443 z"
                 transform="matrix(-0.3,0,0,-0.3,0.69,0)" />
            </marker>
            <radialGradient
               inkscape:collect="always"
               xlink:href="#linearGradient24828"
               id="radialGradient24832"
               cx="50.197365"
               cy="40.121716"
               fx="50.197365"
               fy="40.121716"
               r="58.635056"
               gradientTransform="matrix(1.6214425,-0.06820218,0.02692194,0.64004379,-4.8181538,18.384376)"
               gradientUnits="userSpaceOnUse" />
            <radialGradient
               inkscape:collect="always"
               xlink:href="#linearGradient24846"
               id="radialGradient24852"
               cx="60.635056"
               cy="27.057495"
               fx="60.635056"
               fy="27.057495"
               r="58.635056"
               gradientTransform="matrix(1,0,0,0.42734668,27.456774,23.494579)"
               gradientUnits="userSpaceOnUse" />
            <marker
               inkscape:stockid="Arrow2Send"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow2Send-1"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 id="path4639-7"
                 style="fill:#ff2a2a;fill-opacity:1;fill-rule:evenodd;stroke:#ff2a2a;stroke-width:0.625;stroke-linejoin:round;stroke-opacity:1"
                 d="M 8.7185878,4.0337352 -2.2072895,0.01601326 8.7185884,-4.0017078 c -1.7454984,2.3720609 -1.7354408,5.6174519 -6e-7,8.035443 z"
                 transform="matrix(-0.3,0,0,-0.3,0.69,0)"
                 inkscape:connector-curvature="0" />
            </marker>
            <marker
               inkscape:stockid="Arrow2Send"
               orient="auto"
               refY="0"
               refX="0"
               id="Arrow2Send-1-6"
               style="overflow:visible"
               inkscape:isstock="true">
              <path
                 id="path4639-7-0"
                 style="fill:#008000;fill-opacity:1;fill-rule:evenodd;stroke:#008000;stroke-width:0.625;stroke-linejoin:round;stroke-opacity:1"
                 d="M 8.7185878,4.0337352 -2.2072895,0.01601326 8.7185884,-4.0017078 c -1.7454984,2.3720609 -1.7354408,5.6174519 -6e-7,8.035443 z"
                 transform="matrix(-0.3,0,0,-0.3,0.69,0)"
                 inkscape:connector-curvature="0" />
            </marker>
          </defs>
          <metadata
             id="metadata5">
            <rdf:RDF>
              <cc:Work
                 rdf:about="">
                <dc:format>image/svg+xml</dc:format>
                <dc:type
                   rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                <dc:title />
              </cc:Work>
            </rdf:RDF>
          </metadata>
          <ellipse
             style="opacity:1;fill:url(#radialGradient24832);fill-opacity:1;stroke:url(#radialGradient24852);stroke-width:0.71071428;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="path4490"
             cx="88.091827"
             cy="35.057495"
             rx="58.279697"
             ry="24.702139" />
          <text
             xml:space="preserve"
             style="font-style:normal;font-weight:normal;font-size:10.58333302px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;opacity:0;fill:#008000;fill-opacity:1;stroke:none;stroke-width:0.26458332"
             x="177.8168"
             y="36.101608"
             id="fsh"
             inkscape:label="#text4602"><tspan
               sodipodi:role="line"
               id="tspan4600"
               x="177.8168"
               y="36.101608"
               style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:6.34999943px;font-family:DINPro;-inkscape-font-specification:'DINPro Heavy';fill:#008000;stroke-width:0.26458332">FSH</tspan></text>
          <path
             sodipodi:type="star"
             style="opacity:1;fill:#d3d3d3;fill-opacity:1;stroke:none;stroke-width:0.73735374;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="lh-etoile"
             sodipodi:sides="5"
             sodipodi:cx="163.27452"
             sodipodi:cy="48.52472"
             sodipodi:r1="7.3227925"
             sodipodi:r2="3.6613965"
             sodipodi:arg1="1.1071487"
             sodipodi:arg2="1.7354672"
             inkscape:flatsided="false"
             inkscape:rounded="0"
             inkscape:randomized="0"
             d="m 166.54937,55.074424 -3.87505,-2.937838 -4.61695,1.526673 1.59659,-4.59324 -2.87867,-3.919212 4.86181,0.09906 2.83783,-3.94888 1.40817,4.654462 4.63255,1.47867 -3.99151,2.777556 z"
             inkscape:transform-center-x="-0.37095303"
             inkscape:transform-center-y="-0.33701487"
             inkscape:label="#path21954" />
          <g
             id="lh"
             inkscape:label="#g39324"
             style="opacity:0"
             transform="translate(-17.151959,0.83598909)">
            <circle
               r="4.0284047"
               cy="47.230671"
               cx="203.07274"
               id="path4952"
               style="opacity:1;fill:#008000;fill-opacity:1;stroke:#008000;stroke-width:1.96466959;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <text
               inkscape:label="#text4602"
               id="fsh-0"
               y="49.400246"
               x="199.01909"
               style="font-style:normal;font-weight:normal;font-size:10.58333302px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#ffff00;fill-opacity:1;stroke:none;stroke-width:0.26458332"
               xml:space="preserve"><tspan
                 style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:6.34999943px;font-family:DINPro;-inkscape-font-specification:'DINPro Heavy';fill:#ffff00;stroke-width:0.26458332"
                 y="49.400246"
                 x="199.01909"
                 id="tspan4600-6"
                 sodipodi:role="line">LH</tspan></text>
          </g>
          <path
             style="opacity:0;fill:#0000ff;fill-opacity:1;stroke:#0000ff;stroke-width:1.81636453;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;marker-end:url(#Arrow2Send-9)"
             d="m 178.64734,48.091635 -15.09163,0.153987"
             id="lh-fleche"
             inkscape:connector-curvature="0"
             inkscape:label="#path4604"
             sodipodi:nodetypes="cc" />
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-2"
             cx="130.59157"
             cy="37.008636"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-4"
             transform="matrix(0.37289201,0,0,0.31778293,128.8301,34.504706)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-04"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-69"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-7"
             cx="67.751122"
             cy="41.433311"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-00"
             transform="matrix(0.37289201,0,0,0.31778293,65.989648,38.929381)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-5"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-6"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-8"
             cx="95.665878"
             cy="49.686371"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-7"
             transform="matrix(0.37289201,0,0,0.31778293,93.904401,47.182439)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-7"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-9"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-0"
             cx="93.966713"
             cy="35.364887"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-40"
             transform="matrix(0.37289201,0,0,0.31778293,92.205241,32.860956)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-47"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-97"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-89"
             cx="79.645233"
             cy="30.752888"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-6"
             transform="matrix(0.37289201,0,0,0.31778293,77.883761,28.248953)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-9"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-2"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-74"
             cx="51.244991"
             cy="31.481098"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-1"
             transform="matrix(0.37289201,0,0,0.31778293,49.483533,28.977164)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-2"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-90"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-81"
             cx="52.701412"
             cy="49.686371"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-5"
             transform="matrix(0.37289201,0,0,0.31778293,50.939955,47.182439)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-3"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-36"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-6"
             cx="76.24691"
             cy="51.142792"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-04"
             transform="matrix(0.37289201,0,0,0.31778293,74.485443,48.638861)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-8"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-0"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-1"
             cx="83.529015"
             cy="36.578571"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-71"
             transform="matrix(0.37289201,0,0,0.31778293,81.767553,34.074641)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-49"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-7"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-09"
             cx="87.170067"
             cy="17.645103"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-68"
             transform="matrix(0.37289201,0,0,0.31778293,85.408601,15.141154)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-0"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-5"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-04"
             cx="107.31725"
             cy="24.927197"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-59"
             transform="matrix(0.37289201,0,0,0.31778293,105.55578,22.423265)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-1"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-93"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-71"
             cx="107.31725"
             cy="41.918785"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-10"
             transform="matrix(0.37289201,0,0,0.31778293,105.55578,39.414855)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-58"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-01"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-5"
             cx="119.21138"
             cy="46.288052"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-2"
             transform="matrix(0.37289201,0,0,0.31778293,117.44989,43.784121)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-6"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-03"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-53"
             cx="124.55159"
             cy="31.723835"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-06"
             transform="matrix(0.37289201,0,0,0.31778293,122.79011,29.219901)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-36"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-8"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-28"
             cx="109.25916"
             cy="33.422989"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-78"
             transform="matrix(0.37289201,0,0,0.31778293,107.49767,30.91906)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-62"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-1"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-66"
             cx="101.7343"
             cy="15.217735"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-9"
             transform="matrix(0.37289201,0,0,0.31778293,99.972821,12.713784)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-44"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-29"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-65"
             cx="59.255306"
             cy="21.043419"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-61"
             transform="matrix(0.37289201,0,0,0.31778293,57.493854,18.539473)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-99"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-13"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-61"
             cx="66.051964"
             cy="30.752888"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-60"
             transform="matrix(0.37289201,0,0,0.31778293,64.290489,28.248953)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-33"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-59"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-12"
             cx="42.263733"
             cy="40.947838"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-8"
             transform="matrix(0.37289201,0,0,0.31778293,40.502264,38.443907)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-35"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-81"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-07"
             cx="43.477409"
             cy="24.927197"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-42"
             transform="matrix(0.37289201,0,0,0.31778293,41.715949,22.423265)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-48"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-99"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-77"
             cx="89.111977"
             cy="24.927197"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-714"
             transform="matrix(0.37289201,0,0,0.31778293,87.350501,22.423265)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-43"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-87"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-64"
             cx="114.84209"
             cy="18.858788"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-01"
             transform="matrix(0.37289201,0,0,0.31778293,113.08063,16.354839)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-620"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-55"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-4"
             cx="132.31917"
             cy="27.354565"
             r="0.93968666"
             class="follicule2" />
          <g
             id="ovule-51"
             transform="matrix(0.37289201,0,0,0.31778293,130.55771,24.850635)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-66"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-89"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-29"
             cx="109.74462"
             cy="52.599213"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-22"
             transform="matrix(0.37289201,0,0,0.31778293,107.98315,50.095283)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-74"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-28"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-52"
             cx="82.558075"
             cy="44.10342"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-77"
             transform="matrix(0.37289201,0,0,0.31778293,80.796605,41.599488)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-00"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-56"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-641"
             cx="66.537437"
             cy="52.356476"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-80"
             transform="matrix(0.37289201,0,0,0.31778293,64.775963,49.852546)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-57"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-61"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-00"
             cx="87.412819"
             cy="53.327427"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-108"
             transform="matrix(0.37289201,0,0,0.31778293,85.651341,50.823493)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-24"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-4"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-3"
             cx="56.827938"
             cy="38.277729"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-607"
             transform="matrix(0.37289201,0,0,0.31778293,55.066484,35.7738)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-005"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-17"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-44"
             cx="95.665878"
             cy="27.597301"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-19"
             transform="matrix(0.37289201,0,0,0.31778293,93.904401,25.093372)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-39"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-02"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-045"
             cx="115.08484"
             cy="27.111828"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-45"
             transform="matrix(0.37289201,0,0,0.31778293,113.32336,24.607898)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-87"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-74"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-21"
             cx="120.42506"
             cy="37.064045"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-83"
             transform="matrix(0.37289201,0,0,0.31778293,118.66358,34.560115)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-007"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-79"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-08"
             cx="81.587128"
             cy="23.228058"
             r="0.93968666"
             class="follicule3" />
          <g
             id="ovule-98"
             transform="matrix(0.37289201,0,0,0.31778293,79.825657,20.724106)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-21"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-10"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant"
             cx="134.63359"
             cy="43.616272"
             r="0.93968666"
             inkscape:label="#foldominant" />
          <circle
             style="opacity:1;fill:#d3d3d3;fill-opacity:1;stroke:none;stroke-width:0.22999999;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="cache"
             cx="136.02399"
             cy="77.310608"
             r="8.4957952" />
          <g
             id="ovule"
             transform="matrix(0.372892,0,0,0.31778292,132.87213,41.11234)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
          <text
             xml:space="preserve"
             style="font-style:normal;font-weight:normal;font-size:10.58333302px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;opacity:0;fill:#8080ff;fill-opacity:1;stroke:none;stroke-width:0.26458332"
             x="149.33025"
             y="79.416504"
             id="progesterone"
             inkscape:label="#progesterone"><tspan
               sodipodi:role="line"
               id="tspan4600-0-0"
               x="149.33025"
               y="79.416504"
               style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:6.34999943px;font-family:DINPro;-inkscape-font-specification:'DINPro Heavy';fill:#8080ff;stroke-width:0.26458332">progestérone</tspan></text>
          <text
             xml:space="preserve"
             style="font-style:normal;font-weight:normal;font-size:10.58333302px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;opacity:0;fill:#0000ff;fill-opacity:1;stroke:none;stroke-width:0.26458332"
             x="155.83255"
             y="79.740356"
             id="estradiol"
             inkscape:label="#estradiol"><tspan
               sodipodi:role="line"
               id="tspan4600-0"
               x="155.83255"
               y="79.740356"
               style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:6.34999943px;font-family:DINPro;-inkscape-font-specification:'DINPro Heavy';fill:#ff0000;stroke-width:0.26458332">estradiol</tspan></text>
          <g
             id="uterus"
             inkscape:label="#g24899"
             transform="translate(27.456774,8.00001)">
            <path
               sodipodi:nodetypes="ssssssss"
               inkscape:connector-curvature="0"
               id="petit-ovaire"
               d="m 52.119645,67.385449 c 0,0.388183 -0.183339,0.979596 -0.340771,1.31077 -0.224974,0.473255 -0.369211,0.838615 -0.825906,1.108843 -0.411522,0.2435 -0.736386,0.543178 -1.254529,0.543178 -1.495547,0 -2.070768,-0.213851 -2.070768,-1.656615 0,-0.803147 0.949141,-1.23492 1.540244,-1.714127 0.470747,-0.381635 0.982537,-1.025658 1.645553,-1.025658 1.495548,0 1.306177,-0.0092 1.306177,1.433609 z"
               style="opacity:1;fill:#bf4d00;fill-opacity:0.53333285;stroke:none;stroke-width:2.21098447;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
               inkscape:label="#path24894" />
            <path
               sodipodi:nodetypes="ccccccccccccccccccccccccccccccsccccccccccccccccccccccccccccccccccccccccc"
               style="stroke-width:0.26458332"
               inkscape:connector-curvature="0"
               id="path4"
               d="m 48.245482,67.499285 c -0.62763,-0.659766 -1.265137,-1.446602 -1.166068,-2.420896 0.104065,-1.125601 0.250305,-2.401522 1.087505,-3.23811 1.92474,-1.600224 4.784482,-1.746032 6.998704,-0.696037 1.221849,1.260559 1.97797,2.895311 2.708232,4.472988 0.345282,0.649592 0.539605,2.350613 1.575014,1.707374 0.761482,-0.862433 0.396401,-2.108004 0.724116,-3.146065 0.286214,-1.382297 0.769454,-3.108414 2.283267,-3.566358 2.148206,-0.596235 4.747152,-0.68666 6.518047,0.884497 0.773299,0.590068 1.264353,1.432838 1.550721,2.351096 0.522441,1.160379 0.53845,2.64124 -0.39056,3.606532 -0.354545,0.804681 0.976769,1.895525 -0.19083,2.629214 -0.588217,1.172356 -1.992704,0.692562 -2.917591,0.284634 -0.578705,-0.538685 -0.856513,-1.36153 -1.254535,-2.044105 -0.331643,-0.945358 -0.02078,-2.340849 1.153561,-2.462535 0.852655,-0.476986 1.6274,0.781757 2.184135,0.57613 0.205819,-1.072342 0.102624,-2.314903 -0.844905,-3.017839 -1.094541,-0.788958 -2.664388,-1.193767 -3.923905,-0.567915 -1.012198,0.771755 -0.585295,2.200723 -0.48292,3.278856 0.141944,1.313085 0.294455,2.679599 -0.250032,3.930284 -0.414406,1.581347 -1.990769,2.462246 -2.47067,4.00951 -0.413783,0.997222 -0.207108,2.207956 -0.447519,3.137051 -0.889196,0.259816 -2.474992,0.484691 -2.630371,-0.794494 0.222219,-1.424974 -0.588184,-2.720225 -1.443502,-3.781069 -0.828937,-1.296616 -1.875547,-2.560236 -2.046242,-4.146717 -0.259986,-1.287033 0.407255,-2.624772 -0.168485,-3.869069 -0.407571,-1.155644 -1.357445,-2.306233 -2.684384,-2.293943 -0.83019,-0.185401 -1.715273,-0.03491 -2.380699,0.517674 -0.643289,0.645804 -0.880937,1.697387 -0.791788,2.603214 -0.01309,0.81614 0.742717,1.654915 1.429558,0.782419 0.62299,-0.553848 1.606443,-0.6666 2.089583,-0.127368 0.20361,0.22725 0.292163,0.701295 0.269714,1.095494 -0.129335,1.408533 -0.91131,3.034014 -2.450191,3.286731 -1.104049,0.312517 -2.906455,-0.422309 -2.410131,-1.808843 0.123146,-0.46035 0.398488,-0.877875 0.773171,-1.172335 z m 15.16327,-2.801937 c -0.04482,-0.801096 0.03826,-1.764244 0.861252,-2.155902 1.637942,-0.720563 3.784247,-0.08764 4.811464,1.37069 0.635552,0.907915 0.347195,2.020416 0.207649,3.012342 0.626242,1.142474 1.368183,-0.712974 1.318736,-1.347456 -0.0938,-1.163954 -0.494352,-2.373587 -1.231774,-3.292282 -1.044384,-1.164517 -2.575996,-1.841093 -4.14567,-1.762495 -1.126974,0.04846 -2.318521,0.179842 -3.336799,0.676832 -1.457913,1.126927 -1.762178,3.097076 -1.678606,4.829673 0.05501,0.82838 -0.537337,2.054314 -1.5375,1.793077 -0.97652,-0.354938 -0.725413,-1.891596 -1.282258,-2.702383 -0.529962,-1.351712 -1.233764,-2.652045 -2.204452,-3.739971 -1.928861,-0.838889 -4.257562,-0.951606 -6.098779,0.178681 -1.157142,0.516411 -1.423091,1.789511 -1.647175,2.899944 -0.202602,0.993798 0.139915,2.46094 1.194541,2.738239 0.668189,-0.555471 -0.787319,-1.324358 -0.44881,-2.155787 0.151923,-0.943651 0.257345,-2.208774 1.285079,-2.608324 0.737163,-0.524776 1.639771,-0.468469 2.486968,-0.35131 2.016374,0.26342 3.219589,2.529435 2.974216,4.423655 -0.321093,1.574306 -0.01541,3.254584 0.923015,4.571431 0.808087,1.458809 2.216492,2.632902 2.537872,4.325736 -0.156958,0.847744 0.04007,2.102673 1.214237,1.699844 0.86825,0.165183 1.078719,-0.304042 0.842073,-1.050964 0.0582,-1.595633 0.710688,-3.153656 1.850509,-4.280312 1.220575,-1.485437 1.686498,-3.534216 1.23029,-5.402032 -0.07368,-0.553982 -0.115798,-1.11216 -0.126078,-1.670926 z m 2.495021,3.045353 c 0.111828,0.928011 0.716385,1.766222 1.30096,2.443554 0.78501,0.338526 1.998985,0.778542 2.515324,-0.205509 1.064093,-0.871911 -0.02006,-2.147005 -0.6827,-2.882606 -0.628487,-0.793016 -1.73512,-1.42446 -2.661633,-0.705805 -0.432234,0.313025 -0.41992,0.875944 -0.471951,1.350366 z M 52.047545,67.258514 c 0.115133,-1.494229 -1.52641,-1.38626 -2.285986,-0.594214 -0.663653,0.643252 -1.599863,1.094404 -1.958776,1.985877 -0.474992,1.024936 0.709443,1.741922 1.606165,1.647122 1.57475,-0.0317 2.554216,-1.599564 2.638597,-3.038785 z" />
          </g>
          <text
             xml:space="preserve"
             style="font-style:normal;font-weight:normal;font-size:10.58333302px;line-height:1.25;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;opacity:0;fill:#008000;fill-opacity:1;stroke:none;stroke-width:0.26458332"
             x="92.830254"
             y="87.936127"
             id="prostaglandines"
             inkscape:label="prostaglandines"><tspan
               sodipodi:role="line"
               x="92.830254"
               y="87.936127"
               style="font-style:normal;font-variant:normal;font-weight:900;font-stretch:normal;font-size:4.93888855px;font-family:DINPro;-inkscape-font-specification:'DINPro Heavy';fill:#008000;stroke-width:0.26458332"
               id="tspan24880">prostaglandines</tspan></text>
          <ellipse
             style="opacity:0;fill:#000000;fill-opacity:0;stroke:#aa4400;stroke-width:1.81636441;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="path24890"
             cx="77.485535"
             cy="76.946739"
             rx="2.0187886"
             ry="1.688223" />
          <path
             style="opacity:0;fill:#ff2a2a;stroke:#ff2a2a;stroke-width:1.46499991;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;marker-end:url(#Arrow2Send-1)"
             d="m 112.06011,82.207668 5.30252,-5.477503"
             id="prosta-fleche-2"
             inkscape:connector-curvature="0"
             inkscape:label="#prosta-fleche-2"
             sodipodi:nodetypes="cc" />
          <path
             style="opacity:0;fill:#008000;stroke:#008000;stroke-width:1.46499991;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;marker-end:url(#Arrow2Send-1-6)"
             d="m 86.134271,75.821841 4.78091,6.264487"
             id="prosta-fleche-1"
             inkscape:connector-curvature="0"
             inkscape:label="#path4604"
             sodipodi:nodetypes="cc" />
          <g
             transform="matrix(0.05223429,0,0,0.05223429,86.931291,90.730696)"
             id="g8"
             style="fill:#666666;image-rendering:optimizeQuality;shape-rendering:geometricPrecision;text-rendering:geometricPrecision"
             inkscape:groupmode="layer"
             inkscape:label="vache">
            <path
               inkscape:connector-curvature="0"
               class="fil0"
               d="m -585.2277,-425.65429 -34,-32 c 12,0 25,4 35,-2 17,-12 20,-24 11,-21 -1,0 -4,1 -5,2 -24,10 -49,-12 -76,-10 -5,3 -11,5 -12,12 -1,7 6,9 5,17 -16,-1 -23,-19 -39,-10 -4,2 -12,10 -7,18 3,5 14,4 19,8 -1,4 -3,6 -9,6 -4,0 -8,0 -13,1 l -82,5 c -36,2 -72,5 -108,8 -36,3 -71,10 -108,8 -35,-1 -71,-5 -107,-8 -35,-3 -74,-11 -99,8 -17,12 -14,14 -20,24 -2,4 -3,4 -6,9 -8,14 -16,84 -16,100 3,65 -13,40 -22,61 -10,25 7,51 8,74 7,-2 11,-13 11,-23 -1,-32 18,-31 20,-50 1,-14 -8,-8 -5,-25 5,-28 6,-103 15,-121 l -2,85 c 0,12 -1,30 2,42 2,11 13,17 13,29 -3,3 -6,3 -9,6 -3,2 -6,5 -8,7 -4,6 -8,14 -7,23 1,12 7,26 9,51 2,19 2,39.000005 0,58.000005 -1,4 -2,10 0,14 2,6 4,4 7,7 7,7 -5,12 -5,21 2,7 36,22.99999995 51,15 9,-5 7,-16 0,-23 -21,-20 -19,-56 -15,-84.000005 1,-12 9,-42 19,-50 18,19 29,71.000005 29,104.000005 0,1 8,5 15,12 14,15 10,24 30,25 9,0 16,0 22,-5 -1,-10 -9,-18 -14,-24 -4,-5 -12,-15 -16,-22 -8,-15 -14,-44.000005 -6,-62.000005 l 9,-1 4,7 c 3,3 4,4 7,5 3,-3 5,-7 7,-12 l 13,-1 c 2,6 6,11 10,13 9,-6 2,-14 10,-19 1,-1 3,-1 4,-2 8,-5 13,-8 19,-15 3,-5 6,-11 9,-14 41,0 54,3 102,0 8,-1 16,-1 25,-2 9,-1 15,-3 20,3 7,10 7,31 2,43 -9,20 -2,19 4,27 8,13.000005 12,40.000005 8,53.000005 -4,11 -2,9 5,15 7,6 6,10 11,15 7,6 20,10 30,9 2,0 5,0 6,-1 5,-2 2,0 4,-3 5,-11 -12,-14 -16,-21 -3,-4 -20,-78.000005 1,-98.000005 2,3 2,8 2,12 1,18 6,17 12,28.000005 12,22 2,55 15,65 12,8 23,20 31,23 7,2 17,1 22,-2 2,-14 -23,-15 -34,-63 -4,-21 -4,-67.000005 0,-89.000005 2,-2 8,0 12,-1 23,-1 34,-39 41,-57 11,-33 21,-51 40,-71 35,-37 43,-14 83,-29 60,-23 53,-2 63,-21 5,-7 10,-7 14,-13 2,-9 -24,-30 -32,-38 z"
               id="vache"
               style="fill:#b3b3b3" />
          </g>
          <g
             id="fsh-fleche"
             inkscape:label="#g39807"
             style="opacity:0"
             transform="translate(-20.856128,0.83598909)">
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 182.43782,35.310507 -2.72606,-2.056364 2.91461,-2.016368"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0" />
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 177.3025,35.182669 -2.72605,-2.056358 2.91461,-2.016369"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0-8" />
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 179.95292,35.254365 -2.72606,-2.056361 2.9146,-2.016376"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0-6" />
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 190.08106,35.310506 -2.72606,-2.056363 2.91461,-2.016368"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0-3" />
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 184.94574,35.182669 -2.72605,-2.056358 2.91461,-2.016369"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0-8-2" />
            <path
               sodipodi:nodetypes="ccc"
               inkscape:connector-curvature="0"
               d="m 187.59616,35.254365 -2.72606,-2.056361 2.9146,-2.016376"
               style="fill:none;stroke:#008000;stroke-width:0.75035834;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
               id="path39368-0-6-8" />
          </g>
          <circle
             style="opacity:1;fill:#ff8080;fill-opacity:1;stroke:#000000;stroke-width:0.03;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
             id="fol-dominant-9"
             cx="72.848602"
             cy="21.286163"
             r="0.93968666"
             class="follicule1" />
          <g
             id="ovule-0"
             transform="matrix(0.37289201,0,0,0.31778293,71.087125,18.78221)"
             inkscape:label="#g4485-11">
            <circle
               r="1.9538076"
               cy="8.0368433"
               cx="4.5875549"
               id="path4485-689-4"
               style="opacity:1;fill:#ffffff;fill-opacity:1;stroke:#000000;stroke-width:0.57646197;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
            <circle
               r="1.0208613"
               cy="8.1600227"
               cx="4.1266994"
               id="path4487-90-3"
               style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.94946676;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
          </g>
        </svg>


      </div>
    </div>
  </div>
    <script src="{{ asset(config('scripts.path'))}}/gsap/TweenMax.min.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/gsap/TextPlugin.min.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/gsap/Draggable.min.js"></script>
    <script src="{{ asset(config('scripts.path'))}}/reproduction.js"></script>
</body>
</html>
