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
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>

<body class="accueil">
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
		?>
</div>
<div id="myCarousel" class="contenu carousel slide col-5" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active textP">
        <h1>EXPLOREZ LE <span>MONDE</span></h1>
    </div>

    <div class="carousel-item">
        <h3>Besoin de prendre l’air ? <br> Offrez-vous un week-end ou des vacances en Europe et partout dans le monde avec nos Voyages ! <br></h3>
    </div>

    <div class="carousel-item">
        <h3>RESTER, C'EST EXISTER,<br> <span> MAIS  
         VOYAGER C'EST VIVRE!  </span></h3> </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"></a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next"></a>
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


