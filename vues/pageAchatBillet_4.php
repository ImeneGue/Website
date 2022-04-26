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

	<?php
		$tableauVoyage=$controleur->getTableauBillet();
	?>
	<div>
		<h2 >Confirmation: </h2>                 
		<table class="table table-light table-striped table-hover">
			<thead class="table-dark">
				<tr>
					<th>ID billet </th>
					<th>Acheteur</th>
					<th>Numero de vol</th>
					<th>prix par billet</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($tableauVoyage as $unbillet) {
						echo "<tr>
							<td >".$unbillet->getNumeroBillet()."</td>
							<td >".$unbillet->getIdAcheteur()."</td>
							<td >".$unbillet->getEvenement()."</td>
							<td >".$unbillet->getPrixPaye()."$ </td>
							<br>
							";	
						echo "</tr>";	
					}
					?>   					
			</tbody>
			<tfoot  class="table-dark">
				<tr>
				<td  colspan="3" class=" text-right" >Prix Total:</td>
				<?php
				echo "<td class='text-left' >".$controleur->getPrix()." $ </td>"
				?>
				</tr>
			</tfoot>
		</table>
			<p>Solde du compte:   
			<?php
				echo "<td>".$controleur->getSolde()." $ </td>"
				?>
			</p>
		<form  action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=achatBillet_4" method="post"  >
			<input type="hidden" name="formulaireAchatVol" value="true" />
			<input type='submit' value='Finaliser'>
		</form>
	</div>
</div>

<footer
    class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4"
  >
			<?php
			include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php");
			?>
</footer>
	

  

</body>

</html>


