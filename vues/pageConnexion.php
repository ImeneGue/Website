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
        <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
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
		
<div class="container text-monospace ">

<h1 class="text-center "><strong> SE CONNECTER</strong></h1>
</div>
<div class="container text-monospace table-responsive-md">
					<form class="justify-content-center" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=seConnecter" method="post" >
						<p class="card-text text-center">Nom d'utilisateur :</p>
						<input type="text" class="form-control" placeholder="Entrer nom d'utilisateur"  name="id_utilisateur" required />
						<p class="card-text text-center">Mot de passe :</p>
						<input type="password" class="form-control" placeholder="Entrer mot de passe" name="mot_passe" required />
						<div class="text-center m-3 ">
							<input class="btn btn-warning " type="submit" value="Connexion"/>
						</div>
					</form>
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
