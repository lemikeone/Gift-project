<?php

// Session
include("session.php");
include("menu.php");

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// If connected
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

$reponse = $bdd->prepare('SELECT * FROM usersfriends  WHERE iduser = ?');
$reponse->execute(array($_SESSION['id']));

//Fonction to check next birthday
function get_next_birthday($birthday) {
    $date = new DateTime($birthday);
    $date->modify('+' . date('Y') - $date->format('Y') . ' years');
    if($date < new DateTime()) {
        $date->modify('+1 year');
    }

    return $date->format('Y-m-d');
}

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{

?>
    <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?> : Son anniversaire est le <?php echo get_next_birthday($donnees['datedenaissance']); ?>
   <br><?php
   }
 }

include("connexion.php");
?>