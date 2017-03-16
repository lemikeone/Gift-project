<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : Ajouter une idée cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); 

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

?>

<h2>Ajouter une idée cadeau</h2>

<form method="POST" action="ajout-cadeau.php">
<div class="row">
<div class="form-group col-md-6">
<div class="input-group"> 
<div class="input-group-addon">www</div>
<input class="form-control" type="text" name="url" placeholder="Entrez l'URL de la page du cadeau...">
</div>
</div>

<div class="form-group col-md-4">
<?php include("menu-proches.php"); ?>
</div>

<div class="form-group col-md-2">
<button class="btn btn-default btn-block" type="submit">Ajouter</button>
</div>
</div>
</form>
<br>
<?php if (isset($_GET['ajout']) AND $_GET['ajout'] == "true")
{
?>
<div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Une bonne chose de faite !</strong> L'idée cadeau a été ajoutée à votre proche</div>
<?php
}
 ?>
<br>

<?php include("footer.php"); ?>

</body>
</html>