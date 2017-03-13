<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Giftendly : connexion</title>
	<?php include("styles.php"); ?>
</head>
<body>
<?php 
include("menu.php");
include("header.php"); ?>

<?php 

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

if (isset($_POST['pass']) && !empty($_POST['pass']) AND isset($_POST['pseudo']) && !empty($_POST['pseudo']) AND isset($_POST['email']) && !empty($_POST['email'])) {
	# code...

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    exit("Adresse email invalide"); // Use your own error handling ;)

$query = $bdd->prepare( "SELECT `email` FROM `users` WHERE `email` = ?" );
$query->bindValue( 1, $_POST['email'] );
$query->execute();

if( $query->rowCount() > 0 ) { # If rows are found for query
     echo "Adresse email déjà enregistrée";
}
else {
    // Hachage du mot de passe
$salt = "89798S7D*!LKJ887#98!*";
$pass_hache = hash('sha512', $salt.$_POST['pass']);
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

// Insertion
$req = $bdd->prepare('INSERT INTO users(pseudo, pass, email, signup_date) VALUES(:pseudo, :pass, :email, CURDATE())');

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));

echo 'Compte créé';
}

}

else {
	echo "Merci de bien renseigner tous les champs.";
}

include("footer.php");

?>

</body>
</html>