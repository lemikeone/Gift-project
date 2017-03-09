<nav class="nnav-wrapper white">
<a href="index.php" class="brand-logo center"><img src="logo2.png" height="70px"></a>
<ul id="nav-mobile menu" class="right hide-on-med-and-down">

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
		{
			?>
			<li><a href="index.php">Evenements à venir</a></li>
			<li><a href="liste-proches.php">Mes proches</a></li>
			<li><a href="form-ajout-proche.php">Ajouter un proche</a></li>
		<?php }

	else 
		{
			?>
			<li><a href="create-account.php">Créer un compte</a></li>
			<li><a href="pageconnexion.php">Connexion</a></div></li>
			<?php
		}?>

</ul>

</nav>