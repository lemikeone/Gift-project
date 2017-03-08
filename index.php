<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); 

// Ouverture de la BDD
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

    // Calculate age of contact
    function age($date)
        {
        $dna = strtotime($date);
        $now = time();
         
        $age = date('Y',$now)-date('Y',$dna);
        if(strcmp(date('md', $dna),date('md', $now))>0) $age--;
       
        return $age;
        }


    setlocale(LC_TIME, 'fr_FR');

// On sort les anniversaires avant le 24/12 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) < "12-24" AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        $nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));
       ?>
        <div class="flux">
        

        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo (age($donnees['datedenaissance'])+1); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; 



        ?> 

        </div>

        <?php
         
        }

// On affiche Noël si on est avant le 24 décembre de l'année en cours 
if (date('m-d', time()) < "12-24") {
?>
<div class="flux">
<h2>Noël</h2>
<p><i class="fa fa-tree" aria-hidden="true"></i> Le 24 décembre</p>
</div>

<?php

}

// On sort les anniversaires après Noël  
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > "12-24" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        $nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));
       ?>
        <div class="flux">
        

        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo (age($donnees['datedenaissance'])+1); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; 



        ?> 

        </div>

        <?php
         
        }

// On affiche Noël si on est après le 24 décembre de l'année en cours 
if (date('m-d', time()) > "12-24") {
?>
<div class="flux">
<h2>Noël</h2>
<p><i class="fa fa-tree" aria-hidden="true"></i> Le 24 décembre</p>
</div>

<?php }

// On sort les anniversaires avant la date en cours   
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6)  ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        $nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));
       ?>
        <div class="flux">
        

        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo (age($donnees['datedenaissance'])+1); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; 



        ?> 

        </div>

        <?php
         
        }





        $reponse->closeCursor(); // Termine le traitement de la requête





// Fin du IF pour les personnes connectées
}
?>

<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>