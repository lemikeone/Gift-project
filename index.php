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

// On sort les anniversaires avant le 14/02 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= "02-14" AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Saint-Valetin si on est avant le 14 Février de l'année en cours 
if (date('m-d', time()) <= "02-14") {
    include("feed-saint-valentin.php");
    }

// On sort les anniversaires après le 14/02 avant le 24/12 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) > "02-24" AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) > SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

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

// On sort les anniversaires avant la date en cours (donc de l'année suivant) et avant la Saint Valentin
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "02-14" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Noël si on est après le 24 décembre de l'année en cours 
if (date('m-d', time()) > "02-14") {
include("feed-saint-valentin.php");
}

        // On sort les anniversaires avant la date en cours (donc de l'année suivant) et avant Noël et après la saint valentin
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) > "02-14" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

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