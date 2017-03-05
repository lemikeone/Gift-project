<?php

include("session.php");
include("menu.php");

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{  
	?>

    <form method="GET" action="ajout-friend.php">
    <div class="input-group">
      <input type="text" name="nom" placeholder="Nom">
      <input type="text" name="prenom" placeholder="Prenom">
      <input type="text" name="birthdate" placeholder="Date de naissance">
        <button type="submit">Ok</button>
    </form>
    <?php
    }
    else{ 
    	echo "Vous devez vous connecter ou créer un compte pour ajouter un proche";
    }

    ?>