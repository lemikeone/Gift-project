<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche (On eleve les paramètres des URL au passage)
$url = $url = strtok($_POST['url'], '?');
$userid = $_POST['userid'];

if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    // Ecriture du proche
$req = $bdd->prepare('INSERT INTO usersgifts(userid, url) VALUES(:userid, :url)');
$req->execute(array(
	'userid' => $userid,
	'url' => $url,
	));

header('Location: ' . $_SERVER['HTTP_REFERER']."?ajout=true");
} 

else {
    echo("$url n'est pas une adresse web valide");
}

?>