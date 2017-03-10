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
?>
<div class="container containerflux">
<?php
// Ouverture de la BDD
$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root' );

// If connected
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
include("flux.php");
// Fin du IF pour les personnes connectées
}
?>

<br/><br/>
<?php include("footer.php"); ?>

</body>
</html>