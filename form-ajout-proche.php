<?php include("sessionstart.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Le Petit Cadeau</title>
	<?php include("styles.php"); ?>
</head>
<body>
<?php include("menu.php"); ?>
<?php include("header.php"); ?>

<script type="text/javascript">
	 $(document).ready(function() {
    $('select').material_select();
  });
</script>

<?php

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{  
		?>
		<h1>Ajouter un proche</h1>
	    <form method="POST" action="ajout-friend.php">
	    <div class="row">
	    <div class="form-group col s3">
	    	<input class="form-control" type="text" name="prenom" placeholder="Prenom">
		</div>
	    <div class="form-group col s3">
	    	<input class="form-control" type="text" name="nom" placeholder="Nom">
	    </div>
	    <div class="form-group col s3">
	    	<input class="form-control" type="date" name="birthdate" placeholder="Date de naissance">
		</div>
	    <div class="selecttype input-field form-group col s3">
	    <select>
	    	<option value="" disabled selected>Relation</option>
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
			<option value="Autre">Autre</option>
		</select>
		</div>
		</div>
	        <button class="btn btnmain white" type="submit">Ajouter</button>
	    </form>
	    <?php
    }
else
    { 
    	echo "Vous devez vous connecter ou créer un compte pour ajouter un proche";
    }

?>
<br/>

<?php include("footer.php"); ?>

</body>
</html>