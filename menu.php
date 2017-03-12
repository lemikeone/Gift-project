<nav class="navbar navbar-default">

<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a href="index.php" class="navbar-brand"><img src="logo-black.png" height="25px"></a>

</div>

 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

<?php
if (isset($_SESSION['id']) AND isset($_SESSION['email']))
		{
			?>
			<li><a href="index.php">Evenements à venir</a></li>
			<li><a href="liste-proches.php">Mes proches</a></li>
			<li><a href="form-ajout-proche.php">Ajouter un proche</a></li>
			<li><a href="ideescadeaux.php">Idées cadeaux</a></li>
			<li><a href="logoutpage.php">Se déconnecter</a></li>
		<?php }

	else 
		{
			?>
			<li><a href="create-account.php">Créer un compte</a></li>
			<li><a href="pageconnexion.php">Connexion</a></div></li>
			<?php
		}?>

</ul>
</div>
</div>
</nav>