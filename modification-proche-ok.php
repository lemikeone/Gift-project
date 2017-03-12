<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$birthdate = "004-".$_POST['mois']."-".$_POST['jour'];
$link = $_POST['link'];
$idproche = $_POST['idproche'];
$birthyear = $_POST['annee']."-01-01";
$postbirthyear = $_POST['annee'];
$mois = $_POST['mois'];
$jour = $_POST['jour'];

// creation du jour et mois suivant la requete
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE ID = ?');
 $reponse->execute(array($_POST['idproche']));
 // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        if (empty($_POST['mois']) AND empty($_POST['jour'])) {
        	$naissance = $donnees['datedenaissance'];
        	  }
        elseif (!empty($_POST['mois']) AND empty($_POST['jour'])) {
        	$naissance = "004-".$_POST['mois']."-".substr($donnees['datedenaissance'], 8);
        } 
        elseif (empty($_POST['mois']) AND !empty($_POST['jour'])) {
        	$naissance = "004-".substr($donnees['datedenaissance'], 5, 2)."-".$_POST['jour'];
        } 
        elseif (!empty($_POST['mois']) AND !empty($_POST['jour'])) {
        	$naissance = "004-".$_POST['mois']."-".$_POST['jour'];
        } 
        

        }

// Ecriture du proche
$req = $bdd->prepare('UPDATE usersfriends SET nom = IF(:nom = "", nom, :nom), prenom = IF(:prenom = "", prenom, :prenom), datedenaissance = IF(:datedenaissance = "", datedenaissance, :datedenaissance), anneenaissance = IF(:postbirthyear = "", anneenaissance, :anneenaissance), link = IF(:link = "", link, :link) WHERE id = :id ');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datedenaissance' => $naissance,
	'anneenaissance' => $birthyear,
	'link' => $link,
	'id' => $idproche,
	'postbirthyear' => $postbirthyear,

	));

header('Location: fiche-proche.php?idproche='.$idproche);

?>