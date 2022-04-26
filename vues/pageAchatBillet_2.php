<!--
  Projet  H2021 
  Noms    : IG
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Accueil</title>
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
		<div class="container text-monospace table-responsive-md">
			<h2>Achat de billet</h2>
		</div>

		<div class="container text-monospace table-responsive-md">
			<?php
				$tableauVoyage=$controleur->getVoyage();		
			?> 
			<div class="container text-monospace table-responsive-md">
				<h2 >Voyage: </h2> <br>
				
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
										<td >".$controleur->getDestination()."</td>
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
		
		<div class="container text-monospace table-responsive-md">
			
			<h2 >Nombre de billet: </h2> <br>
			<form  action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=achatBillet_2" method="post"  >
				<input type='number' id='voyage' name='nbrBillet' required  > <br><br>
				
				<input type='submit' value='Envoyer'>

			</form>
		<footer class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4">
			<?php
			include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php");
			?>
		</footer>
	</body>
</html>


