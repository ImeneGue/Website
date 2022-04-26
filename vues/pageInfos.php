<?php if(!ISSET($controleur)) header("Location: ..\index.php");?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<title>Informations generales</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo DOSSIER_BASE_LIENS;?>/css/projet.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

<section class="info">
    <div class="container text-center text-monospace ">
    <h1>A propos de VOYAGE </h1>
<h5 class="text-justify"> L'agence VOYAGE vous proposent un large choix de week-end, moyens et longs séjours dans le monde, pour toutes vos envies de vacances.<br> Vous réservez votre voyage en ligne et vous choisissez l'agence de votre choix qui suivra votre dossier. </h5>
    </div>

<div class="container text-monospace table-responsive-md">
		<!--
    <?php
        $tableauVoyage=$controleur->getTableauVoyage();
        
    ?>
		-->
    <h2 >Voyage Disponible : </h2>         
    <table class="table table-light table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th colspan="2" >Destination</th>
                <th >Numéro de vol</th>
                <th >Date de départ</th>
                <th >Places restantes </th>
                <th >prix par billet</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach($tableauVoyage as $unVoyage) {
                    echo "<tr>";
                        echo "<td> <img src='".DOSSIER_BASE_LIENS."/images/".$controleur->getPhoto($unVoyage->getInfos())."' class='imagePays'/>
                            <td >".$controleur->getDestination($unVoyage->getInfos())."</td>
                            <td >".$unVoyage->getNumeroVoyage()."</td>
                            <td >".$unVoyage->getLaDate()."</td>
                            <td >".($unVoyage->calculerPlacesDisponibles())."</td>
                            <td >".$unVoyage->getPrixUnBillet()."$ </td>
                            ";	
                    echo "</tr>";	
                }
            ?>   					
        </tbody>
    </table>
    </div>
<div>
<p class="container col-md-6 w3-panel w3-pale-red w3-leftbar w3-border-red text-left">
  <strong>NOTE IMPORTANTE:<br></strong>  À cause des circonstances actuelles liées au Covid-19, les dates des vols sont sujettes à changement. Pour tous changement de date ou remboursement des billets, veuillez nous contacter au (514) 999 9999.
  <br>Merci pour votre compréhension
</p>
    </div>
    <section class="createurs"> 
    <div class='container text-monospace mx-auto mt-5 col-md-10 mt-100'>
            <div class="header">
                <div class="titre">Créateurs du site:</div>
                <p><small class="text-muted">projet session d'hiver 2021 group 16 <br /><u>Cours:</u> Applications mobile et web 1 <br><u>Proffeseur:</u> Pierre Coutu </p>
            </div>
            <div class="row" style="justify-content: center">
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile">
                            <i class='fas fa-user-graduate' ></i>
                        </div>
                            <div class="card-title">Boisvert Gabriel<br /> <small>Gérant</small> </div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted"> <a href="https://www.linkedin.com/" target="_blank"> Voici mon LinkedIn </a></small> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile"> 
                            <i class='fas fa-user-graduate' ></i>
                            </div>
                            <div class="card-title">Guellil Imene<br /> <small>Gérante</small> </div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted"> <a href="https://www.linkedin.com/" target="_blank"> Voici mon LinkedIn </a> </small> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile">
                            <i class='fas fa-user-graduate' ></i>
                            </div>
                            <div class="card-title">Martinez-Bonilla Kevin<br /> <small>Gérant</small> </div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted"><a href="https://www.linkedin.com/" target="_blank"> Voici mon LinkedIn </a> </small> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
				
        </section> 
</section>

<section class="createurs"> 
    <div class='container text-monospace mx-auto mt-5 col-md-10 mt-100'>
            <div class="header">
                <div class="titre">Statistique du site:</div>
            </div>
            <div class="row" style="justify-content: center">
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile">
                        </div>
                            <div class="card-title"> <br />  Nombre de vol disponible:     </div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted"> <?php echo $controleur->getNombreVol(); ?></small> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile"> 
                            
                            </div>
                            <div class="card-title"> <br />  Prix moyen vol</div>
                            <div class="card-subtitle">
                                <p> <small class="text-muted"> <?php echo $controleur->getPrixMoyen(); ?></small> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 mt-100">
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="profile">
                            
                            </div>
                            <div class="card-title"> <br />  Nb de billet vendu </div>
                            <div class="card-subtitle">
                            <p> <small class="text-muted"> <?php echo $controleur->getNbBilletVendu(); ?></small> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
				
        </section> 
</section> 



<footer
    class="page-footer navbar-fixed-bottom text-center py-3 font-small pt-4"
  >
			<?php
			include (DOSSIER_BASE_INCLUDE."vues/inclusions_html/bas_page.inc.php");
			?>
</footer>
	

    
</body>

</html>


