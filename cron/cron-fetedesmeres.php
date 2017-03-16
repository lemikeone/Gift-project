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

        // Pour faire des tests, ajouter après ON juste avant : WHERE usersfriends.iduser = 3

        while ($donnees = $reponse->fetch())
        {
                // Si un anniversaire est le jour même, envoi d'un email
                if ((date('m-d', time())) == (substr($donnees['usersfriendsdate'], -5))) {
                
                $pwrurl = "http://giftendly.com/fiche-proche.php?idproche=".$donnees['usersfriendsid'];
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est l'anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." aujourd'hui.\n\nSouhaitez lui bon anniversaire :)\n\nFiche de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." : ". $pwrurl ."\n\nGiftendly";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['usersemail'], "Giftendly - Anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." aujourd'hui", $mailbody, $headers);
                }

                // Si un anniversaire est dans 10 jours, envoi d'une notification
                if ((date('m-d', time())) == date("m-d", strtotime("-10 days", strtotime($donnees['usersfriendsdate'])))) {
                        
                $pwrurl = "http://giftendly.com/fiche-proche.php?idproche=".$donnees['usersfriendsid'];
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est l'anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." dans 10 jours.\n\nC'est le moment de commander une ou plusieurs de vos idées cadeaux : ". $pwrurl ."\n\nGiftendly";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['usersemail'], "Giftendly - Anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." dans 10 jours", $mailbody, $headers);
                }

                // Si un anniversaire est dans 20 jours, envoi d'une notification
                if ((date('m-d', time())) == date("m-d", strtotime("-20 days", strtotime($donnees['usersfriendsdate'])))) {
                        
                $pwrurl = "http://giftendly.com/fiche-proche.php?idproche=".$donnees['usersfriendsid'];
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est l'anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." dans 20 jours.\n\nC'est le moment d'ajouter des idées cadeaux sur sa fiche : ". $pwrurl ."\n\nGiftendly";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['usersemail'], "Giftendly - Anniversaire de ".$donnees['usersfriendsprenom']." ".$donnees['usersfriendsname']." dans 20 jours", $mailbody, $headers);
                }

        }

        ?>