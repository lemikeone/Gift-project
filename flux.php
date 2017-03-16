<?php

    //Fonction to check next birthday
    function get_next_birthday($birthday) {
        $date = new DateTime($birthday);
        $date->modify('+' . date('Y') - $date->format('Y') . ' years');
        $dateplus = new DateTime();
        $dateplus->modify('-1 day');
        if($date < $dateplus) {
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
include("fetedesperes.php");
include("fetedesgrandsmeres.php");

// On sort les anniversaires avant le 14/02 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) <= "02-14" AND SUBSTR(`datedenaissance`,6) >= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Saint-Valentin si on est avant le 14 Février de l'année en cours 
if (date('m-d-Y', time()) < "02-14-".date('Y', time())) {
    ?><div class="flux love">
<h2>Saint-Valentin</h2>
 <p><i class="fa fa-heart" aria-hidden="true"></i>  <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime(date('Y', time())."-02-14"))); 
 ?> 

<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime(date('Y', time())."-02-14") - time())/86400)+1; echo " jours</p>"; ?>


  </div> <?php
    }

// On sort les anniversaires après le 14/02 avant la fête des grandmeres ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > "02-14" AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) >= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($FeteDesGrandsMeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est avant la fete des grandsmeres 
if (date('m-d', time()) <= substr($FeteDesGrandsMeres, -5)) {
   ?><div class="flux">
<h2>Fête des Grands Mères</h2>

<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($FeteDesGrandsMeres))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($FeteDesGrandsMeres) - time())/86400)+1; echo " jours</p>"; ?>

</div><?php
    }

// On sort les anniversaires après la fete des grandsmeres avant la fête des meres ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) >= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($FeteDesGrandsMeres, -5), substr($feteDesMeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est avant la fete des meres de l'année en cours 
if (date('m-d', time()) <= substr($feteDesMeres, -5)) {
    ?>
    <div class="flux">
<h2>Fête des mères</h2>
<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($feteDesMeres))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($feteDesMeres) - time())/86400)+1; echo " jours</p>"; ?>
</div><?php
    }

// On sort les anniversaires après la fête des meres avant la fête des pères ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) >= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres, -5), substr($feteDesPeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche le fete des pères si on est avant la fete des peres de l'année en cours 
if (date('m-d', time()) <= substr($feteDesPeres, -5)) {
    ?><div class="flux">
<h2>Fête des pères</h2>

<p><i class="fa fa-male" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($feteDesPeres))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($feteDesPeres) - time())/86400)+1; echo " jours</p>"; ?>

</div><?php
    }

// On sort les anniversaires après la fête des pères avant le 24/12 ET après la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) >= SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesPeres, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche Noël si on est avant le 24 décembre de l'année en cours 
if (date('m-d-Y', time()) < "12-24-".date('Y', time())) {
    ?><div class="flux">
<h2>Noël</h2>
 <p><i class="fa fa-tree" aria-hidden="true"></i>  <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime(date('Y', time())."-12-24"))); 
 ?> 

<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime(date('Y', time())."-12-24") - time())/86400)+1; echo " jours</p>"; ?>


  </div> <?php
    }

// On sort les anniversaires après Noël dans l'année en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > "12-24" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php"); 
        }

// On sort les anniversaires avant la date en cours (donc de l'année suivante) et avant la Saint Valentin
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) = SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "02-14" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche on affiche la saint valentin si on est déjà après la saint valentin de l'année en cours 
if (date('m-d-Y', time()) > "02-14-".date('Y', time())) {
    ?><div class="flux">
<h2>Saint-Valentin</h2>
 <p><i class="fa fa-heart" aria-hidden="true"></i>  <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime((date('Y', time())+1)."-02-14"))); 
 ?> 

<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime((date('Y', time())+1)."-02-14") - time())/86400)+1; echo " jours</p>"; ?>


  </div> <?php
    }

// On sort les anniversaires après le 14/02 avant la fête des grandsmeres ET avant la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > "02-14" AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) = SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($FeteDesGrandsMeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est après la date de la fête des mères de l'année suivante
if (date('m-d', time()) > substr($FeteDesGrandsMeres2, -5)) {
     ?><div class="flux">
<h2>Fête des Grands Mères</h2>

<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($FeteDesGrandsMeres2))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($FeteDesGrandsMeres2) - time())/86400)+1; echo " jours</p>"; ?>

</div><?php
    }
// On sort les anniversaires après la fête des grands meres avant la fête des meres ET avant la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($FeteDesGrandsMeres2, -5), substr($feteDesMeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est après la date de la fête des mères de l'année suivante
if (date('m-d', time()) > substr($feteDesMeres2, -5)) {
    ?><div class="flux">
<h2>Fête des mères</h2>

<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($feteDesMeres2))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($feteDesMeres2) - time())/86400)+1; echo " jours</p>"; ?>
</div><?php
    }

    // On sort les anniversaires après la fête des mères avant la fête des pères ET avant la date en cours
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) > ? AND SUBSTR(`datedenaissance`,6) <= ? AND SUBSTR(`datedenaissance`,6) = SUBSTR(CURDATE(),6) ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesMeres2, -5), substr($feteDesPeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }

// On affiche fête des mères si on est après la date de la fête des pères de l'année suivante
if (date('m-d', time()) > substr($feteDesPeres2, -5)) {
    ?><div class="flux">
<h2>Fête des pères</h2>

<p><i class="fa fa-female" aria-hidden="true"></i> <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($feteDesPeres2))); ?> </p>
<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime($feteDesPeres2) - time())/86400)+1; echo " jours</p>"; ?>

</div><?php
    }



        // On sort les anniversaires avant la date en cours (donc de l'année suivant) et avant Noël et après la fête des Pères
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) <= SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) <= "12-24" AND SUBSTR(`datedenaissance`,6) > ? ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id'], substr($feteDesPeres2, -5)));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
        include("feed-proches.php");
        }


// On affiche Noël si on est après le 24 décembre de l'année en cours 
if (date('m-d-Y', time()) > "12-24-".date('Y', time())) {
    ?><div class="flux">
<h2>Noël</h2>
 <p><i class="fa fa-tree" aria-hidden="true"></i>  <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime((date('Y', time())+1)."-12-24"))); 
 ?> 

<?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i> Dans ', floor((strtotime((date('Y', time())+1)."-12-24") - time())/86400)+1; echo " jours</p>"; ?>


  </div> <?php
    }

// On sort les anniversaires avant la date en cours et apres Noël
$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? AND datedenaissance != 0000-00-00 AND SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6) AND SUBSTR(`datedenaissance`,6) > "12-24" ORDER BY CONCAT(SUBSTR(`datedenaissance`,6) < SUBSTR(CURDATE(),6), SUBSTR(`datedenaissance`,6))');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {
         include("feed-proches.php");
        }





        $reponse->closeCursor(); // Termine le traitement de la requête




?>