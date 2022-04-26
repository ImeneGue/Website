<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe infosVoyage          ---> 
<!---- Auteurs : Gabriel Boisvert                                --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Classe infosVoyage test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe infosVoyage</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe la classe infosVoyage 
		include_once "../infosVoyage.class.php"; 
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
						echo $unInfosVoyage;
					?>
				</td>
			</tr>
			<tr>
				<td>Accesseurs et mutateurs</td>
				<td>
					<?php
						echo $unInfosVoyage->getCodeInfos()."<br/>";
						echo $unInfosVoyage->getTitre()."<br/>";
						echo $unInfosVoyage->getUrlPhoto()."<br/>";
						echo $unInfosVoyage->getTourGuideInfo()."<br/>";

						$unInfosVoyage->setTitre("Japon");
						$unInfosVoyage->setUrlPhoto("../../images/Japon.jpg");
						$unInfosVoyage->setTourGuideInfo("Allo");
						

						echo "Une fois modifier <br/>";
						echo $unInfosVoyage->getTitre()."<br/>";
						echo $unInfosVoyage->getUrlPhoto()."<br/>";
						echo $unInfosVoyage->getTourGuideInfo();
						$unInfosVoyage->setUrlPhoto("../../images/tokyo.jpg");
					?>
				</td>
			</tr>
			<tr>
				<td>fonction afficherImage()<td>
					<?php
					$unInfosVoyage->afficherImage()
					?>
				</td>
			</tr>
			
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
