<!--
  Projet  H2021 
  Noms    : IG
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Créer Compte</title>
	<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />
   
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light ">
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
<div class='container text-monospace text-center '>
<h1 class="text-center "><strong> CRÉER UN COMPTE</strong></h1>
</div>
<div class='container text-monospace text-center '>
<form  action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=creeCompte" method="post"  >
				<div class='form-row'>
					<div class=' form-group   col-md-6'>
						<label for='inputNom'>Nom</label>
						<input type='text' class='form-control' name='inputNom' placeholder='Nom' required >
					</div>
					<div class=' form-group  col-md-6'>
						<label for='inputPassword'>Mot de passe</label>
						<input type='password' class='form-control' name='mdp' placeholder='Password' required>
					</div>
					<?php
						echo "<div class=' form-group  col-md-6'>
							<label  for='inputId'>ID</label>
							<input type='text' value=".$controleur->getNextId()."  class='form-control' name='userID' disabled >
						</div>"
					?>
					<div class='  align-self-center form-group   col-xs-1 ' >
						<label  for='inputPassword4'>Téléphone</label>
						<input type='tel'  class='form-control' name='telephone' placeholder='123-456-7890' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required>
						<small>Format: xxx-xxx-xxxx</small>
					</div>
				</div>
				
				<div >
					<button type='submit' class='btn btn-warning m-1'>ouvrir une session</button>
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


