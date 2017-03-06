<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>
<br/>
<?php include("header.php"); ?>
<?php
// Session
include("session.php");
include("menu.php");?>

<?php

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{  
	?>

    <form method="POST" action="ajout-friend.php">
    <div class="input-group">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prenom">
    <input type="text" name="birthdate" placeholder="Date de naissance">
    <select name="link">
		<option value="Mère">Mère</option>
		<option value="Père">Père</option>
		<option value="Fille">Fille</option>
		<option value="Fils">Fils</option>
		<option value="Grand Mère">Grand Mère</option>
		<option value="Grand Père">Grand Père</option>
		<option value="Soeur">Soeur</option>
		<option value="Frère">Frère</option>
		<option value="Famille">Famille</option>
		<option value="Conjoint">Conjoint</option>
		<option value="Conjointe">Conjointe</option>
		<option value="Femme">Femme</option>
		<option value="Mari">Mari</option>
		<option value="Ami">Ami</option>
		<option value="Travail">Travail</option>
		<option value="Travail">Autre</option>
	</select>
        <button type="submit">Ok</button>
    </form>
    <?php
    }
    else{ 
    	echo "Vous devez vous connecter ou créer un compte pour ajouter un proche";
    }

    ?>

    <?php
include("connexion.php");
include("footer.php");
?>

</body>
</html>