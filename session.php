<?php 

session_start();


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'] ;
}

else {echo 'Veuillez vous connecter ou créer un compte';}

?>