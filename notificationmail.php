<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$idproche = $_GET['idproche'];
$notifmail = $_GET['notifmail'];

// Ecriture de la notification
$req = $bdd->prepare('UPDATE usersfriends SET notifmail = :notifmail WHERE id = :id ');
$req->execute(array(
	'id' => $idproche,
    'notifmail' => $notifmail,

	));

header('Location: fiche-proche.php?idproche='.$idproche);

?>