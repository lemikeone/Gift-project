<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : Vos proches</title>
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

$idproche = $_GET['idproche'];

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE id = ?');
$reponse->execute(array($idproche));
$donnees = $reponse->fetch();

if (isset($_SESSION['id'])) {
  # code...

if ($donnees['iduser'] == $_SESSION['id']) {

$nextbirthday = get_next_birthday($donnees['datedenaissance']);
$duree = floor((strtotime($nextbirthday) - time()));

?>
<h1><?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?></h1>
Date de naissance : 

<?php 
if ($donnees['datedenaissance'] != 0000-00-00) {
echo utf8_encode(strftime("%e %B", strtotime($donnees['datedenaissance']))); 

if ($donnees['anneenaissance'] != 0000-00-00) {
  echo " ".substr($donnees['anneenaissance'], 0, 4);
}
}
else {echo "Date non renseignée";}

?>
<br>
Lien : <?php echo htmlspecialchars($donnees['link']) ?>
<br><br>
<?php if ($donnees['datedenaissance'] != 0000-00-00) { ?>
<p><i class="fa fa-birthday-cake" aria-hidden="true"></i> Anniversaire : <?php 
    if ($donnees['anneenaissance'] != '0000-00-00') {
      # code...
    
    $datecomplete = substr($donnees['anneenaissance'], 0, 4).substr($donnees['datedenaissance'], 4);
         echo (age($datecomplete)+1); ?> ans <?php
}
        ?> le <?php echo utf8_encode(strftime("%A %e %B %Y", strtotime($nextbirthday))); ?></p>
        <?php echo '<p ><i class="fa fa-clock-o" aria-hidden="true"></i>
 Dans ', floor((strtotime($nextbirthday) - time())/86400)+1; echo " jours</p>"; }
 ?> 
 <a class="btn btn-default btn-xs" href="modification-proche.php?idproche=<?php echo $donnees['ID'] ?>">Modifier le contact</i></a>
<h2>Ajouter une idée cadeau</h2>

<form method="POST" action="ajout-cadeau.php">
<div class="row">
<div class="form-group col-md-9">
<div class="input-group"> 
<div class="input-group-addon">www</div>
<input class="form-control" type="text" name="url" placeholder="Entrez l'URL de la page du cadeau...">
</div>
</div>
<input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
<div class="form-group col-md-3">
<button class="btn btn-default btn-block" type="submit">Ajouter</button>
</div>
</div>
</form>
<br>

<?php
$reponse = $bdd->prepare('SELECT * FROM usersgifts WHERE procheid = ? ORDER BY ID DESC');
$reponse->execute(array($idproche));
?>

<div class="row flex">
<?php
while ($donnees = $reponse->fetch())
    {
  ?>
  <div class="col-md-4 col-xs-12">

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

<div class="row">
<div class="col-md-6">
<center><a href="suppressioncadeau.php?idgift=<?php echo $donnees['ID']; ?>" class="btn btn-default btn-xs btn-block"><i class="fa fa-times" aria-hidden="true"></i> Supprimer</a>
</div>

</div>

<a href="<?php echo $donnees['url']; ?>" class="embedly-card"><center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></center></i></a>
</div>
<?php

        }
?>
</div>
<br><br>
<div><center><a class="btn btn-default""  href="ideescadeaux.php">Consulter des idées cadeaux</a></center></div>
<?php 
}

else {echo "Ce proche ne fait pas partie de votre liste de proches";}

}

else {echo "Vous devez être connecté pour afficher la fiche d'un proche";}

 ?>
<br>

<?php include("footer.php"); ?>

</body>
</html>