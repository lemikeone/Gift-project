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
	    <div class="row">
	    <div class="col-md-6">
	    <form method="POST" action="create-account-ok.php">
	    <div class="form-group">
	    <label for="nom">Votre nom</label>
		<input class="form-control" type="text" name="pseudo" id="nom" placeholder="Entrez votre nom et prenom">
		</div>
		<div class="form-group">
		<label for="email">Votre adresse email</label>
		<input class="form-control" type="text" name="email" id="email" placeholder="Adresse email">
		</div>
		<div class="form-group">
		<label for="pass">Entrez un mot de passe</label>
		<input class="form-control" type="password" name="pass" id="pass" placeholder="Mot de passe">
		</div>
		<button class="btn btn-default" type="submit">Créer le compte</button>
	    </form>
	    </div>
	    </div>
	    <br/>
	    <?php 
	    }

include("footer.php");
?>

</body>
</html>