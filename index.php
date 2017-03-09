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
?>
<div class="container containerflux">
<?php
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


include("fetedesmeres.php");

// On sort les anniversaires avant le 14/02 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= "02-14" AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Saint-Valentin si on est avant le 14 Février de l'année en cours 
if (date('m-d', time()) <= "02-14") {
    include("feed-saint-valentin.php");
    }

// On sort les anniversaires après le 14/02 avant la fête des meres ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > "02-14" AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est avant le 14 Février de l'année en cours 
if (date('m-d', time()) <= $feteDesMeres) {
    ?><div class="flux">
<h2>Fête des mères</h2>
<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo $feteDesMeres; ?></p>
</div><?php
    }

// On sort les anniversaires après la fête des meres avant le 24/12 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Noël si on est avant le 24 décembre de l'année en cours 
if (date('m-d', time()) <= "12-24") {
    include("feed-noel.php");
    }

// On sort les anniversaires après Noël dans l'année en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > "12-24" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php"); 
        }

// On sort les anniversaires avant la date en cours (donc de l'année suivante) et avant la Saint Valentin
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "02-14" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche on affiche la saint valentin si on est déjà après la saint valentin de l'année en cours 
if (date('m-d', time()) > "02-14") {
include("feed-saint-valentin.php");
}


// On sort les anniversaires après le 14/02 avant la fête des meres ET avant la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > "02-14" AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est après la date de la fête des mères de l'année suivante
if (date('m-d', time()) > $feteDesMeres2) {
    ?><div class="flux">
<h2>Fête des mères</h2>
<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo $feteDesMeres; ?></p>
</div><?php
    }

        // On sort les anniversaires avant la date en cours (donc de l'année suivant) et avant Noël et après la fête des mères
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) > ? ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Noël si on est après le 24 décembre de l'année en cours 
if (date('m-d', time()) > "12-24") {
include("feed-noel.php");
}

// On sort les anniversaires avant la date en cours et apres Noël
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) > "12-24" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
         include("feed-proches.php");
        }





        $reponse->closeCursor(); // Termine le traitement de la requête





// Fin du IF pour les personnes connectées
}
?>

<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>