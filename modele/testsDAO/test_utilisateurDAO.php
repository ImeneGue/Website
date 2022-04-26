<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe UtilisateurDAO    ---> 
<!---- Auteurs : Pierre Coutu                                    --->
<!------------------------------------------------------------------>
<html lang="fr">
<head>
	<title>Labo5 test</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../css/tests.css">
</head>
<body >

	<!---- Création d'un accessoire ---->
	<h1>Fichier de test pour la classe UtilisateurDAO</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe UtilisateurDAO 
		include_once("../DAO/UtilisateurDAO.class.php"); 
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
				<td>chercher(104) ... trouvé <br/>chercher(204) ... pas trouvé</td>
				<td>
					<?php 

						$unUtilisateur=UtilisateurDAO::chercher(1);
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
						echo "<br/>";
						$unUtilisateur=UtilisateurDAO::chercher(2);
						echo $unUtilisateur?$unUtilisateur:"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>chercherTous()</td>
				<td>
					<?php
						$tableau=UtilisateurDAO::chercherTous();
						foreach($tableau as $unUtilisateur) {
							echo $unUtilisateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>chercherAvecFiltre(...) pour administrateur</td>
				<td>
					<?php
						$tableau=UtilisateurDAO::chercherAvecFiltre("WHERE categorie='administrateur'");
						foreach($tableau as $unUtilisateur) {
							echo $unUtilisateur."<br/>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>inserer(...) un Utilisateur #555 </td>
				<td>
					<?php
						$unUtilisateur=new Utilisateur(555,'abc123','administrateur');
						UtilisateurDAO::inserer($unUtilisateur);
						$unUtilisateur=UtilisateurDAO::chercher(555);
						echo $unUtilisateur?"$unUtilisateur(".$unUtilisateur->getMotPasse().")":"Pas trouvé";
					?>
				</td>
			</tr>
			<tr>
				<td>modifier(...) le même utilisateur </td>
				<td>
					<?php
						$unUtilisateur->setMotPasse("def456");
						UtilisateurDAO::modifier($unUtilisateur);
						$unUtilisateur=UtilisateurDAO::chercher(555);
						echo $unUtilisateur?"$unUtilisateur(".$unUtilisateur->getMotPasse().")":"Pas trouvé";
					?>
				</td>
			</tr>

			<tr>
				<td>supprimer(...) ce même utilisateur</td>
				<td>
					<?php
						UtilisateurDAO::supprimer($unUtilisateur);
						$unUtilisateur=UtilisateurDAO::chercher(555);
						echo $unUtilisateur?"$unUtilisateur(".$unUtilisateur->getMotPasse().")":"Pas trouvé";
					?>
				</td>
			</tr>

			<tr>
				<td>prochainId</td>
				<td>
					<?php
						echo UtilisateurDAO::obtenirProchainId();
					?>
				</td>
			</tr>
		</tbody>
	</table>

	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
