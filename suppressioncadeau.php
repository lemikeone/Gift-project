<?php include("sessionstart.php"); ?>
<?php

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Recuperation des données de proche
$idgift = $_GET['idgift'];


// Securité
$reponse = $bdd->prepare('
        SELECT usersgifts.ID giftid, usersgifts.procheid procheidgift, usersgifts.userid useridgift, usersfriends.iduser useridproche, usersfriends.ID ID
        FROM usersgifts
        LEFT JOIN usersfriends
        ON usersgifts.procheid = usersfriends.ID
        WHERE usersgifts.ID = ?
        ');

$reponse->execute(array($idgift));
$donnees = $reponse->fetch();

if ($donnees['useridproche'] == $_SESSION['id']) {

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersgifts WHERE id = :id ');
$req->execute(array(
	'id' => $idgift,

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

elseif ($donnees['useridgift'] == $_SESSION['id']) {

// Ecriture du proche
$req = $bdd->prepare('DELETE FROM usersgifts WHERE id = :id ');
$req->execute(array(
	'id' => $idgift,

	));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}

else {
	
	echo "Erreur de suppression"; echo "<br>useridgift";
	echo $donnees['useridgift']; echo "<br>id";
	echo $_SESSION['id'];

}

?>