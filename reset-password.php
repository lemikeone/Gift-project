<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : Reinitialisation de mot de passe</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); ?>

<?php echo '
<br><form action="reset.php" method="POST">
 <input type="text" class="form-control" name="email" size="20" placeholder="Adresse email" /><br />
<input type="password" name="password" class="form-control" size="20" placeholder="Mot de passe" /><br />
 <input type="password" name="confirmpassword" class="form-control" size="20" placeholder="Confirmer le mot de passe"/><br />
<input type="hidden" name="q" value="';
if (isset($_GET["q"])) {
	echo $_GET["q"];
}
	echo '" /><input type="submit" class="btn btn-default" name="ResetPasswordForm" value="Réinitialiser mon mot de passe" />
</form><br>';

include("footer.php");
?>

</body>
</html>