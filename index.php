<?php
$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');
$reponse = $bdd->query('SELECT * FROM usersfriends');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <?php echo $donnees['prenom']; ?> <?php echo $donnees['Nom']; ?> est née le <?php echo $donnees['datedenaissance']; ?> 
   </p><?php
   }

?>