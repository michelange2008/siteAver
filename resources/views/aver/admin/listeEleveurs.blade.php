@section('content')

    <div class="container-fluid">
    	<h3 class="alert alert-success">Liste des éleveurs</h3>
      <div class="container-fluid">
        @foreach($boutons->listeSousmenu() as $bouton)
          <button class="btn btn-menu {{$bouton->couleur()}}">{{$bouton->texte()}}</button>
        @endforeach()
      </div>
       <table id="listeEleveurs" class="table table-striped table-hover tablesorter">
            <thead >
            	<tr>
            		<th colspan = 4></th>
            		<th colspan = 2 class="text-center bg-primary">{{$annee}}</th>
            		<th colspan = 2 class="text-center bg-warning">Bilans annuels</th>
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
                    <td class ="{{$troupeau->user->activite->abbreviation}}" >{{$troupeau->user->name}}</td>
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
					<td class="text-center">
						<?php $date = ['-'] ?>
						  @foreach($troupeau->bsa as $bsa)
						      <?php $date[] = $bsa->date_bsa ?>
						  @endforeach()
						  {{ max($date)}}
					</td>
                </tr>
                @endforeach()
            </tbody>
        </table>

    </div>

@endsection()
