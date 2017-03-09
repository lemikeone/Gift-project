<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<script>
  (function(w, d){
   var id='embedly-platform', n = 'script';
   if (!d.getElementById(id)){
     w.embedly = w.embedly || function() {(w.embedly.q = w.embedly.q || []).push(arguments);};
     var e = d.createElement(n); e.id = id; e.async=1;
     e.src = ('https:' === document.location.protocol ? 'https' : 'http') + '://cdn.embedly.com/widgets/platform.js';
     var s = d.getElementsByTagName(n)[0];
     s.parentNode.insertBefore(e, s);
   }
  })(window, document);
</script>

<?php 
include("menu.php");
include("header.php"); 

setlocale(LC_TIME, 'fr_FR');

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

$idproche = $_GET['idproche'];

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE id = ?');
$reponse->execute(array($idproche));
$donnees = $reponse->fetch();

$nextbirthday = get_next_birthday($donnees['datedenaissance']);
$duree = floor((strtotime($nextbirthday) - time()));

?>
<h1><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></h1>
Date de naissance : <?php echo $donnees['datedenaissance']; ?><br>
Lien : <?php echo $donnees['link'] ?>
<br><br>
<p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php echo (age($donnees['datedenaissance'])+1); ?> ans le <?php echo strftime("%A %e %B %Y", strtotime($nextbirthday)); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i>
 Dans ', floor((strtotime($nextbirthday) - time())/86400); echo " jours</p>"; ?> 
<br><br><a class="btn btnmain white" href="modification-proche.php?idproche=<?php echo $donnees['ID'] ?>">Modifier</i></a><br><br>
<form method="POST" action="delete-proche.php">
      <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
       <button class="btn red" onclick="return confirm('Etes vous sûr ? Le contact ne pourra pas être récupéré.')" type="submit">Supprimer le proche</button>
</form>
<br/><br/>

<form method="POST" action="ajout-cadeau.php">
<input class="form-control" type="text" name="url" placeholder="URL">
<input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
<button class="btn btnmain white" type="submit">Ajouter</button>
</form>
<br>

<?php
$reponse = $bdd->prepare('SELECT * FROM usersgifts WHERE procheid = ?');
$reponse->execute(array($idproche));
?>
<div class="row nomargin">
<?php
while ($donnees = $reponse->fetch())
    {
  ?>
  <div class="col s4 nomargin">
  <div class="card cardsgiftsprofile">
<a href="<?php echo $donnees['url']; ?>" class="embedly-card"><center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></center></i></a>
</div>
</div>
<?php

        }
?>
</div>
<br>


<?php include("footer.php"); ?>

</body>
</html>