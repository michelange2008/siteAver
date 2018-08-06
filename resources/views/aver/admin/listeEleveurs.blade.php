@section('content')

    <div class="container-fluid">
    	<h3 class="alert alert-success">Situation des éleveurs</h3>
      <div class="container-fluid">
        @foreach($boutons->listeSousmenu() as $bouton)
          <button class="btn btn-menu {{$bouton->couleur()}}" id="{{str_replace(" ","_", strtolower($bouton->texte()))}}">{{$bouton->texte()}}</button>
        @endforeach()
      </div>
       <table id="listeEleveurs" class="table table-striped table-hover tablesorter">
            <thead >
            	<tr>
            		<th colspan = 4><span id='avertissement' class="italique maigre non_affiche"><i class="fa fa-braille"></i> attention affichage d'une sélection</span></th>
            		<th colspan = 2 class="text-center bg-primary">{{$annee}}</th>
            		<th colspan = 2 class="text-center bg-warning">Bilans Sanitaires Annuels</th>
            	</tr>
                <tr id= "titres" class="bg-success">
                    <th>Eleveur</th>
                    <th>Troupeau</th>
                    <th>Type</th>
                    <th class="text-center">Vet. San.</th>
                    <th class="bg-primary text-center">Proph.</th>
                    <th class="bg-primary text-center">VSO</th>
                    <th class="text-center bg-warning">prioritaire</th>
                    <th class="text-center bg-warning">Dernier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listeEleveurs as $troupeau)
                <tr class="ligne_eleveur" name = '{{$troupeau->especes->groupe}}'>
                    <td class="lien">{!! link_to_route('troupeau.accueil',
                      $troupeau->user->name, [$troupeau->id],
                      [
                        'class' => $troupeau->user->activite->abbreviation,
                        'title' => "afficher la situation de ".$troupeau->user->name
                        ]) !!}
                    </td>
                    <td class="{{$troupeau->especes->abbreviation}}">{{$troupeau->especes->nom}}</td>
                    <td class="text-center {{$troupeau->user->activite->abbreviation}} ">{{strtolower($troupeau->user->activite->abbreviation)}}</td>

                    <td class="vetsan text-center" name="{{$troupeau->user->vetsan}}">
                    	@if($troupeau->user->vetsan === 0)
                    		<i class="fa fa-ban" style='color : red'></i>
                      @else()
                        <i class="fa fa-check" style="color : green"></i>
                    	@endif()
                    </td>

                    <td class="prophylo text-center">
                    	@foreach($troupeau->anneeprophylos as $item)
                        	@if($item->campagne === $annee)
                        		<i name="1" class="fa fa-bullseye" style="color:blue"></i>
                        	@endif()
                        @endforeach()
					</td>
					<td class="vso text-center">
					@foreach($troupeau->anneevso as $item)
                        	@if($item->campagne === $annee)
                        		<i name = "1" class="fa fa-bullseye" style="color:blue"></i>
                        	@endif()
                    @endforeach()
					</td>
					<td class="bsaimportant text-center" name="{{ $troupeau->bsaimportant }}">
						@if($troupeau->bsaimportant === 1)
							<i class="fa fa-check-square" style="color:orange"></i>
						@endif()
					</td>
            <?php
            
            if($troupeau->bsas !== null) $listeBSA = $troupeau->bsas->sortByDesc('date_bsa'); ?>
              @if($listeBSA->max('date_bsa') != null)
                <?php
                  $dateBSA = new DateTime($listeBSA->max('date_bsa'));
                  $delaiBSA = $listeBSA->min('delaiBSA');
                  $date = $dateBSA->format('d/m/Y'); ?>
                  @if($delaiBSA > 365)
                  <td class="bsa-date bsa-retard text-center bg-danger text-light">{{$date}}</td>
                  @else()
                  <td class="bsa-date bsa-ok text-center bsa-ok bg-success text-light">{{$date}}</td>
                  @endif()
              @else()
                  <td class = "bsa-date bsa-absent text-center">-</td>
              @endif()
                </tr>
                @endforeach()
            </tbody>
        </table>

    </div>

@endsection()
