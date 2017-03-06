<br/>
<nav class="navbar navbar-default navbar-fixed-top">
<ul class="nav navbar-nav">
<li><a href="index.php"><i class="fa fa-gift" aria-hidden="true"></i> Le Petit Cadeau</a></li>

<?php

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	?>
	<li><a href="form-ajout-proche.php">Ajouter un proche</a></li>
	<?php
}

else {?>
<li><a href="create-account.php">Créer un compte</a></li>
<li><a href="pageconnexion.php">Connexion</a></li>
<?php
}
?>
 </ul>
 <div class="navbar-form navbar-right"><?php
include("connexion.php");
?></div>
</nav>