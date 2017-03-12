<?php 

include("configuration.php");
$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

// Insertion
$req = $bdd->prepare('INSERT INTO users(pseudo, pass, email, signup_date) VALUES(:pseudo, :pass, :email, CURDATE())');

$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));

echo 'Compte créé';

?>