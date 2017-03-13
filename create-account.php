<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Créer un compte</title>
	<?php include("styles.php"); ?>
</head>
<body>

<?php 
include("menu.php");
include("header.php"); ?>

<?php
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
		{  
		echo "Vous etes deja connecté";
	    }
    
    else
	    {

	    ?>
	    <h1>Créer un compte</h1>
	    <form method="POST" action="create-account-ok.php" class="form-inline">
	    <div class="form-group">
		<input class="form-control" type="text" name="pseudo" placeholder="Nom ou pseudo">
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="pass" placeholder="Mot de passe">
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="email" placeholder="Adresse email">
		</div>
		<button class="btn btn-default" type="submit">Créer le compte</button>
	    </form>
	    <br/>
	    <?php 
	    }

include("footer.php");
?>

</body>
</html>