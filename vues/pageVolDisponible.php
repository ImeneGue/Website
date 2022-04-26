<!--
  Projet  H2021 
  Noms    : Kevin Martinez-Bonilla
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Projet-Accueil</title>
	<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/projet.css" />

</head>

<body class="info">
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
		<!--
    <?php
        $tableauVoyage=$controleur->getTableauVoyage(); 
    ?>
		-->
		<!-- <img src='echo DOSSIER_BASE_INCLUDE.$controleur->getPhoto($unVoyage->getInfos());' alt=''> -->
    <h2 class="text-center">Voyage Disponible</h2>           
    <table class="table  table-dark table-striped">
        <thead>
            <tr>
                <th colspan="2" class="text-center " >Destination</th>
                <th class="text-center" >Numero de vol</th>
                <th class="text-center" >Date de depart</th>
                <th class="text-center" >Places restantes </th>
                <th class="text-center" >prix par billet</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tableauVoyage as $unVoyage) {
                    echo "<tr>";
                        echo"<td class='text-center'> <img height='50px' src='http://localhost/projet_h2021_g16/".$controleur->getPhoto($unVoyage->getInfos())."' alt='".$controleur->getDestination($unVoyage->getInfos())."'>  </td>
                            <td class='text-center'>".$controleur->getDestination($unVoyage->getInfos())."</td>
                            <td class='text-center'>".$unVoyage->getNumeroVoyage()."</td>
                            <td class='text-center'>".$unVoyage->getLaDate()."</td>
                            <td class='text-center'>".($unVoyage->calculerPlacesDisponibles())."</td>
                            <td class='text-center'>".$unVoyage->getPrixUnBillet()."$ </td>
                            ";	
                    echo "</tr>";	
                }
            ?>					
        </tbody>
    </table>
		
	

<footer
    class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4"
  >
			<?php
			include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php");
			?>
</footer>
	</div>		
</body>

</html>
