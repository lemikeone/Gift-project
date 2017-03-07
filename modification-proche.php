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

$idproche = $_GET['idproche'];

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

$reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE id = ?');
$reponse->execute(array($idproche));
$donnees = $reponse->fetch();
?>
<h1><?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?></h1>
<p>Ne renseignez que les champs que vous souhaitez modifier</p>

<form method="POST" action="modification-proche-ok.php">
      <div class="form-group">
        <input class="form-control" type="text" name="prenom" placeholder="<?php echo $donnees['prenom']; ?>">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="nom" placeholder="<?php echo $donnees['nom']; ?>">
      </div>
      <div class="form-group">
        <input class="form-control" type="date" name="birthdate" placeholder="<?php echo $donnees['datedenaissance']; ?>">
    </div>

      <div class="form-group">
      <select class="form-control" name="link">
      <option value="Mère" <?php if ($donnees['link'] == 'Mère') {echo ('selected="selected"');}?> >Mère</option>
      <option value="Père" <?php if ($donnees['link'] == 'Père') {echo ('selected="selected"');}?> >Père</option>
      <option value="Fille" <?php if ($donnees['link'] == 'Fille') {echo ('selected="selected"');}?> >Fille</option>
      <option value="Fils" <?php if ($donnees['link'] == 'Fils') {echo ('selected="selected"');}?> >Fils</option>
      <option value="Grand Mère" <?php if ($donnees['link'] == 'Grand Mère') {echo ('selected="selected"');}?> >Grand Mère</option>
      <option value="Grand Père" <?php if ($donnees['link'] == 'Grand Père') {echo ('selected="selected"');}?> >Grand Père</option>
      <option value="Soeur" <?php if ($donnees['link'] == 'Soeur') {echo ('selected="selected"');}?> >Soeur</option>
      <option value="Frère" <?php if ($donnees['link'] == 'Frère') {echo ('selected="selected"');}?> >Frère</option>
      <option value="Famille" <?php if ($donnees['link'] == 'Famille') {echo ('selected="selected"');}?> >Famille</option>
      <option value="Conjoint" <?php if ($donnees['link'] == 'Conjoint') {echo ('selected="selected"');}?> >Conjoint</option>
      <option value="Conjointe" <?php if ($donnees['link'] == 'Conjointe') {echo ('selected="selected"');}?> >Conjointe</option>
      <option value="Femme" <?php if ($donnees['link'] == 'Femme') {echo ('selected="selected"');}?> >Femme</option>
      <option value="Mari" <?php if ($donnees['link'] == 'Mari') {echo ('selected="selected"');}?> >Mari</option>
      <option value="Ami" <?php if ($donnees['link'] == 'Ami') {echo ('selected="selected"');}?> >Ami</option>
      <option value="Travail" <?php if ($donnees['link'] == 'Travail') {echo ('selected="selected"');}?> >Travail</option>
      <option value="Autre" <?php if ($donnees['link'] == 'Autre') {echo ('selected="selected"');}?> >Autre</option>
    </select>
    </div>
    <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
          <button class="btn btn-default" type="submit">Modifier</button>
      </form>
      <br>
      <form method="POST" action="delete-proche.php">
      <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
       <button class="btn btn-danger" type="submit">Supprimer</button>
</form>
<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>