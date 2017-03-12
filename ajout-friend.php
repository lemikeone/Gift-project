<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$birthdate = "0004-".$_POST['mois']."-".$_POST['jour'];
$link = $_POST['link'];
$birthyear = $_POST['annee']."-01-01";

// Ecriture du proche
$req = $bdd->prepare('INSERT INTO usersfriends(nom, prenom, datedenaissance, anneenaissance, iduser, link) VALUES(:nom, :prenom, :datedenaissance, :anneenaissance, :iduser, :link)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datedenaissance' => $birthdate,
	'anneenaissance' => $birthyear,
	'iduser' => $_SESSION['id'],
	'link' => $link,
	));

header('Location: liste-proches.php');

?>