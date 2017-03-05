<?php  
$bdd = new PDO('mysql:host=localhost;dbname=gift-project;charset=utf8', 'root', 'root');

$bdd->exec("INSERT INTO usersfriends(ID, prenom, nom, datedenaissance) VALUES('', 'Isabelle', 'Genuys', '2012-12-25')")

?>