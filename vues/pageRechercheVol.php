<!--
  Projet  H2021 
  Noms    : IG
-->
<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Voyages</title>
	<link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />

</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-light "><?php include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/head.inc.php");?>
    <div id="navbarNav" class="collapse navbar-collapse">
    <ul class="navbar-nav">
        <?php include_once (DOSSIER_BASE_INCLUDE."vues/fonctions_affichage/mes_fonctions.inc.php");
					$acteur=$controleur->getCategorieUtilisateur(); 
					afficherMenu($acteur);      ?>
    </ul>
    </div>
</nav>
<div> 
    <?php	
        afficherErreurs($controleur->getMessagesErreur()); 
        afficherSucces($controleur->getMessagesSucces());
    ?>
</div>
<div>
<div class="container text-monospace table-responsive-md">
    <?php
     $tableauVoyage=$controleur->getTableauVoyage(); 
    ?>
    <h1 class="text-center display-3 "><strong> RECHERCHER UN VOYAGE</strong></h1>            
</div>
<div class="container text-monospace table-responsive-md">
<div>
<form class="form" action="<?php echo DOSSIER_BASE_LIENS;?>/index.php?action=RechercheVol" method="post">
    <input type="hidden" name="formulaireRechercheVol" value="true" />
    <label>Prix max: </label><input type="number" clase="form-control" placeholder="prix max " name="prix_un_billet"/>
    <label>Code Infos: </label><input type="number" clase="form-control" placeholder="code infos " name="code_infos"/>
    <label>Pays:   </label> <input type="text" placeholder="nom du pays" name="titre"><br>
    <label>    Date de départ:   </label>  
    <input type="date" id="start" name="dateVoyage1" value="" min="2000-01-01" max="2022-12-31">
    <label>    Date de retour:   </label>
    <input type="date" id="start" name="dateVoyage2" value="" min="2000-01-01" max="2022-12-31" > <br>
    <div><input class="btn btn-warning" type="submit" name="submit" value="RechercherUn Vol"/> <br></div>
    
    </form>
</div>

<div class="p-4 text-left">
    <?php

    if ($tableauVoyage ==null){
        echo "<h4 class='alert-danger'>Aucun vol trouvé</h4>";
    }else{  
        foreach($tableauVoyage as $unVoyage) {
            echo "<br><div class='border border-secondary border-5 p-3 rounded'>";
           echo "<h1 class='display-5 p-3 mb-2 bg-secondary text-white text-uppercase'> #".$unVoyage->getInfos()." Voyage pour  <img src='".DOSSIER_BASE_LIENS."/images/".$controleur->getPhoto($unVoyage->getInfos())."' height='50px'/> <i>".$controleur->getDestination($unVoyage->getInfos()).":</i></h1><br>
            <p > Date de depart: ".$unVoyage->getLaDate()."<br>
            Prix de Billet: ".$unVoyage->getPrixUnBillet()." $<br>
            Nombre de places disponible: ".$unVoyage->getPlacesTotales()."<br>
            Agence de guide touristique: ".$controleur->getGuide($unVoyage->getInfos()) ."</p>";
            echo "</div>";}
        }?>   					
    
    </div>
    </div>	
    </div>     
            
<footer class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4">
	<?php include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php"); ?>
</footer>
			
</body>

</html>