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
$idproche = $_POST['idproche'];

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersfriends WHERE id = :id ');
$req->execute(array(
	'id' => $idproche,

	));

echo 'Proche a été Supprimé';

include("footer.php");
?>

</body>
</html>