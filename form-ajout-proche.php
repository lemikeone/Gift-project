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
	    <div class="form-group col s4">
	    	<input class="form-control" type="text" name="prenom" placeholder="Prenom">
		</div>
	    <div class="form-group col s4">
	    	<input class="form-control" type="text" name="nom" placeholder="Nom">
	    </div>
	    <div class="selecttype input-field form-group col s4">
	    <select name="link">
	    	<option value="" selected>Relation</option>
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
		<div class="row">
			<div class="form-group col s4">
	    <select name="jour" /> 
	    <option value="" selected>Jour de naissance</option>
	 <option>1</option>       
    <option>2</option>       
    <option>3</option>       
    <option>4</option>       
    <option>5</option>       
    <option>6</option>       
    <option>7</option>       
    <option>8</option>       
    <option>9</option>       
    <option>10</option>       
    <option>11</option>       
    <option>12</option>       
    <option>13</option>       
    <option>14</option>       
    <option>15</option>       
    <option>16</option>       
    <option>17</option>       
    <option>18</option>       
    <option>19</option>       
    <option>20</option>       
    <option>21</option>       
    <option>22</option>       
    <option>23</option>       
    <option>24</option>       
    <option>25</option>       
    <option>26</option>       
    <option>27</option>       
    <option>28</option>       
    <option>29</option>       
    <option>30</option>       
    <option>31</option>   
    </select>
    </div>
    <div class="form-group col s4">
    <select name="mois" /> 
    <option value="" selected>Mois de naissance</option>
	 <option>1</option>       
    <option>2</option>       
    <option>3</option>       
    <option>4</option>       
    <option>5</option>       
    <option>6</option>       
    <option>7</option>       
    <option>8</option>       
    <option>9</option>       
    <option>10</option>       
    <option>11</option>       
    <option>12</option>        
    </select>
    </div>
    <div class="form-group col s4">
    <?php // selection de l'année
$earliest_year = 1900;
print '<select name="annee"><option value="" selected>Année de naissance</option>';
foreach (range(date('Y'), $earliest_year) as $x) { print '<option value="'.$x.'">'.$x.'</option>'; }
print '</select>'; ?>
		</div>
		</div>
		
<div><center>
	        <button class="btn btnmain white" type="submit">Ajouter</button></center>
	        </div>
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