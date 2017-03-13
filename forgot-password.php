<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mot de passe oublié</title>
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
	    <h1>Réinitialiser votre mot de passe</h1>
	    <form action="change.php" method="POST" class="form-inline">
	    <div class="form-group">
Addresse e-mail : <input type="text" name="email" class="form-control"/> <input type="submit" name="ForgotPassword" value="Demander une réinitialisation" class="btn btn-default"/>
</div>
</form>
	    <br/>
	    <?php 
	    }

include("footer.php");
?>

</body>
</html>