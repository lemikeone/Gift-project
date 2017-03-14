<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Vos proches</title>
	<?php include("styles.php"); ?>
</head>
<body>

<style type="text/css">
  .casemarge {
    padding: 50px 0px 50px 0px;
  }

</style>

<?php 
include("menu.php");

?>

<div class="container containerflux">

<?php

setlocale(LC_TIME, 'fr_FR'); 

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

?> <h1>Mes proches</h1><div class="row"> <?php

// If connected
  if (isset($_SESSION['id']) AND isset($_SESSION['email']))
    {

      $reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY nom');
      $reponse->execute(array($_SESSION['id']));
?> <?php
      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        ?>
        
        <div class="col-md-3">
        <div class="caselisteproches">
        <h3><a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?></a></h3>
<?php 
if ($donnees['datedenaissance'] != 0000-00-00) {
echo utf8_encode(strftime("%e %B", strtotime($donnees['datedenaissance']))); 
if ($donnees['anneenaissance'] != 0000-00-00) {
  echo " ".substr($donnees['anneenaissance'], 0, 4);
}
}
else {echo "Date non renseignée";}
?>

        <br><br><a class="btn btn-default" href="modification-proche.php?idproche=<?php echo $donnees['ID'] ?>">Modifier</i></a></div></div>
        <?php
        }
        ?><?php
    }
    ?>
    <div class="col-md-3">
        <div class="caselisteproches casemarge">
        <a href="form-ajout-proche.php"><i class="fa fa-plus fa-5x" aria-hidden="true"></i></a>
        </div></div></div>

<br/><br/>

<?php include("footer.php"); ?>

</body>
</html>