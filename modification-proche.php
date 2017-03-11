<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<script type="text/javascript">
   $(document).ready(function() {
    $('select').material_select();
  });
</script>

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
<div class="row">
      <div class="form-group col s3">
        <input class="form-control" type="text" name="prenom" placeholder="<?php echo $donnees['prenom']; ?>">
    </div>
    <div class="form-group col s3">
        <input class="form-control" type="text" name="nom" placeholder="<?php echo $donnees['nom']; ?>">
      </div>
      <div class="form-group col s3">
        <input class="form-control" type="text" name="jour" placeholder="Jour : <?php echo substr($donnees['datedenaissance'], 8, 2); ?>">
        <input class="form-control" type="text" name="mois" placeholder="Mois : <?php echo substr($donnees['datedenaissance'], 5, 2); ?>">
        <input class="form-control" type="text" name="annee" placeholder="Année : <?php 
        if ($donnees['anneenaissance'] != "0000-00-00") {
          echo substr($donnees['anneenaissance'], 0, 4); 
        }
        

        ?>">
    </div>

      <div class="form-group col s3">
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
    </div>
    <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
          <button class="btn btnmain white" type="submit">Modifier</button>
      </form>
      <br>
      <form method="POST" action="delete-proche.php">
      <input type="hidden" name="idproche" value="<?php echo "$idproche"; ?>">
       <button class="btn red" onclick="return confirm('Etes vous sûr ? Le contact ne pourra pas être récupéré.')" type="submit">Supprimer le proche</button>
</form>
<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>