<?php 

session_start();


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

else {echo 'je ne te connais pas';}