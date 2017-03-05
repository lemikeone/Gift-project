<?php  
session_start();

include("menu.php");

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$birthdate = $_GET['birthdate'];

$req = $bdd->prepare('INSERT INTO usersfriends(nom, prenom, datedenaissance, iduser) VALUES(:nom, :prenom, :datedenaissance, :iduser)');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datedenaissance' => $birthdate,
	'iduser' => $_SESSION['id'],
	));

echo 'Proche a été ajouté';

?>