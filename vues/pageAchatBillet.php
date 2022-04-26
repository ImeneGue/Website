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
	
		<h3>Quel billet voulez-vous acheter : (# Vol)</h3>
		<form  action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=achatBillet" method="post"  >
			<input type='number' id='voyage' name='idVoyage' require> <br><br>
			<input type='submit' value='Envoyer'>
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


