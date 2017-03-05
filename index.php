<?php
include("session.php");
$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');
$reponse = $bdd->query('SELECT * FROM usersfriends');

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
    <p>
    <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?> : Son anniversaire est le <?php echo get_next_birthday($donnees['datedenaissance']); ?>
   </p><?php
   }

include("connexion.php");

include("logout.php");
?>