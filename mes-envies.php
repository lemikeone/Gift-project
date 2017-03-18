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

if (isset($_SESSION['id'])) {
$userid = $_SESSION['id'];

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

$reponse = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$reponse->execute(array($userid));
$donnees = $reponse->fetch();

// Envies

?>

<h2>Ajoutez vos envies</h2>

<form method="POST" action="ajoutenvie.php">
<div class="row">
<div class="form-group col-md-9">
<div class="input-group"> 
<div class="input-group-addon">www</div>
<input class="form-control" type="text" name="url" placeholder="Entrez l'URL de la page du cadeau...">
</div>
</div>
<input type="hidden" name="userid" value="<?php echo "$userid"; ?>">
<div class="form-group col-md-3">
<button class="btn btn-default btn-block" type="submit">Ajouter</button>
</div>
</div>
</form>
<br>

<?php
$reponse = $bdd->prepare('SELECT * FROM usersgifts WHERE userid = ? ORDER BY ID DESC');
$reponse->execute(array($userid));
?>

<div class="row flex">
<?php
while ($donnees = $reponse->fetch())
    {
  ?>
  <div class="col-md-4 col-xs-12">
<a href="<?php echo $donnees['url']; ?>" class="embedly-card"><center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw pinkg"></i></center></i></a>

<div class="row">
<!-- Button trigger modal -->
<div class="col-md-6">
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

<div class="form-group col-md-9">
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


<div class="col-md-6">
<center><a href="suppressioncadeau.php?idgift=<?php echo $donnees['ID']; ?>" class="btn btn-default btn-xs btn-block"><i class="fa fa-times" aria-hidden="true"></i> Supprimer</a>
</div>

</div> 


</div>
<?php

        }
?>
</div>
<br><br>
<?php


// Fin des envies

$salt = "89747D*!L7#JKHZ78698!*";
$token = hash('sha1', $salt.$userid);

echo "<h3>Partagez votre liste d'envies : </h3><br>"; echo "<pre>https://giftendly.com/profilpublic.php?userid=".$userid."&token=".$token."</pre><p>Seules les personnes à qui vous donnerez cette URL auront accès à votre liste d'envies.</p>"; 

}

?>
<br>

<?php include("footer.php"); ?>

</body>
</html>