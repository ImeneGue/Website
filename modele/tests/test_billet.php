<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Billet          ---> 
<!---- Auteurs : Gabriel Boisvert                                --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Classe Billet test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe Billet</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe les classe  
		include_once "../billet.class.php"; 
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
						
						$unBillet=new Billet(1111,199,1111,$unVoyage);
						echo $unBillet;
					?>
				</td>
			</tr>
			<tr>
				<td>Accesseurs</td>
				<td>
					<?php
						echo $unBillet->getNumeroBillet()."<br/>";
						echo $unBillet->getPrixPaye()."<br/>";
						echo $unBillet->getIdAcheteur()."<br/>";
						echo $unBillet->getEvenement();
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
