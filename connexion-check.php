<?php 

//Page de redirection de connexion

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Hachage du mot de passe
$salt = "89798S7D*!LKJ887#98!*";
$pass_hache = hash('sha512', $salt.$_POST['pass']);
$email = $_POST['email'];

// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM users WHERE email = :email AND pass = :pass');
$req->execute(array(
    'email' => $email,
    'pass' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
	// Session opening en redirect to homepage
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['email'] = $email;

    // Create cookies
    setcookie('id', $resultat['id'], time() + 365*24*3600, null, null, false, true);
    setcookie('email', $email, time() + 365*24*3600, null, null, false, true);

    //Redirect to homepage
    header('Location: index.php');
    
}

?>