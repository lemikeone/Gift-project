<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$idgift = $_GET['idgift'];

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersgifts WHERE id = :id ');
$req->execute(array(
	'id' => $idgift,

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>