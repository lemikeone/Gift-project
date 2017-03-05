<?php  
session_start();

include("menu.php");

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$birthdate = $_POST['birthdate'];
$link = $_POST['link'];

$req = $bdd->prepare('INSERT INTO usersfriends(nom, prenom, datedenaissance, iduser, link) VALUES(:nom, :prenom, :datedenaissance, :iduser, :link)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datedenaissance' => $birthdate,
	'iduser' => $_SESSION['id'],
	'link' => $link,

	));

echo 'Proche a été ajouté';

?>