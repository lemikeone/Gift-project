<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$idproche = $_POST['idproche'];

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersfriends WHERE id = :id ');
$req->execute(array(
	'id' => $idproche,));

header('Location: liste-proches.php');
?>