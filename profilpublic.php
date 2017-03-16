<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : Votre profil</title>
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

$salt = "89747D*!L7#JKHZ78698!*";
$token = hash('sha1', $salt.$_GET['userid']);

if (isset($_GET['userid']) AND isset($_GET['token']) AND $_GET['token'] == hash('sha1', $salt.$_GET['userid'])) {

// Si tout est ok, on affiche la liste

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

$reponse = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$reponse->execute(array($_GET['userid']));
$donnees = $reponse->fetch();

// Envies

?>

<h2>Les envies de <?php echo $donnees['pseudo']; ?></h2>

<?php
$reponse = $bdd->prepare('SELECT * FROM usersgifts WHERE userid = ? ORDER BY ID DESC');
$reponse->execute(array($_GET['userid']));
?>

<div class="row flex">
<?php
while ($donnees = $reponse->fetch())
    {
  ?>
  <div class="col-md-4 col-xs-12">
<a href="<?php echo $donnees['url']; ?>" class="embedly-card"><center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw pinkg"></i></center></i></a>

<?php if (isset($_SESSION['id'])) {?>

<div class="row">
<!-- Button trigger modal -->
<div class="col-md-12">
  <div class="text-center">
  <button type="button" class="btn btn-default btn-xs btn-block" data-toggle="modal" data-target="#<?php echo $donnees['ID']; ?>">
   <i class="fa fa-bookmark" aria-hidden="true"></i> Ajouter à une liste
  </button>
    </div>
      <!-- Modal -->
        <div class="modal fade" id="<?php echo $donnees['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter le cadeau dans la liste d'un proche</h4>
        </div>
        <div class="modal-body">
        <!-- Formulaire d'ajout -->

        <form method="POST" action="ajout-cadeau.php">

        <div class="row">

        <div class="form-group col-md-12">
        <?php include("menu-proches.php"); ?>
        </div>
        <input type="hidden" name="url" value="<?php echo $donnees['url']; ?>">
        <div class="form-group col-md-3">
        <button class="btn btn-default btn-block" type="submit">Ajouter</button>
        </div>
        </div>
        </form>
        <!-- Fin du formulaire d'ajout -->
        </div>
        </div>
        </div>
        </div>
        <!-- Fin modal -->
      </center>
    </div>




    </div> 

<?php } ?>

  </div>
<?php

// fin de la liste d'envies


}

?></div><?php
}

?>
<br>

<?php include("footer.php"); ?>

</body>
</html>