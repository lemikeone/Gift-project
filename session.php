<?php 


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo '<h1>Bonjour ' . $_SESSION['pseudo'] .'</h1>';
}

else {

include("messagehome.php");

}

?>