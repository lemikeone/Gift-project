<?php include("sessionstart.php"); ?>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Recuperation des données de proche
$url = $_POST['url'];
$idproche = $_POST['idproche'];

if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    // Ecriture du proche
$req = $bdd->prepare('INSERT INTO usersgifts(procheid, url) VALUES(:procheid, :url)');
$req->execute(array(
	'procheid' => $idproche,
	'url' => $url,
	));

header('Location: ' . $_SERVER['HTTP_REFERER']);
} 

else {
    echo("$url n'est pas une adresse web valide");
}

?>