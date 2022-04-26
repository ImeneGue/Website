<!--
  Projet  H2021 
  Noms    : IG
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>modifierCompte</title>
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
<div class="container text-center text-monospace ">
<h2>Modifier Compte</h2>
</div>
<div class="container text-center text-monospace ">
	<form action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=modifierCompte" method="post">
		<p>Entrer votre # téléphone à modifier :</p>
		
		<input type='tel' id="lname" name='telephone' placeholder='123-456-7890' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}'>
 		
	
		<p>Entrer le montant que vous voulez payer :</p>
		<input type="number" id="montant" name="montant" min="1" > <br><br>
 		<input type="submit" class="btn btn-warning" value="Envoyer">
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

