<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Voyage          ---> 
<!---- Auteurs : Gabriel Boisvert                                --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Classe Voyage test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe infosVoyage</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe la classe infosVoyage et Voyage
		include_once "../infosVoyage.class.php"; 
		include_once "../voyage.class.php";
	?>

	<!---- Utilisation et affichage des méthodes -->
	<table>
		<thead>
			<tr>
				<th>Méthode</th>
				<th>Résultat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Constructeur et affichage </td>
				<td>
					<?php 
						$unInfosVoyage=new InfosVoyage(1991,'tokyo','../../images/tokyo.jpg',"Un tour guidé du centre ville de Tokyo");
						$unVoyage=new Voyage(1323,"12/12/2021",1444,1000,500,$unInfosVoyage);
						echo $unVoyage;
						
					?>
				</td>
			</tr>
			<tr>
				<td>Accesseurs et mutateurs</td>
				<td>
					<?php
						echo $unVoyage->getNumeroVoyage()."<br/>";
						echo $unVoyage->getLaDate()."<br/>";
						echo $unVoyage->getPrixUnBillet()."<br/>";
						echo $unVoyage->getPlacesTotales()."<br/>";
						echo $unVoyage->getPlacesVendues()."<br/>";
						echo $unVoyage->getInfos()."<br/>";

						$unVoyage->setPrixUnBillet(50);
						$unVoyage->setLaDate("12/12/2050");
						echo $unVoyage;
					?>
				</td>
			</tr>
			<tr>
				<td>fonctions calculerPlacesDisponibles() et vendreDesPlaces()<td>
					<?php
					$unVoyage->vendreDesPlaces(200);
					echo $unVoyage->calculerPlacesDisponibles()."<br/>";
					$unVoyage->vendreDesPlaces(500);
					echo"<br/>";
					$unVoyage->vendreDesPlaces(300);
					
					$unVoyage->vendreDesPlaces(1);
					echo"<br/>";
					echo $unVoyage->calculerPlacesDisponibles();

					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
