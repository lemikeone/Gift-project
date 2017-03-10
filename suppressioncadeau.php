<?php include("sessionstart.php"); ?>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Recuperation des données de proche
$idgift = $_GET['idgift'];

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersgifts WHERE id = :id ');
$req->execute(array(
	'id' => $idgift,

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>