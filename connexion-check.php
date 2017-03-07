<?php 

//Page de redirection de connexion

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);
$pseudo = $_POST['pseudo'];

// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND pass = :pass');
$req->execute(array(
    'pseudo' => $pseudo,
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
    $_SESSION['pseudo'] = $pseudo;
    header('Location: index.php');
    
}

?>