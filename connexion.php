
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{  
	?>
 <a class="btn btn-default" href="logoutpage.php">Logout</a>
	<?php
    }
    
    else{

    	?>
    <form method="POST" action="connexion-check.php" class="form-inline">
    <div class="form-group">
      <input class="form-control" type="text" name="pseudo"  placeholder="Pseudo">
      </div>
      <div class="form-group">
      <input class="form-control" type="password" name="pass"  placeholder="Mot de passe"></div>
        <button type="submit" class="btn btn-default">Ok</button>
    </form>
    <?php 
    }

    ?>