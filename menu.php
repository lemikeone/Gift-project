<br/>
<nav class="navbar navbar-default navbar-fixed-top">
<ul class="nav navbar-nav">
<li><a href="index.php"><img src="logo2.png" height="30px"></a></li>

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
<div class="navbar-form navbar-right">

<?php
include("session.php");
include("connexion.php");

?>

</div>
</nav>