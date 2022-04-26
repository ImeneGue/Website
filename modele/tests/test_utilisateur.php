<!DOCTYPE html>
<!------------------------------------------------------------------>
<!---- Projet  : H2021                                           --->
<!---- Fichier de test unitaire pour la classe Utilisateur       ---> 
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
	<h1>Fichier de test pour la classe Utilisateur</h1>
	<?php
		// ****** INLCUSIONS *******
		// Importe l'interface DAO et la classe Utilisateur 
		include_once "../utilisateur.class.php"; 
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
				<td>Constructeur et affichage (100,root,administrateur)</td>
				<td>
					<?php 
						$unUtilisateur=new Utilisateur(100,'root','administrateur');
						echo $unUtilisateur;
					?>
				</td>
			</tr>
			<tr>
				<td>Accesseurs</td>
				<td>
					<?php
						echo $unUtilisateur->getIdUtilisateur()."<br/>";
						echo $unUtilisateur->getMotPasse()."<br/>";
						echo $unUtilisateur->getCategorie();
					?>
				</td>
			</tr>
			<tr>
				<td>Vérificateur mot de passe : Bon <br/>Pas bon</td>
				<td>
					<?php
						echo $unUtilisateur->verifierMotPasse('root')?"Bon":"Pas bon";
						echo "<br/>";
						echo $unUtilisateur->verifierMotPasse('groot')?"Bon":"Pas bon";
					?>
				</td>
			</tr>
			<tr>
				<td>Modifier mot de passe : groot</td>
				<td>
					<?php
						$unUtilisateur->setMotPasse('groot');
						echo $unUtilisateur->getMotPasse();
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<!---- Retour au fichier d'accueil -->
	<h2><a href="../../index.php">Retour à la page d'accueil</a></h2>
</body>
</html>
