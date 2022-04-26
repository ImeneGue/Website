<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe InfosVoyageDAO               ---> 
<!---- Auteurs :    Imene Guellil                                   --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Tests DAO Projet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe InfosVoyageDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe infosVoyageDAO 
		include_once "../DAO/InfosVoyageDAO.class.php"; 
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
				<td>chercher infosVoyage </td>
				<td>
					<?php 
                    $lesInfosVoyage=InfosVoyageDAO::chercher(104);
                    echo $lesInfosVoyage?$lesInfosVoyage:"Pas trouvé";
                    echo "<br/>";
                    $lesInfosVoyage=InfosVoyageDAO::chercher(204);
                    echo $lesInfosVoyage?$lesInfosVoyage:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercher avec filtre</td>
				<td>
					<?php 
                    $tableau=InfosVoyageDAO::chercherAvecFiltre("WHERE code_infos=101");
                    foreach($tableau as $lesInfosVoyage) {
                        echo $lesInfosVoyage."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>chercher tous</td>
				<td>
					<?php 
                    $tableau=InfosVoyageDAO::chercherTous();
                    foreach($tableau as $lesInfosVoyage) {
                        echo $lesInfosVoyage."<br/>";
                    }

					?>
				</td>
			</tr>
			<tr>
				<td>inserer un Voyage</td>
				<td>
					<?php 
                    $lesInfosVoyage=new InfosVoyage(999,'New York','../images/newyork.jpg','hrrps://newyorkTravels.com');
                    InfosVoyageDAO::inserer($lesInfosVoyage);
                    $lesInfosVoyage=InfosVoyageDAO::chercher(999);
                    echo $lesInfosVoyage?$lesInfosVoyage:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>modifier les infos voyages avec le code infos: 999</td>
				<td>
					<?php 
                    $lesInfosVoyage->setTitre('Toronto');
                    $lesInfosVoyage->setUrlPhoto('../images/toronto.jpg');
                    $lesInfosVoyage->setTourGuideInfo('https://Explore-toronto');
                    InfosVoyageDAO::modifier($lesInfosVoyage);
                    $lesInfosVoyage=InfosVoyageDAO::chercher(999);
                    echo $lesInfosVoyage?$lesInfosVoyage:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>supprimer 999</td>
				<td>
					<?php 
                    InfosVoyageDAO::supprimer($lesInfosVoyage);
                    $lesInfosVoyage=InfosVoyageDAO::chercher(999);
                    echo $lesInfosVoyage?$lesInfosVoyage:"Pas trouvé";

					?>
				</td>
			</tr>
			<tr>
				<td>obtenirProchainId </td>
				<td>
					<?php 
                    echo InfosVoyageDAO::obtenirProchainId();   

					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
