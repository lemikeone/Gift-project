<?php 

$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

// Vérification de la validité des informations

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);
$pseudo = $_POST['pseudo'];

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

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
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    
}

?>
<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    
}

else {}

header('Location: index.php');

?>