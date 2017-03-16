<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche (On eleve les paramètres des URL au passage)
$url = $url = strtok($_POST['url'], '?');
$idproche = $_POST['idproche'];

if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    // Ecriture du proche
$req = $bdd->prepare('INSERT INTO usersgifts(procheid, url) VALUES(:procheid, :url)');
$req->execute(array(
	'procheid' => $idproche,
	'url' => $url,
	));

header('Location: ' . $_SERVER['HTTP_REFERER']."?ajout=true");
} 

else {
    echo("$url n'est pas une adresse web valide");
}

?>