<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>

<body>
<br/>

<?php include("menu.php"); ?>
<?php include("header.php"); ?>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Recuperation des données de proche
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$birthdate = $_POST['birthdate'];
$link = $_POST['link'];
$idproche = $_POST['idproche'];

// Ecriture du proche
$req = $bdd->prepare('UPDATE usersfriends SET nom = IF(:nom = "", nom, :nom), prenom = IF(:prenom = "", prenom, :prenom), datedenaissance = IF(:datedenaissance = "", datedenaissance, :datedenaissance), link = IF(:link = "", link, :link) WHERE id = :id ');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'datedenaissance' => $birthdate,
	'link' => $link,
	'id' => $idproche,

	));

echo 'Proche a été mis à jour';

include("footer.php");
?>

</body>
</html>