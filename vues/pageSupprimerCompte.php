<!--
  Projet  H2021 
  Noms    : IG
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Suprrimer compte</title>
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
          $tableauUtilisateur=$controleur->getInfoUtilisateur();
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
<div class="container text-monospace table-responsive-md text-center">
<h2 class="text-uppercase">Tableau des utilisateurs: </h2> 
</div> 
<div class='container text-monospace text-center  '>         
		<table class=" table table-light table-striped table-hover p-3">
        	<thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Numéro de téléphone</th>
                    <th>Solde</th>
                    <th>Type de compte</th>

                </tr>
				</thead>

				<tbody>
                <?php
                    foreach($tableauUtilisateur as $unUtilisateur) {
                        echo "<tr>";
                            if($unUtilisateur->getCategorie()=="acheteur"){
                                echo "<td>".$unUtilisateur->getIdUtilisateur()."</td>";
                                echo "<td>".$controleur->getInfoAcheteur($unUtilisateur->getIdUtilisateur())->getNom()."</td>";	
                                echo "<td>".$controleur->getInfoAcheteur($unUtilisateur->getIdUtilisateur())->getTelephone()."</td>";	
                                echo "<td>".$controleur->getInfoAcheteur($unUtilisateur->getIdUtilisateur())->getSolde()."</td>";
                                echo "<td>".$unUtilisateur->getCategorie()."</td>";	
                            }
                        echo "<tr>";
                    }
                ?>					
				</tbody>
			</table>
</div>
                    </div>
			<div class="container text-monospace table-responsive-md">
			<h2>Quel utilisateur voulez-vous supprimer?</h2> 
            </div>
            <div class="container text-monospace table-responsive-md">
					<p class="card-text text-center">Sélectionner un id</p>
					<form class="justify-content-center " action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=supprimerCompte" method="post" >
						 <input type="hidden" name="formulaireSuppresion" value="true" />
						<div class="text-center" >
							
							<select class="form-control " name="id_utilisateur"  >
								<?php
										foreach($tableauUtilisateur as $unUtilisateur) {							
										if($unUtilisateur->getCategorie()=="acheteur"){
											echo "<option '>".$unUtilisateur->getIdUtilisateur()."</option>";
                                            
                                        };
									}
								?>
							</select>
						</div>
						<div class="text-center m-3 ">
							<input class="btn btn-danger " type="submit" value="Supprimer"/>
						</div>
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


