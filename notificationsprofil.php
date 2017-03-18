<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

if (isset($_GET['notifanniversaire'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notifanniversaire = :notifanniversaire WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notifanniversaire' => $_GET['notifanniversaire'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_GET['notifsaintvalentin'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notifsaintvalentin = :notifsaintvalentin WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notifsaintvalentin' => $_GET['notifsaintvalentin'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_GET['notiffetedesmeres'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notiffetedesmeres = :notiffetedesmeres WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notiffetedesmeres' => $_GET['notiffetedesmeres'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_GET['notiffetedesperes'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notiffetedesperes = :notiffetedesperes WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notiffetedesperes' => $_GET['notiffetedesperes'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_GET['notiffetedesgrandsmeres'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notiffetedesgrandsmeres = :notiffetedesgrandsmeres WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notiffetedesgrandsmeres' => $_GET['notiffetedesgrandsmeres'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_GET['notifnoel'])) {

// Ecriture de la notification
$req = $bdd->prepare('UPDATE users SET notifnoel = :notifnoel WHERE id = :id ');
$req->execute(array(
	'id' => $_SESSION['id'],
    'notifnoel' => $_GET['notifnoel'],

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}


?>