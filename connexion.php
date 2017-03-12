<!-- Formulaire de connexion -->

<?php
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
		{  
		?>
	 	<a class="btn btn-default" href="logoutpage.php">Se déconnecter</a>
		<?php
	    }
    
    else
    	{

    	?>
	    <form method="POST" action="connexion-check.php" class="form-inline">
	    <div class="form-group">
	    <input class="form-control" type="text" name="email"  placeholder="Email">
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="pass"  placeholder="Mot de passe"></div>
		<button type="submit" class="btn btn-default">Se connecter</button>
	    </form>
	    <?php 
	    }
?>