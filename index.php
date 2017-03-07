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

// Bonjour pseudo

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

      $reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        $nextbirthday = get_next_birthday($donnees['datedenaissance']);
        $duree = floor((strtotime($nextbirthday) - time()));?>
        <div class="flux">
        <h2><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></a></h2>
        <p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo age($donnees['datedenaissance']); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i>
 Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; ?> 
        </div>

        <?php
        }
    }

?>
<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>