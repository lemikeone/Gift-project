<?php

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Recuperation des données de proche
$idproche = $_POST['idproche'];

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersfriends WHERE id = :id ');
$req->execute(array(
	'id' => $idproche,));

header('Location: liste-proches.php');
?>