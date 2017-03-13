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
<form action="reset.php" method="POST">
E-mail Address: <input type="text" name="email" size="20" placeholder="Adresse email" /><br />
New Password: <input type="password" name="password" size="20" placeholder="Mot de passe" /><br />
Confirm Password: <input type="password" name="confirmpassword" size="20" placeholder="Confirmer le mot de passe"/><br />
<input type="hidden" name="q" value="';
if (isset($_GET["q"])) {
	echo $_GET["q"];
}
	echo '" /><input type="submit" name="ResetPasswordForm" value="Réinitialiser mon mot de passe" />
</form>';

include("footer.php");
?>

</body>
</html>