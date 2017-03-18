<?php
// Connect to MySQL

include("configuration.php");

$bdd = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

include("fetedesmeres.php");
include("fetedesperes.php");
include("fetedesgrandsmeres.php");

$noel = date("Y", time())."-12-25";
$saintvalentin = date("Y", time())."-02-14";

?>

<?php

// Check to see if a user exists with this e-mail
        $reponse = $bdd->query('SELECT * FROM users');

      // On affiche chaque entrée une à une
      while ($donnees = $reponse->fetch())
        {


//Fete des mères
                // Fete des meres jour J
                if (date('Y-m-d', time()) == $feteDesMeres AND $donnees['notiffetedesmeres'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des mères aujourd'hui.\n\nGiftendly";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des mères", $mailbody, $headers);

                }

                // Fete des meres J-5
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-5 days", strtotime($feteDesMeres))) AND $donnees['notiffetedesmeres'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des mères dans 5 jours.\n\nConsultez vos idées cadeaux sur sa fiche si vous l'avez déjà créée : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des mères dans 5 jours", $mailbody, $headers);

                }

// Fete des pères

                // Fete des pères jour J
                if (date('Y-m-d', time()) == $feteDesPeres AND $donnees['notiffetedesperes'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des pères aujourd'hui.\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des pères", $mailbody, $headers);
              

                }

                // Fete des pères J-5
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-5 days", strtotime($feteDesPeres))) AND $donnees['notiffetedesperes'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des pères dans 5 jours.\n\nConsultez vos idées cadeaux sur sa fiche si vous l'avez déjà créée : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des pères dans 5 jours", $mailbody, $headers);


                }

// Fête des grands mères

                // Fete des grands mères jour J
                if (date('Y-m-d', time()) == $FeteDesGrandsMeres AND $donnees['notiffetedesgrandsmeres'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des grands-mères aujourd'hui.\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des grands-mères", $mailbody, $headers);

                }

                // Fete des grands mères J-5
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-5 days", strtotime($FeteDesGrandsMeres))) AND $donnees['notiffetedesgrandsmeres'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la fête des grands-mères dans 5 jours.\n\nConsultez vos idées cadeaux sur sa fiche si vous l'avez déjà créée : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la fête des grands-mères dans 5 jours", $mailbody, $headers);


                }

// Noël    

                // Fete des Noël jour J
                if (date('Y-m-d', time()) == $noel AND $donnees['notifnoel'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est Noël aujourd'hui.\n\nPassez un joyeux Noël avec Giftendly.\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est Noël", $mailbody, $headers);

                }

                // Fete des Noël J-15
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-15 days", strtotime($noel))) AND $donnees['notifnoel'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est Noël dans 15 jours.\n\nAvez vous bien commandé tous vos cadeaux ?\n\nConsultez vos idées cadeaux sur les fiches de vos proches : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est Noël dans 15 jours", $mailbody, $headers);

                }

                // Fete des Noël J-30
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-30 days", strtotime($noel))) AND $donnees['notifnoel'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est Noël dans 30 jours.\n\nCommencez à créer des listes d'idées cadeaux sur les fiches de vos proches : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - Noël dans 30 jours", $mailbody, $headers);

                }

// Saint Valentin    

                // Fete des Saint Valentin jour J
                if (date('Y-m-d', time()) == $saintvalentin) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la Saint-Valentin aujourd'hui.\n\nNous vous souhaitons de passer un moment romantique !\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la Saint-Valentin", $mailbody, $headers);

                }

                // Fete des Saint Valentin   J-7
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-7 days", strtotime($saintvalentin))) AND $donnees['notifsaintvalentin'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la Saint Valentin dans 7 jours.\n\nAvez vous bien résérvé ou commandé ce que vous avez prévu ?\n\nConsultez vos idées la fiche de votre proche : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la Saint-Valentin dans 7 jours", $mailbody, $headers);

                }

                // Fete des Saint Valentin   J-15
                if (date('Y-m-d', time()) == date("Y-m-d", strtotime("-15 days", strtotime($saintvalentin))) AND $donnees['notifsaintvalentin'] == 0) {
                $pwrurl = "https://giftendly.com/liste-proches.php";
                
                // Envoyer email d'anniversaire
                $mailbody = "Bonjour ".$donnees['pseudo'].",\n\nC'est la Saint-Valentin dans 15 jours.\n\nCommencez à créer des listes d'idées sur la fiche de votre proches : ".$pwrurl."\n\nGiftendly\n\nPs : Vous pouvez activer ou desactiver les notifications mail à tout moment sur https://giftendly.com/profil.php";


                $headers = 'From: Giftendly <noreply@giftendly.com>';
                mail($donnees['email'], "Giftendly - C'est la Saint-Valentin dans 15 jours", $mailbody, $headers);

                }



        }

        ?>