<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<br/>

<?php 
include("menu.php");
include("header.php"); 

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

// If connected
  if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {

      $reponse = $bdd->prepare('SELECT * FROM usersfriends WHERE iduser = ? ORDER BY nom');
      $reponse->execute(array($_SESSION['id']));

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {

        ?>
        <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?> <a href="modification-proche.php?idproche=<?php echo $donnees['ID'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <br><?php
        }
    }

?>
<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>