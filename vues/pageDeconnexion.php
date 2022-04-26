<!--
  Projet  : 
  Noms    : 
-->
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Page de connexion</title>
	<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />

</head>
<body >
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

<div class='container text-monospace text-center p-3 '>
			<h1 >déconnexion?</h1>
</div>
<div class='container text-monospace text-center  '>
        <div class="card-body p-5">
            <?php
            echo "<h3> USER avec ID: ".$controleur->getidUtilisateur()."</h3>";
            ?>
            <p class="card-text"> Êtes-vous sure de vouloir vous déconnecter?</p>
            <form class="justify-content-center" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seDeconnecter" method="post" >
            <input type="hidden" name="formulaireDeconnexion" value="true" />
            <input class="btn btn-danger " type="submit" value="Confirmer"/>
            </form>
        </div>
    </div>
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
