<!--
  Projet  H2021 
  Noms    : Kevin Martinez-Bonilla
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Ajouter vol</title>
		<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />

	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-light">
			<?php
				include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");   
			?>
		
			<div id="navbarNav" class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<?php
						include_once (DOSSIER_BASE_INCLUDE."vues/fonctions_affichage/mes_fonctions.inc.php");
							$acteur=$controleur->getCategorieUtilisateur(); 
							afficherMenu($acteur);
					?>
				</ul>
			</div>
		</nav>
		<div>
			<?php
			afficherErreurs($controleur->getMessagesErreur());
			afficherSucces($controleur->getMessagesSucces());
			?>
		</div>
		<?php
			$tableauVoyage=$controleur->getTableauVoyage();
		?>
			<div class="container text-monospace table-responsive-md">
		<!--
			<?php
				$tableauVoyage=$controleur->getTableauVoyage();
				
			?>
				-->
                  
			<h2 >Voyage Disponible: </h2> <br>
                 
                     
			<table class="table table-light table-striped table-hover">
				<thead class="table-dark">
					<tr>
						<th>Destination</th>
						<th>Numéro de vol</th>
						<th>Date de départ</th>
						<th>Places restantes </th>
						<th>prix par billet</th>
					</tr>
				</thead>
				<tbody>
				<?php
						foreach($tableauVoyage as $unVoyage) {
							echo "<tr>
									<td >".$controleur->getDestination($unVoyage->getInfos())."</td>
									<td >".$unVoyage->getNumeroVoyage()."</td>
									<td >".$unVoyage->getLaDate()."</td>
									<td >".($unVoyage->calculerPlacesDisponibles())."</td>
									<td >".$unVoyage->getPrixUnBillet()."$ </td>
									";	
							echo "</tr>";	
						}
					?>   					
				</tbody>
			</table>
			</div>
		<div>
			<div class="container text-monospace ">
			<h1>Vol À  ajouter</h1>  
							<form class="justify-content-center" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=ajoutVol_2" method="post" >
								<div class='form-row'>
									<div class='text-center form-group col-md-6'>
										<label for='numeroVol'>Numéro de vol</label>
										<input type='number' class='form-control' name='numeroVol' placeholder='Numero de vol' required>
									</div>
									<div class='text-center form-group   col-md-6'>
										<label for='dateVoyage'>Date de départ</label><br>
										<input type="date" id="start" name="dateVoyage" value="" min="2000-01-01" max="2022-12-31" require>
									</div>
									<div class='text-center form-group   col-md-6'>
										<label for='inputPassword'>Places total</label>
										<input type='number' class='form-control' name='placeTotal' placeholder='Places total' required>
									</div>
									<div class='text-center form-group   col-md-6'>
										<label for='inputPassword'>Places vendu</label>
										<input type='number' class='form-control' name='placeVendu' placeholder='Places vendu' required>
									</div>
									
									<div class='text-center   align-self-center form-group   col-xs-1 ' >
										<label  for='prixVol'>prix par billet</label>
										<input type='number'  class='form-control' name='prixVol'  required>
									</div>
								</div>
								<div class='text-center'>
										<button type='submit' class='btn btn-warning m-1 '>Ajouter Vol</button>
								</div>
							</form>
							<form class="justify-content-center" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=ajoutVol_2" method="post" >
								<input type="hidden" name="formulaireRetour" value="true" />
								<div class="text-center">
									<input class="btn btn-danger " type="submit" value="Retour"/>
								</div>
							</form>
						
						</div>
					</div>
  				</div>
			</div>
		</div>


		<footer class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4">
			<?php
			include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php");
			?>
		</footer>		
	</body>
</html>
