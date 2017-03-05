
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{  
	?>
<a href="logoutpage.php">Logout<a/>
	<?php
    }
    
    else{

    	?>
    <form method="POST" action="connexion-check.php">
    <div class="input-group">
      <input type="text" name="pseudo" placeholder="Pseudo">
      <input type="text" name="pass" placeholder="Mot de passe">
        <button type="submit">Ok</button>
    </form>
    <?php 
    }

    ?>