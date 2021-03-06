<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Réinitialisation mot de passe</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); ?>

<?php
// Connect to MySQL

include("configuration.php");

try {
$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);
}
catch(PDOException $ex) 
    { 
        $msg = "Failed to connect to the database"; 
    } 

// Was the form submitted?
if (isset($_POST["ForgotPassword"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
	}else{
		echo "email is not valid";
		exit;
	}

	// Check to see if a user exists with this e-mail
	$query = $conn->prepare('SELECT email FROM users WHERE email = :email');
	$query->bindParam(':email', $email);
	$query->execute();
	$userExists = $query->fetch(PDO::FETCH_ASSOC);
	$conn = null;
	
	if ($userExists["email"])
	{
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "89798S7D*!LKJ887#98!*";

		// Create the unique user password reset key
		$password = hash('sha512', $salt.$userExists["email"]);

		// Create a url which we will direct them to reset their password
		$pwrurl = "http://giftendly.com/reset-password.php?q=".$password;

		$headers = 'From: Giftendly <noreply@ngiftendly.com>';
		
		// Mail them their key
		$mailbody = "Cher utilisateur,\n\nPour réinitialiser votre mot de passe, cliquez sur le lien suivant, ou copiez le et collez le dans votre navigateur : " . $pwrurl . "\n\nMerci,\nGiftendly";
		mail($userExists["email"], "Giftenly - Reinitialisation de votre mot de passe", $mailbody, $headers);
		echo "Votre lien de Reinitialisation de mot de passe vous a été envoyé par email.";
		
	}
	else
		echo "Pas d'utilisateur avec cette adresse email.";
}

include("footer.php");
?>

</body>
</html>