<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Idées cadeaux</title>
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

if (isset($_GET['page'])) {
$pagination = $_GET['page'];
}
else {
 $pagination = 0; 
}

$debut = $pagination * 12;
$fin = 12;

setlocale(LC_TIME, 'fr_FR');

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

?>
<h1>Idées cadeaux</h1>
<p>Retrouvez les dernières idées cadeaux proposées par les membres :</p>
<br/>

<div class="text-center">
<div class="btn-group" role="group">
  <a href="ideescadeaux.php" class="btn btn-default active">Les plus récents</a>
  <a href="ideescadeaux-popular.php" class="btn btn-default">Les plus populaires</a>
</div>
</div>

<?php

$reponse = $bdd->prepare('SELECT * FROM usersgifts GROUP BY url ORDER BY ID DESC LIMIT :debut, :fin');
$reponse->bindParam(':debut', $debut, PDO::PARAM_INT);
$reponse->bindParam(':fin', $fin, PDO::PARAM_INT);
$reponse->execute();
?>
<br>
<div class="row flex">
<?php
while ($donnees = $reponse->fetch())
    {
  ?>
  <div class="col-md-4 col-xs-12">
 
<a href="<?php echo $donnees['url']; ?>" class="embedly-card"><center><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw pinkg"></i></center></i></a>

 <!-- Button trigger modal -->
<div class="text-center">
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#<?php echo $donnees['ID']; ?>">
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

</div>

<?php

        }
?>
</div>
<br>
<div class="text-center">

<?php 

if ($pagination != 0) {
 ?>
<a href="ideescadeaux.php?page=<?php echo $pagination - 1; ?>" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Page précédente</a> <?php
}

?>

<a href="ideescadeaux.php?page=<?php echo $pagination + 1; ?>" class="btn btn-default">Page suivante <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div><br><br>

<?php include("footer.php"); ?>

</body>
</html>