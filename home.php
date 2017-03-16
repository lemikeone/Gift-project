
<style ="text/css">
.modules {
	margin-top: 30px;
	margin-bottom: 30px;
}

.modulesint {
	padding: 30px 50px 30px 50px;
	border-style: solid;
	border-width: 0px;
	border-color: white;
	border-radius: 1px;
	margin: 0px 20px 0px 20px;
	color: #565656;

}

.btnhome {

    color: #fff;
    background-color: rgba(0,0,0,.075);
    border-color: #ccc;
    border-radius: 0px;

    }

.icon1 {
	background-color: #262F36;
	width: 150px;
	height: 150px;
	border-radius: 100px;
	    padding-top: 44px;
    padding-left: 7px;
	color: white;
}

.icon2 {
	background-color: #262F36;
	width: 150px;
	height: 150px;
	border-radius: 100px;
	padding-top: 44px;
	color: white;
}

.icon3 {
	background-color: #262F36;
	width: 150px;
	height: 150px;
	border-radius: 100px;
	padding-top: 46px;
	color: white;
}

.homecover {
		color : whitesmoke;
		min-height: 60vh;
		width: 100%;
		position: relative;
		background-size: cover;
		background-position: center;
		background-image: url(home.jpg);
		margin-top: -20px;
		padding-top: 50px;
		background-attachment: fixed;

		}

		.titre {
		font-size: 400%;
		text-shadow: 2px 2px 8px #000000;
		font-weight:lighter;
}

.logo {
	max-width: 70%;
	max-height: 100px;
}

</style>

<div class="homecover">
	<center>
	<br>
	<img class="logo" src="logo-white.png"  alt="">
	<p class="titre">Planificateur de cadeaux</p>
	<br><br>
	<a class="btn btn-lg btnhome" href="create-account.php">Créer un compte</a><br><br>
	</center>
</div>
<div class="row modules">
		<div class="col-md-4 text-center "><div class="modulesint"><i class="fa fa-calendar-check-o fa-4x icon1" aria-hidden="true"></i><br><br><p class="titresblocs">Rappel des évenements et fêtes de vos proches</p></div></div>
<div class="col-md-4 text-center"><div class="modulesint"><i class="fa fa-gift fa-4x icon2" aria-hidden="true"></i><br><br><p class="titresblocs">Listes de cadeaux et recommandations</p></div></div>
<div class="col-md-4 text-center"><div class="modulesint"><i class="fa fa-bell fa-4x icon3" aria-hidden="true"></i><br><br><p class="titresblocs">Notifications aux dates clés pour préparer ses idées</p></div></div>
	</div>