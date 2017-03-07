<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>

<br/>

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
		<input class="form-control" type="text" name="pseudo" placeholder="Pseudo">
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="pass" placeholder="Mot de passe">
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="email" placeholder="Adresse email">
		</div>
		<button class="btn btn-default" type="submit">Ok</button>
	    </form>
	    <br/>
	    <?php 
	    }

include("footer.php");
?>

</body>
</html>