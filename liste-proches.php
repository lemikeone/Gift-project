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

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

// If connected
  if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {

      $reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY nom');
      $reponse->execute(array($_SESSION['id']));
?> <h1>Mes proches</h1><div class="row"><?php
      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        ?>
        
        <div class="col s4 nomargincol">
        <div class="case">
        <a href="fiche-proche.php?idproche=<?php echo $donnees['ID'] ?>"><?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?></a><br><br><a class="btn btnmain white" href="modification-proche.php?idproche=<?php echo $donnees['ID'] ?>">Modifier</i></a></div></div>
        <?php
        }
        ?></div><?php
    }

?>
<br/><br/>

<?php include("footer.php"); ?>

</body>
</html>