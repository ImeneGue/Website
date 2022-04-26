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
			<div class="container text-monospace table-responsive-md"> 
			<h1 class="text-uppercase" >Vol À ajouter</h1>
            </div>
            <div class="container text-monospace text-center table-responsive-md">   
							<h4 class="card-title ">
								Quel est le code de la destination?
							</h4>
							<form class="justify-content-center" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=ajoutVol" method="post" >
								<input type="hidden" name="formulaireAjoutVol" value="true" />
								<div >
									
									<label for='inputPrenom'>Entrer le code de destination :</label><br>

									<input class="text-center"  type='number' class='form-control' name='inputCode'  required>
								</div>
								<div class="m-3 ">
									<input class="btn btn-warning " type="submit" value="Entrer"/>
								</div>
							</form>
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
