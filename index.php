<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly</title>
	<?php include("styles.php"); ?>
</head>
<body>

<style type="text/css">
	.event {
		font-size: 26px;
	}

</style>

<?php 
include("menu.php");
?>
<?php
// Ouverture de la BDD
include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// If connected
if (isset($_SESSION['id']) AND isset($_SESSION['email']))
    {
 ?><div class="container containerflux"><h1 class="event">Les évenements à venir ...</h1><?php
include("flux.php");
// Fin du IF pour les personnes connectées
}

else {
	include("home.php");
}

?>
<?php include("footer.php"); ?>

</body>
</html>