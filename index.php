<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>
<br/>
<?php 
include("menu.php");
include("header.php"); 

// Session
include("session.php");

?>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

// If connected
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

//Fonction to check next birthday
function get_next_birthday($birthday) {
    $date = new DateTime($birthday);
    $date->modify('+' . date('Y') - $date->format('Y') . ' years');
    if($date < new DateTime()) {
        $date->modify('+1 year');
    }

    return $date->format('Y-m-d');
}

$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY datedenaissance');
$reponse->execute(array($_SESSION['id']));

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{

?>
    <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?> (<?php echo $donnees['link']; ?>) : Son anniversaire est le <?php echo get_next_birthday($donnees['datedenaissance']); ?> et date de naissance : <?php echo $donnees['datedenaissance']; ?>
   <br><?php
   }
 }
?><br/><br/><?php
include("footer.php");
?>

</body>
</html>