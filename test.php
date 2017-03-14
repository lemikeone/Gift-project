<?php
// Connect to MySQL

include("configuration.php");

$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

?>

<?php

// Check to see if a user exists with this e-mail
	$reponse = $bdd->query('
	SELECT usersfriends.nom usersfriendsname, usersfriends.prenom usersfriendsprenom, users.email usersemail, usersfriends.datedenaissance usersfriendsdate, usersfriends.ID usersfriendsid, users.pseudo pseudo, usersfriends.iduser iduser
	FROM usersfriends
	INNER JOIN users
	ON usersfriends.iduser = users.ID
	WHERE usersfriends.iduser = 3
        ');

	while ($donnees = $reponse->fetch())
        {
        	echo $donnees['usersfriendsprenom'];
        }

        ?>