<?php

include("session.php");
include("menu.php");
?>
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{  
	echo "Vous etes deja connecté";
    }
    
    else{

    	?>
    <form method="POST" action="create-account-ok.php">
    <div class="input-group">
      <input type="text" name="pseudo" placeholder="Pseudo">
      <input type="text" name="pass" placeholder="Mot de passe">
      <input type="text" name="email" placeholder="Adresse email">
        <button type="submit">Ok</button>
    </form>
    <?php 
    }

    ?>