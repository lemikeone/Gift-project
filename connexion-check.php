<?php 

//Page de redirection de connexion

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);
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
    header('Location: index.php');
    
}

?>